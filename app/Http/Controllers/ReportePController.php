<?php

namespace App\Http\Controllers;

use App\Models\CicloEscolar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReportePController extends Controller
{
    public function consultaP(){
        //Consulta de todas las carreras
        $ciclos = CicloEscolar::where('activo', '1')->get();
        //return $carreras;
        return view('reportes.prestamos.consulta')
            ->with(['ciclos' => $ciclos]);

    }



 //--------------------------start contenido-------------------------------------------------
 public function contenidoP(Request $request)
 {

     //Consulta todos los ciclos escolares
     $carreras = DB::select('SELECT * FROM carreras ORDER BY nombre ASC');

     //idce del ciclo escolar seleccionado
     $idca = $request->get('idca');

     //Consulta el nombre del ciclo escolar seleccionado
     $ca_select = DB::select("SELECT ce.nombre
     FROM carreras AS ce
     WHERE ce.idca = $idca ");

     //Lista los carreras, número de alumnos, número de grupos, del ciclo escolar sellccinado
     $listas = DB::select("SELECT c.idca,c.nombre, COUNT(*) AS cuantos
     FROM prestamos AS p
     INNER JOIN libros AS l ON l.id_l =p.id_l
     INNER JOIN carreras AS c  ON c.idca = l.idca
     where c.idca = $idca
     GROUP BY c.idca,c.nombre
     ");

    //return $listas;


     return view("reportes.prestamos.contenido")
         ->with(['$carreras' => $carreras])
         ->with(['idca' => $idca])
         ->with(['$ca_select' => $ca_select])
         ->with(['listas' => $listas]);
 }
 //---------------------------------end contenido----------------------------------------------


 //-------------------------start detalle carreras------------------------------------------
 public function detalle_carrerasP($idca)
 {
     //idce del ciclo escolar seleccionado
    // $idce = $idce;

     //idca de la carrera seleccionada
     $idca = $idca;



     //Consulta el nombre del ciclo escolar y el nombre de la carrera seleccionada
     $datos = DB::select("SELECT ca.nombre AS carrera FROM  carreras AS ca
     WHERE ca.idca = $idca");

     //Lista los grupos, número de alumnos que tiene cada grupo
     $listas = DB::select("SELECT p.id_p, l.titulo,fecha_p,p.observacion_dev,
     IF(p.fecha_dev IS NULL,'SIN FECHA ENTREGA',p.fecha_dev) AS fechadevolucion,
     u.matricula, CONCAT(u.nombre,' ',u.apellido_paterno,' ',u.apellido_materno) AS nombrecompleto,g.nombre,
     IF(fecha_dev IS NULL,'NO ENTREGADO','ENTREGADO') AS disponibilidad
     FROM prestamos AS p
     INNER JOIN usuarios AS u ON u.idu = p.idu
     INNER JOIN libros AS l ON l.id_l = p.id_l
     INNER JOIN grupos AS g ON g.idg = u.idg
     WHERE l.idca= $idca");

     return view("reportes.prestamos.carrera");
 }
 //-------------------------end detalle carreras--------------------------------------------



}