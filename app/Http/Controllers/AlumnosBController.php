<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;


class AlumnosBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $items = Libro::select('libros.id_l', 'libros.titulo', 'libros.clasificacion',
        'autors.nombre_a as nombrA', 'editorials.nombre_e as nombrE',
        'libros.status')
                     ->join('autors', 'autors.id_a', '=', 'libros.id_a')
                     ->join('editorials', 'editorials.id_e', '=', 'libros.id_e')
                     ->where('libros.titulo', 'LIKE', "%$request->q%")
                     ->orwhere('editorials.nombre_e', 'LIKE', "%$request->q%")
                     ->orwhere('autors.nombre_a', 'LIKE', "%$request->q%")
                    ->paginate( ($request->paginate) ? $request->paginate : 10 );
        return view('alumnoB.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuss = statuss::all();
        return view('statuss.create')
        ->with('statuss',$statuss);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        /*return $request;*/

        $this->validate($request,[
            'matricula'=>'required|regex:/^[0-9]{10}$/',
            'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
            'idca'=>'required',
            'sexo'=>'required',
            'activo'=>'required',
               ]);

               $estudiantes = new estudiantes;
               $estudiantes->nombre = $request->nombre;
               $estudiantes->matricula= $request->matricula;
               $estudiantes->idca = $request->idca;
               $estudiantes->sexo = $request->sexo;
               $estudiantes->activo = $request->activo;
               $estudiantes->save();

               return redirect()->route('estudiantes.index')
               ->with('message', 'Estudiante creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(estudiantes $estudiantes)
    {
        /*return ($estudiantes);*/
        $consulta = estudiantes::select('estudiantes.ide','estudiantes.nombre',
                                'estudiantes.matricula', 'estudiantes.activo',
                                'estudiantes.sexo', 'carreras.nombre as carre','carreras.idca')
                      ->join('carreras', 'carreras.idca', '=', 'estudiantes.idca')
                      ->where('estudiantes.ide', '=', $estudiantes->ide)->get();
      $carreras = carreras::all();
    /*return $consulta[0];*/
    return view('estudiantes.edit')
    ->with('consulta',$consulta[0])
    ->with('carreras',$carreras);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, estudiantes $estudiantes)
    {
        $this->validate($request,[
            'matricula'=>'required|regex:/^[0-9]{10}$/',
            'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
            'idca'=>'required',
            'sexo'=>'required',
            'activo'=>'required',
        ]);
        $estudiantes= estudiantes::find($estudiantes->ide);
         $estudiantes->nombre= $request->nombre;
         $estudiantes->matricula= $request->matricula;
         $estudiantes->idca= $request->idca;
         $estudiantes->sexo= $request->sexo;
         $estudiantes->activo = $request->activo;
         $estudiantes->save();

         return redirect()->route('estudiantes.index')
         ->with('message', 'Estudiante editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(estudiantes $item)
    {
      $item->forceDelete();
      return redirect()->route('estudiantes.index')->with('message',"Registro eliminado exitosamente");
    }

    public function toggleStatus(Request $request, libross $item)
    {
        $item->update($request->only('activo'));
        if($item->activo==1){
            return redirect()->route('libross.index')->with('message', 'Registro activado exitosamente');
        }
        else{
            return redirect()->route('libross.index')->with('message', 'Registro desactivado exitosamente');
        }
    }

}
