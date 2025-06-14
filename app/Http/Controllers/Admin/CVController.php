<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CV\CVCreateRequest;
use App\Models\Admin\CV\Curriculo;
use App\Models\Admin\CV\Experience;
use App\Models\Admin\CV\Hability;
use App\Models\Admin\CV\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CVController extends Controller
{
    public function index()
    {
        try {
            $id_user = Auth::user()->id;
            $data = Curriculo::Where("id_user", $id_user)->orderBy('id','desc')->paginate(15);
            return view("admin.pages.cv.home", compact('data'));
        } catch (\Throwable $th) {
             return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }

    public function details(int $id)
    {
        try {
            $curriculo = Curriculo::with(['experiencies', 'habilities', 'languages'])->findOrFail($id);
            $data = [];
            Helper::dataConstructCV($data, $curriculo);
            $cv = $data['curriculo'];
            return view('admin.pages.cv.models.show', compact('cv'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }

    public function create()
    {
        try {
            return view("admin.pages.cv.create");
        } catch (\Throwable $th) {
             return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }

    public function edite(int $id)
    {
        try {
            $id_user = Auth::user()->id;
            $cv = Curriculo::Where("id_user", $id_user)->with(['experiencies', 'habilities', 'languages'])->findOrFail($id);
            return view("admin.pages.cv.edite", compact('cv'));
        } catch (\Throwable $th) {
             return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }

    public function update(int $id, CVCreateRequest $request)
    {
        try {
            $data = $request->all();
            $actual = Curriculo::find($id);
            $curriculo = [];
            if ($request->hasFile('foto_perfil') && $request->file('foto_perfil')->isValid()) {
                $path = $request->file('foto_perfil')->store('temp', 'public');
                $data['foto_perfil_temp'] = $path;
            }else{
                $data['foto_perfil']  = $actual->image;
            }
            DB::beginTransaction();
            Helper::dataConstruct($curriculo, $data, $actual->templante_number);
            $this->updateOnDB($curriculo, $id);
            DB::commit();
            //Helper::screenShot(data['idioma_cv'], $id, $curriculo);
            if(strtolower($data['idioma_cv']) == "actual")
                return redirect()->route('admin.cv.details', $id);
            $cv = $data;
            $update = $id;
            return view('admin.pages.cv.models.preview', compact('cv','update'));
        } catch (\Throwable $th) {
             DB::rollBack();
             return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }

    public function store(CVCreateRequest $request)
    {
        try {
            $data = $request->except(['_token', 'foto_perfil']);
            if ($request->hasFile('foto_perfil') && $request->file('foto_perfil')->isValid()) {
                $path = $request->file('foto_perfil')->store('temp', 'public');
                $data['foto_perfil_temp'] = $path;
            }
            session(['curriculo' => $data]);
            $cv = $data;
            return view('admin.pages.cv.models.preview', compact('cv'));
        } catch (\Throwable $th) {
             return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }

    public function show(int $id)
    {
        try {
            $data = [];
            if(!session()->has('curriculo'))
                return redirect()->back()->with('error','Não existe dados salvos!');
            DB::beginTransaction();
            Helper::dataConstruct($data, session('curriculo'), $id);
            $curriculo = $this->createOnDB($data);
            DB::commit();
            //Helper::screenShot(session('curriculo')['idioma_cv'], $id, $curriculo);
            $cv = session('curriculo');
            $cv['foto_perfil'] = $data["curriculo"]["image"];
            return \view('admin.pages.cv.models.show', compact('cv','id'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }

    private function createOnDB(array $data)
    {
        $data['curriculo']['id_user'] = Auth::user()->id;
        $curriculo = Curriculo::create(Arr::except($data['curriculo'], ['experiences', 'skills', 'languages']));
        foreach ($data['curriculo']['experiences'] as $exp) {
            $experienceId = Experience::insertGetId($exp);
            $curriculo->experiencies()->attach($experienceId);
        }

        foreach ($data['curriculo']['skills'] as $skill) {
            $habilityId = Hability::insertGetId($skill);
            $curriculo->habilities()->attach($habilityId);
        }

        foreach ($data['curriculo']['languages'] as $lang) {
            $languageId = Language::insertGetId($lang);
            $curriculo->languages()->attach($languageId);
        }

        return $curriculo;
    }

    private function updateOnDB(array $data, int $id)
    {
        $data['curriculo']['id_user'] = Auth::user()->id;

        // Atualiza os dados do currículo (excepto as relações)
        $curriculo = Curriculo::findOrFail($id);
        if($data['curriculo']['lang'] == 'actual')
            $data['curriculo']['lang'] = $curriculo->lang;
        $curriculo->update(Arr::except($data['curriculo'], ['experiences', 'skills', 'languages']));

        // Limpa as relações antigas
        $curriculo->experiencies()->delete();
        $curriculo->habilities()->delete();
        $curriculo->languages()->delete();

        foreach ($data['curriculo']['experiences'] as $exp) {
            $experienceId = Experience::insertGetId($exp);
            $curriculo->experiencies()->attach($experienceId);
        }

        foreach ($data['curriculo']['skills'] as $skill) {
            $habilityId = Hability::insertGetId($skill);
            $curriculo->habilities()->attach($habilityId);
        }

        foreach ($data['curriculo']['languages'] as $lang) {
            $languageId = Language::insertGetId($lang);
            $curriculo->languages()->attach($languageId);
        }

        return $curriculo;
    }

    public function editeDesign(int $id, int $id_model)
    {
        $curriculo = Curriculo::findOrFail($id);
        $curriculo->update(['templante_number'=>$id_model]);
        return redirect()->route('admin.cv.details', $id);
    }

    public function destroy(int $id)
    {
        try {
            $data = Curriculo::destroy($id);
            if($data)
                return redirect()->back()->with('success','curriculo eliminado com sucesso!');
        } catch (\Throwable $th) {
             return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }   
    }
}
