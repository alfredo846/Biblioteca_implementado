<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\editoriales;
use App\Models\Libro;
use Illuminate\Validation\Rule;

class editorialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $items = editoriales::select('editorials.id_e', 'editorials.nombre_e', 'editorials.activo')
            ->orderBy('nombre_e', 'asc')
            ->where('editorials.nombre_e', 'LIKE', "%$request->q%")
            ->paginate( ($request->paginate) ? $request->paginate : 10 );
        return view('editoriales.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editoriales.create');

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   }

    public function store(Request $request)
    {
    //    return $request;
        $this->validate($request,[
          'nombre_e'=>'required|unique:editorials|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
          'activo'=>'required'
        ]);

        $editoriales = new editoriales;
        $editoriales->nombre_e = $request->nombre_e;
        $editoriales->activo = $request->activo;
        $editoriales->save();

        return redirect()->route('editoriales.index')
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
    public function edit(editoriales $editoriales)
    {
        /*return ($estudiantes);*/
        $consulta = editoriales::select('editorials.id_e','editorials.nombre_e', 'editorials.activo')
            ->where('editorials.id_e', '=', $editoriales->id_e)->get();

    /*return $consulta[0];*/
        return view('editoriales.edit')
            ->with('consulta',$consulta[0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, editoriales $editoriales)
    {
      //return $request;
        $this->validate($request,[
            'nombre_e' => ['required', 'regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/', Rule::unique('editorials')->ignore($editoriales->nombre_e, 'nombre_e')],
            'activo'=>'required',
        ]);

         $editoriales= editoriales::find($editoriales->id_e);
         $editoriales->nombre_e= $request->nombre_e;
         $editoriales->activo = $request->activo;
         $editoriales->save();

         return redirect()->route('editoriales.index')
         ->with('message', 'Registro modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(editoriales $item)
    {
        $buscaeditorial = Libro::where('id_e',$item->id_e)->get();
        $cuantos = count($buscaeditorial);
        // dd ($cuantos);
         if($cuantos==0)
        {
        $item->forceDelete();
        return redirect()->route('editoriales.index')->with('message',"Registro eliminado exitosamente");
        } else {
        return redirect()->route('editoriales.index')->with('message',"El registro no se puede eliminar ya que tiene registros en Libros");
        }
    }

    public function toggleStatus(Request $request, editoriales $item)
    {
        $item->update($request->only('activo'));
        if($item->activo==1){
            return redirect()->route('editoriales.index')->with('message', 'Registro activado exitosamente');
        }
        else{
            return redirect()->route('editoriales.index')->with('message', 'Registro desactivado exitosamente');
        }
    }

}
