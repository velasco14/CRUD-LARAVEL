<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [CrudController::class, "index"])->name("crud.index");

//ruta para nuevo usuario
Route::post("/registrar-usuario", [CrudController::class, "create"])->name("crud.create");

//ruta para modificar 
Route::post("/modificar-usuario", [CrudController::class, "update"])->name("crud.update");

//ruta para eliminar
Route::get("/eliminar-usuario-{id}", [CrudController::class, "delete"])->name("crud.delete");





