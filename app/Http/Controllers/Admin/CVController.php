<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CV\CVCreateRequest;
use Illuminate\Http\Request;

class CVController extends Controller
{
    public function index()
    {
        try {
            return view("admin.pages.cv.home");
        } catch (\Throwable $th) {
            return redirect()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }

    public function create()
    {
        try {
            return view("admin.pages.cv.create");
        } catch (\Throwable $th) {
            return redirect()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
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
            return view('admin.pages.cv.models.preview');
        } catch (\Throwable $th) {
            return redirect()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }

    public function show(int $id)
    {
        try {
            
        } catch (\Throwable $th) {
            return redirect()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }
}
