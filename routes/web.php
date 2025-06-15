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

    Route::get("", [AdminController::class, "index"])->name("admin.home");

    Route::get("/curriculos-vitae", [CVController::class, "index"])->name("admin.cv.home");
    Route::get("/curriculos-vitae/pesquisar", [CVController::class, "search"])->middleware('auth.license')->name("admin.cv.search");
    Route::get("/curriculos-vitae/visualizar/{id}", [CVController::class, "details"])->middleware('auth.license')->name("admin.cv.details");
    Route::get("/curriculos-vitae/novo-curriculo", [CVController::class, "create"])->middleware('auth.license')->name("admin.cv.create");
    Route::post("/curriculos-vitae/novo-curriculo/criar", [CVController::class, "store"])->middleware('auth.license')->name("admin.cv.store");
    Route::get("/curriculos-vitae/editar-curriculo/{id}", [CVController::class, "edite"])->middleware('auth.license')->name("admin.cv.edite");
    Route::put("/curriculos-vitae/editar-curriculo/editar/{id}", [CVController::class, "update"])->middleware('auth.license')->name("admin.cv.update");
    Route::get("/curriculos-vitae/editar-curriculo/editar/designer/{id}/{id_model}", [CVController::class, "editeDesign"])->middleware('auth.license')->name("admin.cv.update.designer");
    Route::get("/curriculos-vitae/visualizar/novo-curriculo/{id}", [CVController::class, "show"])->name("admin.cv.show")->middleware('auth.license');
    Route::delete("/curriculos-vitae/eliminar/{id}", [CVController::class, "destroy"])->name("admin.cv.delete")->middleware('auth.license');

    Route::get("/pagamentos-&-licencas", [PayController::class, 'index'])->name('admin.payment.home');
    Route::post("/pagamentos-&-licencas/pagar-licenca", [PayController::class, 'store'])->name('admin.payment.store');
    Route::get("/pagamentos-&-licencas/validar/licenca/{id}", [PayController::class, 'paymentValidated'])->name('admin.payment.validated');

    Route::get('/gestao-de-empresas', [AdminController::class, 'managementCompany'])->name('adminer.management.company');
    Route::get('/gestao-de-empresas/visualisar/empresa/{id}', [AdminController::class, 'details'])->name('adminer.management.company.details');
    Route::get('/gestao-de-empresas/nova-empresa', [AdminController::class, 'create'])->name('adminer.management.company.create');
    Route::post('/gestao-de-empresas/nova-empresa/registrar', [AdminController::class, 'store'])->name('adminer.management.company.store');
    Route::get('/gestao-de-empresas/editar-empresa/{id}', [AdminController::class, 'edite'])->name('adminer.management.company.edite');
    Route::put('/gestao-de-empresas/editar-empresa/{id}/editar', [AdminController::class, 'update'])->name('adminer.management.company.update');
});

Route::get('/register', function () {
    abort(404); // Bloquear acesso a /register
})->name('register');

Route::post('/register', function () {
    abort(404); // Bloquear acesso a /register
})->name('register.store');

