@extends('layouts.admin')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Control de mando / </a> <li>
            <li class="breadcrumb-item active"><a href="{{ route('paciente.index') }}"> Pacientes</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-primary card-outline">
            <div class="card-body">
              <h3 class="float-left">Consultas  👨‍👩‍👧‍👦</h3>
              <a class="btn btn-primary btn-sm float-right" href="{{ route('cita.create') }}" role="button">Nueva Consulta</a>
              <div class="table-responsive">
                @if(session()->has('message'))
                  <div class="alert alert-success">
                      {{ session()->get('message') }}
                  </div>
                @endif
                <table class="table mt-3">
                  <thead>
                    <tr>
                      <th>Paciente</th>
                      <th>Fecha Inicio</th>
                      <th>Fecha Final</th>
                      <th>Horario Inicio</th>
                      <th>Horario Fin</th>
                      <th>Administrar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($citas as $cita)
                      <tr>
                        <td scope="row">
                            <p>{{ $cita->paciente->nombre }} {{ $cita->paciente->apellido }}</p>
                        </td>
                        <td>{{ $cita->fecha_inicio }}</td>
                        <td >{{ $cita->fecha_final }}</td>
                        <td>{{ $cita->hora_inicio }}</td>
                        <td>{{ $cita->hora_final }}</td>
                        <td> 
                          <form method="POST" action="{{ route('cita.destroy', [$cita->id]) }}">
                            @csrf
                            @method('DELETE')
                              <a href="{{ route('cita.edit',[$cita->id]) }}">✏️</a>  
                              <button type="submit" style="border: none;background: #fff;">❌</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div><!-- /.card -->
        </div>
      </div><!-- /.row -->


    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection