<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReporteLController extends Controller
{
    public function consultaL(){
        //Consulta de todas las carreras
        $carreras = DB::select('SELECT * FROM carreras ORDER BY nombre ASC');
        //return $carreras;
        return view('reportes.libros.consulta')
            ->with(['carreras' => $carreras]);

    }



 //--------------------------start contenido-------------------------------------------------
 public function contenidoL(Request $request)
 {

     //Consulta todos los ciclos escolares
     $carreras = DB::select('SELECT * FROM carreras ORDER BY nombre ASC');

     //idce del ciclo escolar seleccionado
     $idca = $request->get('idca');

     //Consulta el nombre del ciclo escolar seleccionado
     $ca_select = DB::select("SELECT ce.nombre
     FROM carreras AS ce
     WHERE ce.idca = $idca");

     //Lista los carreras, número de alumnos, número de grupos, del ciclo escolar sellccinado
     $listas = DB::select("SELECT c.idca,c.nombre, COUNT(*) AS cuantos
     FROM libros AS l
     INNER JOIN carreras AS c  ON c.idca = l.idca
     where c.idca = $idca
     GROUP BY c.idca, c.nombre
     ");

    //return $listas;


     return view("reportes.libros.contenido")
         ->with(['$carreras' => $carreras])
         ->with(['idca' => $idca])
         ->with(['$ca_select' => $ca_select])
         ->with(['listas' => $listas]);
 }
 //---------------------------------end contenido----------------------------------------------


 //-------------------------start detalle carreras------------------------------------------
 public function detalle_carrerasL($idca)
 {
     //idce del ciclo escolar seleccionado
    // $idce = $idce;

     //idca de la carrera seleccionada
     $idca = $idca;

     //Consulta el nombre del ciclo escolar y el nombre de la carrera seleccionada
     $datos = DB::select("SELECT ca.nombre AS carrera FROM  carreras AS ca
     WHERE ca.idca = $idca");

     //Lista los grupos, número de alumnos que tiene cada grupo
     $listas = DB::select("SELECT l.id_l, l.titulo,a.nombre_a,e.nombre_e,l.año_p,
     l.edicion,l.status,l.serie,l.clasificacion,l.activo
     FROM libros AS l
     INNER JOIN autors AS a ON a.id_a = l.id_a
     INNER JOIN editorials AS e ON e.id_e = l.id_e
     WHERE l.idca = $idca");

     return view("reportes.libros.carrera")
         ->with(['idca' => $idca])
         ->with(['datos' => $datos[0]])
         ->with(['listas' => $listas]);
 }
 //-------------------------end detalle carreras--------------------------------------------


//  public function show($id_l){
//     return
//  }

}
