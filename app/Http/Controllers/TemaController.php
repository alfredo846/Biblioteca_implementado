<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\temas;
use App\Models\Libro;
use Illuminate\Validation\Rule;


class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = temas::
        select('temas.id_t', 'temas.nombre_t', 'temas.activo')
        ->orderBy('nombre_t', 'asc')
        ->where('temas.nombre_t', 'LIKE', "%$request->q%")
        ->paginate( ($request->paginate) ? $request->paginate : 10 );

        return view('temas.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('temas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre_t'=>'required|unique:temas|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
            'activo' => 'required'
        ]);

        $tema = new temas;
        $tema->nombre_t = $request->nombre_t;
        $tema->activo = $request->activo;
        $tema->save();
        return redirect()->route('temas.index')
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
    public function edit(temas $temas)
    {
        $consulta = temas::select('temas.id_t','temas.nombre_t', 'temas.activo')
        ->where('temas.id_t', '=', $temas->id_t)->get();
        /*return $consulta[0];*/
        return view('temas.edit')
        ->with('consulta',$consulta[0]);
            }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, temas $temas)
    {
        $this->validate($request,[
            'nombre_t' => ['required', 'regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/', Rule::unique('temas')->ignore($temas->nombre_t, 'nombre_t')],
            'activo'=>'required',

        ]);
        $temas= temas::find($temas->id_t);
         $temas->nombre_t= $request->nombre_t;
         $temas->activo = $request->activo;
         $temas->save();

         return redirect()->route('temas.index')
         ->with('message', 'Registro modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(temas $item)
    {
        $buscatema = Libro::where('id_t',$item->id_t)->get();
        $cuantos = count($buscatema);
        // dd ($cuantos);
         if($cuantos==0)
        {
        $item->forceDelete();
        return redirect()->route('temas.index')->with('message',"Registro eliminado exitosamente");
        } else{
        return redirect()->route('temas.index')->with('message',"El registro no se puede eliminar ya que tiene registros en Libros");
        }
    }

    public function toggleStatus(Request $request, temas $item)
    {
        $item->update($request->only('activo'));
        if($item->activo==1){
            return redirect()->route('temas.index')->with('message', 'Registro activado exitosamente');
        }
        else{
            return redirect()->route('temas.index')->with('message', 'Registro desactivado exitosamente');
        }
    }
}
