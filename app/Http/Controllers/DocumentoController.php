<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $documentos = Documento::with('paciente')->where('user_id', $user->id)->get();
        
        return view('documento.index', [
            'documentos' => $documentos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = Paciente::where('user_id', Auth::user()->id)->get();

        return view('documento.create', [
            'pacientes' => $pacientes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'paciente_id' => 'required|integer',
            'nombre' => 'required|string',
            'path' => 'required|mimes:jpg,jpeg,gif,doc,ppt,pdf,png'
        ]);

        if($validate){
            $file = $request->file('path');
            $nameOriginal = time().$file->getClientOriginalName();
            \Storage::disk('archivos')->put($nameOriginal, \File::get($file));

            $data = $request->all();
            $documento = new Documento;
            $documento->user_id = Auth::user()->id;
            $documento->paciente_id = $data['paciente_id'];
            $documento->nombre = $data['nombre'];
            $documento->path = $nameOriginal;
            $documento->save();

            return redirect()->route('documentos.index')->with('message', 'documento creado');
        }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(is_numeric($id))
        {
            $documento = Documento::with('paciente')->where('user_id', Auth::user()->id)->find($id);
            if($documento)
            {
                $isExists = Storage::disk('archivos')->exists($documento->path);

                //Borrar el archivo
                if($isExists){
                    Storage::disk('archivos')->delete($documento->path);
                }

                $documento->delete();
                return redirect()->route('documentos.index')->with('message', 'Documento eliminado');
            }
        }

        return redirect()->route('documentos.index')->with('message', 'No existe el documento');
    }
}
