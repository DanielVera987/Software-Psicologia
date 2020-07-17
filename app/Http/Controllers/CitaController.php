<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
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
        $citas = Cita::with('paciente')->where('user_id', $user->id)->get();
        
        return view('cita.index', [
            'citas' => $citas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $pacientes = Paciente::where('user_id', $user->id)->get();
        return view('cita.create', [
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

        $this->dateValidate($request);

        $data = $request->all();

        $newCita = new Cita();
        $newCita->user_id = Auth::user()->id;
        $newCita->paciente_id = $data['paciente_id'];
        $newCita->title = $data['title'];
        $newCita->descripcion = $data['descripcion'];
        $newCita->observaciones = $data['observaciones'];
        $newCita->negacion = (isset($data['nego'])) ? $data['nego'][0] : '';
        $newCita->aceptacion = (isset($data['acepto'])) ? $data['acepto'][0] : '';
        $newCita->distrajo = (isset($data['distrajo'])) ? $data['distrajo'][0] : '';
        $newCita->concentro = (isset($data['concentro'])) ? $data['concentro'][0] : '';
        $newCita->borro = (isset($data['borro'])) ? $data['borro'][0] : '';
        $newCita->pagado = (isset($data['pagado'])) ? $data['pagado'] : 'No';
        $newCita->finalizado = (isset($data['finalizado'])) ? $data['finalizado'] : 'No';
        $newCita->medio_pago = $data['medio_pago'];
        $newCita->importe = $data['importe'];
        $newCita->hora_inicio = $data['hora_inicio'];
        $newCita->hora_final = $data['hora_final'];
        $newCita->fecha_inicio = $data['fecha_inicio'];
        $newCita->fecha_final = $data['fecha_final'];
        $new = $newCita->save();

        $msj = '';
        ($new) ? $msj = "Cita guardada" : $msj = "La cita no se pudo crear :(";

        return redirect()->route('cita.index')->with('message', $msj);
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
        if(is_numeric($id))
        {
            $user = Auth::user();
            $getCita = Cita::with('paciente')->find($id);
            $getPacientes = Paciente::where('user_id', $user->id)->get();

            if($getCita)
            {
                return view('cita.edit', [
                    'getCita' => $getCita,
                    'pacientes' => $getPacientes
                ]);
            }
        }

        return redirect()->route('cita.index')->with('message', "No exite la cita");
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
        if(is_numeric($id)){

            $this->dateValidate($request);

            $data = $request->all();
            $update = Cita::find($id);

            if($update){
                unset($update->user_id);
                $update->update($data);
                $msj = "Cita actualizada";
            }else{
                $msj = "No existe la cita";
            }
        }else{
            $msj = "No existe la cita";
        }

        return redirect()->route('cita.index')->with('message', $msj);
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
            $cita = Cita::find($id);

            if($cita)
            {
                $cita->delete();
                $msj = "Cita eliminada";
                return redirect()->route('cita.index')->with('message', "Cita eliminada");
            }
        }

        return redirect()->route('cita.index')->with('message', "La cita no exite");
    }

    private function dateValidate($request)
    {
        $validate = $this->validate($request , [
            'title' => 'required|string|max: 255',
            'descripcion' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date',
            'hora_inicio' => 'required',
            'hora_final' => 'required',
            'paciente_id' => 'required|integer',
            'observaciones' => 'required|string|max:255',
            'nego' => 'nullable',
            'acepto' => 'nullable',
            'distrajo' => 'nullable',
            'concentro' => 'nullable',
            'borro' => 'nullable',
            'medio_pago' => 'required|string',
            'pagado' => 'string|nullable',
            'importe' => 'integer|nullable',
            'finalizado' => 'string|nullable'
        ]);

        return true;
    }
}
