<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Admin\Company\Company;
use App\Models\Admin\CV\Curriculo;
use App\Models\Admin\Payment\License;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();
            Helper::licenseExpirated($user);
            $cvs = Curriculo::Where('id_user', $user->id)->count();
            $licenses = License::Where('id_user', $user->id)->Where('status', ['activa','expirada'])->get();
            $licenseCount = count($licenses);
            return view("admin.home", compact('cvs','licenseCount', 'licenses'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }

    public function managementCompany()
    {
        try {
            $data = User::join('companys','companys.id_user', 'users.id')
            ->Where('users.is_admin',0)->select(
                'users.id as id',
                'users.name as name',
                'users.status as status',
                'users.email as email',
                'companys.created_at as created_at',
                'companys.nif_number as nif_number',
            )->paginate(10);
            return view('admin.pages.company.home', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }


    public function details(int $id)
    {
        try {
            $company = User::join('companys','companys.id_user', 'users.id')
            ->Where('users.is_admin',0)
            ->Where('users.id',$id)
            ->select(
                'users.id as id',
                'users.name as name',
                'users.status as status',
                'users.email as email',
                'companys.nif_number as nif_number',
                'companys.owner as owner',
                'companys.image as image',
            )->first();
            $cvs = Curriculo::Where('id_user', $id)->count();
            $license = License::Where('id_user', $id)->Where('status', ['activa','expirada'])->get();
            $payments = Helper::countPrice($license);
            $licenses = License::Where('id_user', $id)->orderBy('id','DESC')->get();
            return view('admin.pages.company.details', compact('company','cvs','licenses', 'payments'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }

    public function create()
    {
        try {
            return view('admin.pages.company.create');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }

    public function store(Request $request)
    {
        try {
            $data = [];
            DB::beginTransaction();
            $foto = Helper::upload($request->file('foto_perfil'), '/adm/img/companys/logotipos/');
            if (!$foto["status"] == true)
                return redirect()->back()->with('error','Erro ao carregar comprovativo!');
            $request['image'] = $foto['message'];
            Helper::orderData($data, $request);
            $data['company']['id_user'] = User::insertGetId($data['user']);
            $success = Company::create($data['company']);
            DB::commit();
            if(!$success)
                return redirect()->back()->with('error','Erro ao registrar nova empresa, por favor tente novamente!');
            return redirect()->back()->with('success', 'Empresa registrada com sucesso!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }

    public function edite(int $id)
    {
        try {
            $data = User::join('companys','companys.id_user', 'users.id')
            ->Where('users.is_admin',0)
            ->Where('users.id',$id)
            ->select(
                'users.id as id',
                'users.name as name',
                'users.status as status',
                'users.email as email',
                'companys.nif_number as nif_number',
                'companys.address as address',
                'companys.phone as phone',
                'companys.owner as owner',
                'companys.image as image',
            )->first();
            return view('admin.pages.company.edite', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }

    public function update(int $id, Request $request)
    {
        try {
            $data = [];
            DB::beginTransaction();
            $company = Company::Where('id_user', $id)->first();
            if($request->file('foto_perfil')){
                $foto = Helper::upload($request->file('foto_perfil'), '/adm/img/companys/logotipos/');
                if (!$foto["status"] == true)
                    return redirect()->back()->with('error','Erro ao carregar comprovativo!');
                $request['image'] = $foto['message'];
            }else{
                $request['image'] = $company->image;
            }
            Helper::orderData($data, $request);
            User::findOrFail($id)->update($data['user']);
            $success = $company->update($data['company']);
            DB::commit();
            if(!$success)
                return redirect()->back()->with('error','Erro ao  actualizar empresa, por favor tente novamente!');
            return redirect()->back()->with('success', 'Empresa actualizada com sucesso!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }
}
