<?php

namespace App\Http\Controllers;
use App\Models\Carrera;
use App\Models\autores;
use App\Models\editoriales;
use App\Models\Libro;
use App\Models\Prestamo;
use App\Models\temas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class librosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Libro::select('libros.id_l', 'libros.titulo', 'libros.subtitulo','libros.lugar_p','libros.año_p',
        'libros.edicion', 'libros.paginacion','libros.isbn','libros.notas',
        'libros.titulo_v', 'libros.serie', 'libros.ubicacion', 'libros.clasificacion',
        'libros.status', 'libros.activo',
        'autors.nombre_a as aut', 'carreras.nombre as carre', 'editorials.nombre_e as edi', 'temas.nombre_t as tem')
        ->orderby('titulo')
        ->join('carreras', 'carreras.idca', '=', 'libros.idca')
        ->join('autors', 'autors.id_a', '=', 'libros.id_a')
        ->join('editorials', 'editorials.id_e', '=', 'libros.id_e')
        ->join('temas', 'temas.id_t', '=', 'libros.id_t')
        ->where('libros.titulo', 'LIKE', "%$request->q%")
        ->paginate( ($request->paginate) ? $request->paginate : 10 );

        return view('libros.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libros = Libro::all();
        $carreras = Carrera::all();
        $autores = autores::all();
        $editoriales = editoriales::all();
        $temas = temas::all();
        return view('libros.create')
        ->with('libros',$libros)
        ->with('carreras',$carreras)
        ->with('editoriales',$editoriales)
        ->with('temas',$temas)
        ->with('autores',$autores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request;
        $this->validate($request, [
            'titulo'=>'required|unique:libros|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
            'subtitulo' =>'required',
            'lugar_p' =>'required',
            'año_p' =>'required|numeric',
            'edicion' =>'required',
            'paginacion' =>'required',
            'isbn' =>'required',
            'notas' =>'required',
            'titulo_v' =>'required',
            'serie' =>'required',
            'idca' => 'required',
            'id_a' => 'required',
            'id_t' => 'required',
            'id_e' => 'required',
            'ubicacion' =>'required',
            'clasificacion' =>'required',
            'status' => 'required',
            'activo' => 'required',
        ]);

        $libros = new Libro;
        $libros->titulo = $request->titulo;
        $libros->subtitulo = $request->subtitulo;
        $libros->lugar_p = $request->lugar_p;
        $libros->año_p = $request->año_p;
        $libros->edicion = $request->edicion;
        $libros->paginacion = $request->paginacion;
        $libros->isbn = $request->isbn;
        $libros->notas = $request->notas;
        $libros->titulo_v = $request->titulo_v;
        $libros->serie = $request->serie;
        $libros->idca = $request->idca;
        $libros->id_a = $request->id_a;
        $libros->id_e = $request->id_e;
        $libros->id_t = $request->id_t;
        $libros->ubicacion = $request->ubicacion;
        $libros->clasificacion = $request->clasificacion;
        $libros->status = $request->status;
        $libros->activo = $request->activo;

        $libros->save();
        return redirect()->route('libros.index')
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
    public function edit(Libro $libros)
    {
        $consulta = Libro::select('libros.id_l', 'libros.titulo', 'libros.subtitulo','libros.lugar_p','libros.año_p',
        'libros.edicion', 'libros.paginacion','libros.isbn','libros.notas',
        'libros.titulo_v', 'libros.serie', 'libros.ubicacion', 'libros.clasificacion',
        'libros.status', 'libros.activo', 'libros.idca', 'libros.id_a', 'libros.id_e', 'libros.id_t',
        'autors.nombre_a as aut', 'carreras.nombre as carre', 'editorials.nombre_e as edi', 'temas.nombre_t as tem')
        ->orderby('titulo')
        ->join('carreras', 'carreras.idca', '=', 'libros.idca')
        ->join('autors', 'autors.id_a', '=', 'libros.id_a')
        ->join('editorials', 'editorials.id_e', '=', 'libros.id_e')
        ->join('temas', 'temas.id_t', '=', 'libros.id_t')
        ->where('libros.id_l', '=' , $libros->id_l)->get();

        $libros = Libro::all();
        $carreras = Carrera::all();
        $autores = autores::all();
        $editoriales = editoriales::all();
        $temas = temas::all();
        return view('libros.edit')
        ->with('consulta',$consulta[0])
        ->with('carreras',$carreras)
        ->with('editoriales',$editoriales)
        ->with('temas',$temas)
        ->with('autores',$autores);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libros)
    {
        $this->validate($request, [
            'titulo' => ['required', 'regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/', Rule::unique('libros')->ignore($libros->titulo, 'titulo')],
            'subtitulo' =>'required',
            'lugar_p' =>'required',
            'año_p' =>'required|numeric',
            'edicion' =>'required',
            'paginacion' =>'required',
            'isbn' =>'required',
            'notas' =>'required',
            'titulo_v' =>'required',
            'serie' =>'required',
            'idca' => 'required',
            'id_a' => 'required',
            'id_t' => 'required',
            'id_e' => 'required',
            'ubicacion' =>'required',
            'clasificacion' =>'required',
            'status' => 'required',
            'activo' => 'required',
        ]);

        $libros = Libro::find($libros->id_l);
        $libros->titulo = $request->titulo;
        $libros->subtitulo = $request->subtitulo;
        $libros->lugar_p = $request->lugar_p;
        $libros->año_p = $request->año_p;
        $libros->edicion = $request->edicion;
        $libros->paginacion = $request->paginacion;
        $libros->isbn = $request->isbn;
        $libros->notas = $request->notas;
        $libros->titulo_v = $request->titulo_v;
        $libros->serie = $request->serie;
        $libros->idca = $request->idca;
        $libros->id_a = $request->id_a;
        $libros->id_e = $request->id_e;
        $libros->id_t = $request->id_t;
        $libros->ubicacion = $request->ubicacion;
        $libros->clasificacion = $request->clasificacion;
        $libros->status = $request->status;
        $libros->activo = $request->activo;

        $libros->save();
        return redirect()->route('libros.index')
         ->with('message', 'Registro modificado exitosamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $buscalibro = Prestamo::where('id_l',$libro->id_l)->get();
        $cuantos = count($buscalibro);
        // dd ($cuantos);
         if($cuantos==0)
        {
        $libro->forceDelete();
        return redirect()->route('libros.index')->with('message',"Registro eliminado exitosamente");
        }
        else{
            return redirect()->route('libros.index')->with('message',"El registro no se puede eliminar ya que tiene registros en Prestamos");
        }
    }

    public function toggleStatus(Request $request, Libro $item)
    {
        $item->update($request->only('activo'));
        if($item->activo==1){
            return redirect()->route('libros.index')->with('message', 'Registro activado exitosamente');
        }
        else{
            return redirect()->route('libros.index')->with('message', 'Registro desactivado exitosamente');
        }
    }

    public function downloadPDF(Libro $item){
        $libro = Libro::find($item->id_l);

        view()->share('libros.download', $libro);

        $pdf = PDF::loadView('libros.download', ['libro' => $libro]);

        return $pdf->download('clasificacion.pdf');
    }
}
