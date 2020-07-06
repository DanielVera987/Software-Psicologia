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
            <li class="breadcrumb-item active"><a href="{{ route('paciente.index') }}"> Consultas</a></li>
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
              <h3 class="">Nueva Consulta  👨‍👩‍👧‍👦</h3>
              <form method="POST" action="{{ route('paciente.store') }}">
                @csrf

                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="nombre" class="col-form-label text-muted">Titulo</label>
                      <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                      @error('nombre')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="col-md-12">
                    <label for="nombre" class="col-form-label text-muted">Descripción</label>
                    <textarea name="" id="" class="form-control @error('nombre') is-invalid @enderror"></textarea>

                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="nombre" class="col-form-label text-muted">Fecha Inicio</label>
                        <input type="date"class="form-control" name="" id="" placeholder="">

                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>

                      <div class="col-md-6">
                        <label for="nombre" class="col-form-label text-muted">Fecha Final</label>
                        <input type="date"class="form-control" name="" id="" placeholder="">

                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                          <label for="nombre" class="col-form-label text-muted">Hora Inicio</label>
                          <input type="time"class="form-control" name="" id="" placeholder="">
    
                          @error('nombre')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
    
                      <div class="col-md-6">
                        <label for="nombre" class="col-form-label text-muted">Hora Final</label>
                          <input type="time"class="form-control" name="" id="" placeholder="">
    
                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                    
                </div>

                <br>
                <h4>Información del Paciente</h4>
                <hr>
                <div class="form-group row">
                  <div class="col-md-6">
                      <label for="nombre" class="col-form-label text-muted">Paciente</label>
                      <select name="" id="" class="form-control @error('nombre') is-invalid @enderror" required>
                        <option value="">Seleccionar....</option>
                      </select>

                      @error('nombre')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>

                  <div class="col-md-12">
                    <label for="nombre" class="col-form-label text-muted">Observaciones</label>
                    <textarea name="" id="" class="form-control @error('nombre') is-invalid @enderror"></textarea>

                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="col-md-12">
                    <br>
                    <h6><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Actividad Dibujo</strong></h6>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <table class="table">
                      <tr>
                        <td><span for="nombre" class="col-form-label text-muted">Se nego:&nbsp;&nbsp; </span></td>
                        <td>
                          <input type="radio" name="nego[]" id="" value="Si">Si&nbsp;&nbsp;
                          <input type="radio" name="nego[]" id="" value="No">No
                        </td>
                      </tr>
                      <tr>
                        <td><span for="nombre" class="col-form-label text-muted">Acepto la actividad:&nbsp;&nbsp; </span> </span></td>
                        <td>
                          <input type="radio" name="acepto[]" id="" value="Si">Si&nbsp;&nbsp;
                          <input type="radio" name="acepto[]" id="" value="No">No
                        </td>
                      </tr>
                      <tr>
                        <td><span for="nombre" class="col-form-label text-muted">Se distrajo:&nbsp;&nbsp; </span> </span></td>
                        <td>
                          <input type="radio" name="distrajo[]" id="" value="Si">Si&nbsp;&nbsp;
                          <input type="radio" name="distrajo[]" id="" value="No">No
                        </td>
                      </tr>
                      <tr>
                        <td><span for="nombre" class="col-form-label text-muted">Se concentro:&nbsp;&nbsp; </span> </span></td>
                        <td>
                          <input type="radio" name="concentro[]" id="" value="Si">Si&nbsp;&nbsp;
                          <input type="radio" name="concentro[]" id="" value="No">No
                        </td>
                      </tr>
                      <tr>
                        <td><span for="nombre" class="col-form-label text-muted">Borro alguna parte:&nbsp;&nbsp; </span> </span></td>
                        <td>
                          <input type="radio" name="borro[]" id="" value="Si">Si&nbsp;&nbsp;
                          <input type="radio" name="borro[]" id="" value="No">No
                        </td>
                      </tr>
                    </table>

                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  
                  <div class="col-md-6">
                  </div>
                </div>

                <br>
                <h4>Información de Pago</h4>   
                <div class="form-group row">
                  <div class="col-md-6">
                      <label for="nombre" class="col-form-label text-muted">Paciente</label>
                      <select name="" id="" class="form-control @error('nombre') is-invalid @enderror" required>
                        <option value="">Seleccionar....</option>
                      </select>

                      @error('nombre')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
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