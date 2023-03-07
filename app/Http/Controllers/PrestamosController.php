<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Usuario;

class PrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
       $items = Prestamo::select('prestamos.id_p', 'prestamos.fecha_p', 'prestamos.observacion_p', 'prestamos.fecha_dev',
        'prestamos.observacion_dev', 'prestamos.tipo_p', 'prestamos.activo', 'prestamos.status',
        'libros.titulo as lib', 'usuarios.nombre as user', 'usuarios.apellido_paterno as ap', 'usuarios.apellido_materno as am')
                     ->join('libros', 'libros.id_l', '=', 'prestamos.id_l')
                     ->join('usuarios', 'usuarios.idu', '=', 'prestamos.idu')
                     ->where('usuarios.nombre', 'LIKE', "%$request->q%")
                     ->orwhere('usuarios.apellido_paterno', 'LIKE', "%$request->q%")
                     ->orwhere('usuarios.apellido_materno', 'LIKE', "%$request->q%")
                     ->orWhere('prestamos.observacion_p', 'LIKE', "%$request->q%")
                     ->orWhere('libros.titulo', 'LIKE', "%$request->q%")
                    ->paginate( ($request->paginate) ? $request->paginate : 10 );
        return view('prestamos.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libros = Libro::where('status','=','disponible')->get();
        $usuarios = Usuario::where('usuarios.idtu', "3")->get();
        return view('prestamos.create')
        ->with('libros',$libros)
        ->with('usuarios',$usuarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //return $request;

        $this->validate($request,[
            'idu'=>'required',
            'fecha_p'=>'required',
            'observacion_p'=>'required',
            'fecha_dev'=>'required',
            'observacion_dev'=>'required',
            'id_l'=>'required',
            'tipo_p'=>'required',
            'status'=>'required',
            'activo'=>'required',
               ]);

               $prestamos = new Prestamo();
               $prestamos->idu = $request->idu;
               $prestamos->fecha_p= $request->fecha_p;
               $prestamos->observacion_p = $request->observacion_p;
               $prestamos->fecha_dev = $request->fecha_dev;
               $prestamos->observacion_dev = $request->observacion_dev;
               $prestamos->id_l = $request->id_l;
               $prestamos->tipo_p = $request->tipo_p;
               $prestamos->activo = $request->activo;
               $prestamos->status = $request->status;
               $prestamos->save();

               $libros= Libro::find($request->id_l);
               $libros->status = 'Prestado';
               $libros->save();

               return redirect()->route('prestamos.index')
               ->with('message', 'Registro creado exitosamente');
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
    public function edit(Prestamo $prestamo)
    {
        /*return ($estudiantes);*/
        $consulta = Prestamo::select('prestamos.id_p', 'prestamos.fecha_p', 'prestamos.observacion_p', 'prestamos.fecha_dev',
        'prestamos.observacion_dev', 'prestamos.tipo_p', 'prestamos.activo', 'prestamos.status',
        'libros.titulo as lib', 'usuarios.matricula as user','libros.id_l','usuarios.idu',
        'usuarios.nombre','usuarios.apellido_paterno', 'usuarios.apellido_materno')
                     ->join('libros', 'libros.id_l', '=', 'prestamos.id_l')
                     ->join('usuarios', 'usuarios.idu', '=', 'prestamos.idu')
                      ->where('prestamos.id_p', '=', $prestamo->id_p)->get();



      $libros = Libro::all();
      $usuarios = Usuario::all();
    //return $consulta[0];
    return view('prestamos.edit')
    ->with('consulta',$consulta[0])
    ->with('libros',$libros)
    ->with('usuarios',$usuarios);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        //return $request;


         $this->validate($request,[
            'idu'=>'required',
            'fecha_p'=>'required',
            'id_l'=>'required',
            'status'=>'required',
            'tipo_p'=>'required',
               ]);

               $prestamo = Prestamo::find($prestamo->id_p);
               $prestamo->idu = $request->idu;
               $prestamo->fecha_p= $request->fecha_p;
               $prestamo->observacion_p = $request->observacion_p;
               $prestamo->fecha_dev = $request->fecha_dev;
               $prestamo->observacion_dev = $request->observacion_dev;
               $prestamo->id_l = $request->id_l;
               $prestamo->tipo_p = $request->tipo_p;
               $prestamo->activo = $request->activo;
               $prestamo->status = $request->status;
               $prestamo->save();

            if($request->status = 'Disponible' )
            {
               $libros= Libro::find($request->id_l);
               $libros->status = 'Disponible';
               $libros->save();
            }


               return redirect()->route('prestamos.index')
               ->with('message', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestamo $prestamo)
    {
      $prestamo->forceDelete();
      return redirect()->route('prestamos.index')->with('message',"Registro eliminado exitosamente");
    }

    public function toggleStatus(Request $request, Prestamo $prestamo)
    {
        $prestamo->update($request->only('activo'));
        if($prestamo->activo==1){
            return redirect()->route('prestamos.index')->with('message', 'Registro activado exitosamente');
        }
        else{
            return redirect()->route('prestamos.index')->with('message', 'Registro desactivado exitosamente');
        }
    }

}
