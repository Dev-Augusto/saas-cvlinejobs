<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CVController;
use App\Http\Controllers\Admin\PayController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name("pages.home");

Route::middleware(['auth'])->controller(AdminController::class)->prefix('/admin')->group(function (){

    Route::get("", [AdminController::class, "index"])->middleware(['auth', 'verify.license'])->name("admin.home");

    Route::get("/curriculos-vitae", [CVController::class, "index"])->middleware(['auth', 'verify.license', 'check.license'])->name("admin.cv.home");
    Route::get("/curriculos-vitae/pesquisar", [CVController::class, "search"])->middleware(['auth', 'check.license', 'verify.license'])->name("admin.cv.search");
    Route::get("/curriculos-vitae/visualizar/{id}", [CVController::class, "details"])->middleware(['auth', 'check.license', 'verify.license'])->name("admin.cv.details");
    Route::get("/curriculos-vitae/novo-curriculo", [CVController::class, "create"])->middleware(['auth', 'check.license', 'verify.license'])->name("admin.cv.create");
    Route::post("/curriculos-vitae/novo-curriculo/criar", [CVController::class, "store"])->middleware(['auth', 'check.license', 'verify.license'])->name("admin.cv.store");
    Route::get("/curriculos-vitae/editar-curriculo/{id}", [CVController::class, "edite"])->middleware(['auth', 'check.license', 'verify.license'])->name("admin.cv.edite");
    Route::put("/curriculos-vitae/editar-curriculo/editar/{id}", [CVController::class, "update"])->middleware(['auth', 'check.license', 'verify.license'])->name("admin.cv.update");
    Route::get("/curriculos-vitae/editar-curriculo/editar/designer/{id}/{id_model}", [CVController::class, "editeDesign"])->middleware(['auth', 'check.license', 'verify.license'])->name("admin.cv.update.designer");
    Route::get("/curriculos-vitae/visualizar/novo-curriculo/{id}", [CVController::class, "show"])->middleware(['auth', 'check.license', 'verify.license'])->name("admin.cv.show");
    Route::delete("/curriculos-vitae/eliminar/{id}", [CVController::class, "destroy"])->middleware(['auth', 'check.license', 'verify.license'])->name("admin.cv.delete");

    Route::get("/pagamentos-&-licencas", [PayController::class, 'index'])->name('admin.payment.home');
    Route::post("/pagamentos-&-licencas/pagar-licenca", [PayController::class, 'store'])->name('admin.payment.store');
    Route::get("/pagamentos-&-licencas/validar/licenca/{id}", [PayController::class, 'paymentValidated'])->name('admin.payment.validated');

    Route::get('/gestao-de-empresas', [AdminController::class, 'managementCompany'])->middleware(['auth', 'verify.license'])->name('adminer.management.company');
    Route::get('/gestao-de-empresas/visualisar/empresa/{id}', [AdminController::class, 'details'])->middleware(['auth', 'verify.license'])->name('adminer.management.company.details');
    Route::get('/gestao-de-empresas/nova-empresa', [AdminController::class, 'create'])->middleware(['auth', 'verify.license'])->name('adminer.management.company.create');
    Route::post('/gestao-de-empresas/nova-empresa/registrar', [AdminController::class, 'store'])->middleware(['auth', 'verify.license'])->name('adminer.management.company.store');
    Route::get('/gestao-de-empresas/editar-empresa/{id}', [AdminController::class, 'edite'])->middleware(['auth', 'verify.license'])->name('adminer.management.company.edite');
    Route::put('/gestao-de-empresas/editar-empresa/{id}/editar', [AdminController::class, 'update'])->middleware(['auth', 'verify.license'])->name('adminer.management.company.update');

    Route::get('/gestao-financeira', [AdminController::class, 'finance'])->name('adminer.management.finance');
    Route::post('/gestao-financeira/fazer-debito', [AdminController::class, 'debit'])->name('adminer.management.finance.debit');

    Route::put('/confidencial/palavra-passe/editar', [AdminController::class, 'updatePassword'])->name('adminer.management.user.update');
});

Route::get('/2hGDBzXjieQd7wzyQK4e2X94q.b3qrWX.5sRdVyVr.usj9BbCl6/criar-nova-empresa', 
    [HomeController::class, 'create'])->name('create.company.ads');
Route::post('/2hGDBzXjieQd7wzyQK4e2X94q.b3qrWX.5sRdVyVr.usj9BbCl6/add', 
    [AdminController::class, 'store'])->name('store.company.ads');

Route::get('/register', function () {
    abort(404); // Bloquear acesso a /register
})->name('register');

Route::post('/register', function () {
    abort(404); // Bloquear acesso a /register
})->name('register.store');

Route::get('/forgot-password', function () {
    abort(404); // Bloquear acesso a /register
});


