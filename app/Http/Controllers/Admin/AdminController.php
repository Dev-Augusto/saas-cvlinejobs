<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Admin\Company\Company;
use App\Models\Admin\CV\Curriculo;
use App\Models\Admin\Payment\License;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            Helper::licenseExpirated($user);
            return $next($request);
        });
    }

    public function index()
    {
        try {
            $user = Auth::user();
            if($user->is_admin){
                $cvs = Curriculo::count();
                $licenses = License::whereIn('status', ['activa','expirada'])->get();
                $licenseCount = count($licenses);
                $company = User::Where('is_admin',0)->count();
            return view("admin.home", compact('cvs','licenseCount', 'licenses', 'company'));
            }else{ 
                $cvs = Curriculo::Where('id_user', $user->id)->count();
                $licenses = License::Where('id_user', $user->id)->whereIn('status', ['activa','expirada'])->get();
                $licenseCount = count($licenses);
                return view("admin.home", compact('cvs','licenseCount', 'licenses'));  
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }

    public function managementCompany()
    {
        try {
            if(!Auth::user()->is_admin)
                return redirect()->back();
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
            if(!Auth::user()->is_admin)
                return redirect()->back();
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
            $license = License::Where('id_user', $id)->WhereIn('status', ['activa','expirada'])->get();
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
            if(!Auth::user()->is_admin)
                return redirect()->back();
            return view('admin.pages.company.create');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }

    public function store(Request $request)
    {
        try {
            if(!Auth::user()->is_admin)
                return redirect()->back();
            $data = [];
            DB::beginTransaction();
            $foto = Helper::upload($request->file('foto_perfil'), '/adm/img/companys/logotipos/');
            if (!$foto["status"] == true)
                return redirect()->back()->with('error','Erro ao carregar comprovativo!');
            $request['image'] = $foto['message'];
            Helper::orderData($data, $request);
            $data['company']['id_user'] = User::insertGetId($data['user']);
            $success = Company::create($data['company']);
            $this->addTimeTest(Auth::user());
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
            if(!Auth::user()->is_admin)
                return redirect()->back();
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
            if(!Auth::user()->is_admin)
                return redirect()->back();
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

    public function updatePassword(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        if(!Hash::check($request->now_password, $user->password))
            return redirect()->back()->with('error', 'Palavra passe actual incorrecta!');
        if(!($request->password == $request->conf_password))
            return redirect()->back()->with('error', 'Confirmação de palavra passe diferente!');
        if(!$user->update(['password'=>Hash::make($request->password)]))
            return redirect()->back()->with('error', 'Erro ao alterar palavra passe, tente novamente!');
        return redirect()->back()->with('success', 'Palavra passe alterada com sucesso!');

    }

    private function addTimeTest($user)
    {
        $currentDate = Carbon::now();
        License::create([
            'id_user' => $user->id,
            'price'=> 0,
            'month'=> 0, 
            'payment_date'=> $currentDate->format('Y-m-d'),
            'payment_expiration'=> $currentDate->addDays(15)->format('Y-m-d'),
            'comprovative' => 'licenca-teste.pdf',
            'status'=>'em teste'
        ]);
    }
    
}
