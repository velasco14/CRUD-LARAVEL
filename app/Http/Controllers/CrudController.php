<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function index (){
        $datos=DB::select(" select * from usuario ");
        return view("welcome")->with("datos", $datos);
    }
    public function create (Request $request){
        try {
            $sql=DB::insert(" insert into usuario(id, apodo, contraseña)values(?,?,?) ",[
                $request->txtid, 
                $request->txtapodo,
                $request->txtcontraseña
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("correcto","Usuario registrado correctamente");
        } else {
            return back()->with("incorrecto","Error al registrar");
        }
    }
    public function update(Request $request){
        try {
            $sql=DB::update("update usuario set apodo=?, contraseña=? where id=?", [
                $request->txtapodo,
                $request->txtcontraseña,
                $request->txtid
            ]);
            if ($sql == 0) {
                $sql == 1;
            }
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("correcto","Usuario modificado correctamente");
        } else {
            return back()->with("incorrecto","Error al modificar");
        }
    }
    public function delete($id){
        try {
            $sql=DB::delete(" delete from usuario where id=$id");
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("correcto","Usuario eliminado correctamente");
        } else {
            return back()->with("incorrecto","Error al eliminar");
        }
    }
}
