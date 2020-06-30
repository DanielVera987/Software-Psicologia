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
              <h3 class="float-left">Pacientes  👨‍👩‍👧‍👦</h3>
              <a class="btn btn-primary btn-sm float-right" href="{{ route('paciente.create') }}" role="button">Nuevo Paciente</a>
              <div class="table-responsive">
                @if(session()->has('message'))
                  <div class="alert alert-success">
                      {{ session()->get('message') }}
                  </div>
                @endif
                <table class="table mt-3">
                  <thead>
                    <tr>
                      <th>Nombre Completo</th>
                      <th>Fecha Nac.</th>
                      <th>Dirección</th>
                      <th>Telefono</th>
                      <th>Administrar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pacientes as $paciente)
                      <tr>
                        <td scope="row">
                            <p>{{ $paciente->nombre }} {{ $paciente->apellido }}</p>
                        </td>
                        <td>{{ $paciente->fechaNac }}</td>
                        <td >{{ $paciente->direccion }}</td>
                        <td>{{ $paciente->telefono }}</td>
                        <td> 
                          <form method="POST" action="{{ url("paciente/{$paciente->id}") }}">
                            @csrf
                            @method('DELETE')
                              <a href="{{ route('paciente.edit', [$paciente->id]) }}">✏️</a>  
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