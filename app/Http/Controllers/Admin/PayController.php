<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Admin\Payment\License;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayController extends Controller
{
    public function index()
    {
        try {
            $id_user = 1;
            $data = License::Where('id_user', $id_user)->orderBy('id','DESC')->paginate(10);
            return view('admin.pages.payments.home', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }

    public function store(Request $request)
    {
        try {
            $request['id_user'] = 1;
            DB::beginTransaction();
            $comprovative = Helper::upload($request->file('file'), '/adm/img/comprovatives/');
            if (!$comprovative["status"] == true)
                return redirect()->route('admin.payment.home')->with('error','Erro ao carregar comprovativo!');
            $request['comprovative'] = $comprovative['message'];
            $request['status'] = 'pendente';
            $request['payment_date'] = date('Y-m-d', strtotime('NOW'));
            $data = License::create($request->all());
            DB::commit();
            if(!$data)
                return redirect()->route('admin.payment.home')->with('error','Erro ao efectuar pagamento, por favor tente novamente!');
            return redirect()->route('admin.payment.home')->with('success','Pagamento enviado com sucesso, por favor aguarde a verificação!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }

    public function paymentValidated(int $id)
    {
        try {
            DB::beginTransaction();
            $license = License::findOrFail($id);
            $currentDate = Carbon::now();
            $expirationDate = $currentDate->addMonths($license->month);
            $license->update([
                'status' => 'activa',
                'payment_expiration' => $expirationDate->format('Y-m-d'),
            ]);
            $data = User::findOrFail($license->id_user)->update(['status'=>1]);
            DB::commit();
            if(!$data)
                return redirect()->back()->with('error', 'Erro ao aprovar pagamento, por favor tente novamente!');
            return redirect()->back()->with('success', 'Pagamento aprovado com sucesso!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors("Lamentamos aconteceu um erro ao tentar realizar a operação, por favor tente novamente!");
        }
    }
}
