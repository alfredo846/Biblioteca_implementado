<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Grupo;
use Illuminate\Http\Request;

class GruposController extends Controller
{
    public function index(Request $request){

        if($request->idca){
            $grupos = Grupo::where('idca', $request->idca)->where('activo', '1')->where('idce', $request->idce)->get();
            return response()->json($grupos, 200);
        }

        $grupos = Grupo::where('activo', '1')->get();

        return response()->json($grupos, 200);

    }
}
