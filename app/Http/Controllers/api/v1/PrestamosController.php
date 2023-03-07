<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Prestamo;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PrestamosController extends Controller
{
    public function index(Request $request){

        $prestamos = [];

        if($request->idg){
            $usuarios = Usuario::where('idg', $request->idg)->where('activo', 1)->get();

            foreach($usuarios as $usuario){
                array_push($prestamos, Prestamo::where('idu', $usuario->idu )->with('usuario')->with('libro')->first());
            }

            return response()->json($prestamos, 200);
        }

        $prestamos = Prestamo::where('activo', 1)->get();
        return response()->json($prestamos, 200);
    }
}
