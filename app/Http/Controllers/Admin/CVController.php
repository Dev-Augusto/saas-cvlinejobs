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
use Illuminate\Support\Facades\DB;

class CVController extends Controller
{
    public function index()
    {
        try {
            return view("admin.pages.cv.home");
        } catch (\Throwable $th) {
             return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }

    public function details(int $id)
    {
        try {
            $cv = "";
            view('admin.pages.cv.details', compact('cv'));
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
        //try {
            $data = [];
            if(!session()->has('curriculo'))
                return redirect()->back()->with('error','Não existe dados salvos!');
            DB::beginTransaction();
            Helper::dataConstruct($data, session('curriculo'));
            $this->createOnDB($data);
            //DB::commit();
            //dd(Helper::screenShot(session('curriculo')['idioma_cv'], $id));
            $cv = session('curriculo');
            $cv['foto_perfil'] = $data["curriculo"]["image"];
            return view('admin.pages.cv.models.show', compact('cv','id'));
        // } catch (\Throwable $th) {
            DB::rollBack();
           // return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        //}
    }

    private function createOnDB(array $data)
    {
        foreach ($data['curriculo']['experiences'] as $exp) {
            $data['curriculo']['id_experieces'] = Experience::insertGetId($exp);
        }
        foreach ($data['curriculo']['skills'] as $skill) {
            $data['curriculo']['id_hability'] = Hability::insertGetId($skill);
        }
        foreach ($data['curriculo']['languages'] as $lang) {
            $data['curriculo']['id_languages'] = Language::insertGetId($lang);
        }
        $data['curriculo']['id_user'] = 1;
        Curriculo::create($data['curriculo']);
    }

}
