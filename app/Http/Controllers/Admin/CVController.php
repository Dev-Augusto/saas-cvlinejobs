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
use Illuminate\Support\Facades\DB;

class CVController extends Controller
{
    public function index()
    {
        try {
            $id_user = 1;
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
        $data['curriculo']['id_user'] = 1;
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
