<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Carrera;
use Illuminate\Http\Request;

class CarrerasController extends Controller
{
    public function index(Request $request){

        if($request->idce){
            $carreras = Carrera::where('idce', $request->idce)->where('activo', '1')->get();
            return response()->json($carreras, 200);
        }

        $carreras = Carrera::where('activo', '1')->get();
        return response()->json($carreras, 200);

    }
}
