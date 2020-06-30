<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Cita;
use App\Models\Documento;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $numPacientes = Paciente::where('user_id', $user->id)->count();
        $numCitas = Cita::all()->count();
        $numDocs = Documento::all()->count();

        $pacientesRecientes = Paciente::where('user_id', $user->id)->orderBy('id','desc')->limit(3)->get();
        $citasRecientes = Cita::limit(3)->get();
        
        return view('dashboard',[
            'numPacientes' => $numPacientes,
            'numCitas' => $numCitas,
            'numDocs' => $numDocs,
            'pacientes' => $pacientesRecientes,
            'citas' => $citasRecientes
        ]);
    }
}
