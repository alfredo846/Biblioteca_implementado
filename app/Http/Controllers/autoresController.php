<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\autores;
use App\Models\Libro;
use Illuminate\Validation\Rule;

class autoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $items = autores::select('autors.id_a', 'autors.nombre_a', 'autors.nacionalidad_a',
            'autors.fecha_n', 'autors.fecha_d', 'autors.activo')
            ->orderBy('nombre_a', 'asc')
            ->where('autors.nombre_a', 'LIKE', "%$request->q%")
            ->paginate( ($request->paginate) ? $request->paginate : 10 );




       // $items = estudiantes::orderBy('nombre', 'asc')->where('nombre', 'LIKE', "%$request->q%")
         //           ->paginate( ($request->paginate) ? $request->paginate : 10 );
        return view('autores.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('autores.create');

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nacionalidad_a'=>'required',
            'nombre_a'=>'required|unique:autors|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ,.]+$/',
            'fecha_n'=>'required|date',
            'activo'=>'required'
        ]);

            $autores = new autores;
            $autores->nombre_a= $request->nombre_a;
            $autores->nacionalidad_a= $request->nacionalidad_a;
            $autores->fecha_n= $request->fecha_n;
            $autores->fecha_d= $request->fecha_d;
            $autores->activo = $request->activo;

            if($autores->fecha_d == null){
                 $autores->fecha_d= "No tiene";
            }

            $autores->save();
            return redirect()->route('autores.index')
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
    public function edit(autores $autores)
    {
        /*return ($estudiantes);*/
        $consulta = autores::select('autors.id_a','autors.nombre_a','autors.nacionalidad_a',
            'autors.activo', 'autors.fecha_n', 'autors.fecha_d')
                ->where('autors.id_a', '=', $autores->id_a)->get();

    /*return $consulta[0];*/
        return view('autores.edit')
            ->with('consulta',$consulta[0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, autores $autores)
    {
      //return $request;
        $this->validate($request,[
            'nombre_a' => ['required', 'regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/', Rule::unique('autors')->ignore($autores->nombre_a, 'nombre_a')],
            'nacionalidad_a'=>'required',
            'fecha_n'=>'required|date',
            'activo'=>'required',
        ]);

        $autores= autores::find($autores->id_a);
         $autores->nombre_a= $request->nombre_a;
         $autores->nacionalidad_a= $request->nacionalidad_a;
         $autores->fecha_n= $request->fecha_n;
         $autores->fecha_d= $request->fecha_d;
         $autores->activo = $request->activo;
         $autores->save();

         return redirect()->route('autores.index')
         ->with('message', 'Registro modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(autores $item)
    {
        $buscaautor = Libro::where('id_a',$item->id_a)->get();
        $cuantos = count($buscaautor);
        // dd ($cuantos);
         if($cuantos==0)
        {
        $item->forceDelete();
        return redirect()->route('autores.index')->with('message',"Registro eliminado exitosamente");
        }  else {
        return redirect()->route('autores.index')->with('message',"El registro no se puede eliminar ya que tiene registros en Libros");
        }
    }

    public function toggleStatus(Request $request, autores $item)
    {
        $item->update($request->only('activo'));
        if($item->activo==1){
            return redirect()->route('autores.index')->with('message', 'Registro activado exitosamente');
        }
        else{
            return redirect()->route('autores.index')->with('message', 'Registro desactivado exitosamente');
        }
    }

}
