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
              <h3 class="">Nuevo Paciente  👨‍👩‍👧‍👦</h3>
              <form method="POST" action="{{ route('paciente.update', [$paciente->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    
                  <div class="col-md-6">
                      <label for="nombre" class="col-form-label text-muted">Nombre</label>
                      <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $paciente->nombre }}" required autocomplete="nombre" autofocus>

                      @error('nombre')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>

                  <div class="col-md-6">
                    <label for="apellido" class="col-form-label text-muted">Apellido</label>
                    <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ $paciente->apellido }}" required autocomplete="apellido">

                    @error('apellido')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="sexo" class="col-form-label text-muted">Sexo</label>

                    <select class="form-control @error('sexo') is-invalid @enderror" name="sexo" id="sexo">
                      
                        <option value="H" @if($paciente->sexo == 'H') selected  @endif>Hombre</option>
                      <option value="M" @if($paciente->sexo == 'H') selected  @endif>Mujer</option>
                    </select>

                    @error('sexo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="col-md-6">
                    <label for="edad" class="col-form-label text-muted">Edad</label>

                    <input id="edad" type="text" class="form-control @error('edad') is-invalid @enderror" name="edad" value="{{ $paciente->edad }}" required autocomplete="edad">

                    @error('edad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="direccion" class="col-form-label text-muted">Dirección</label>

                    <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ $paciente->direccion }}" required autocomplete="direccion">

                    @error('direccion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="col-md-6">
                    <label for="fechaNac" class="col-form-label text-muted">Fecha Nacimiento</label>

                    <input id="fechaNac" type="date" class="form-control @error('fechaNac') is-invalid @enderror" name="fechaNac" value="{{ $paciente->fechaNac }}" required autocomplete="email">

                    @error('fechaNac')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="telefono" class="col-form-label text-muted">Telefono</label>

                    <input id="telefono" type="tel" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ $paciente->telefono }}" required autocomplete="telefono">

                    @error('telefono')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="notas" class="col-form-label text-muted">Notas</label>

                    <textarea class="form-control @error('telefono') is-invalid @enderror" name="notas" id="notas" >
                      {{ $paciente->notas }}
                    </textarea>

                    @error('notas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">
                            Crear
                        </button>
                    </div>
                </div>
            </form>

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