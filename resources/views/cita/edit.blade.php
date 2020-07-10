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
              <form method="POST" action="{{ route('cita.update', [$getCita->id])  }}">
                @csrf
                @method('put')

                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="title" class="col-form-label text-muted">Titulo</label>
                      <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $getCita->title }}" required autocomplete="title" autofocus>

                      @error('title')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="col-md-12">
                    <label for="descripcion" class="col-form-label text-muted">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" required>{{ $getCita->descripcion }}</textarea>

                    @error('descripcion')
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
                        <label for="fecha_inicio" class="col-form-label text-muted">Fecha Inicio</label>
                        <input type="date"class="form-control  @error('fecha_inicio') is-invalid @enderror" name="fecha_inicio" id="fecha_inicio" value="{{ $getCita->fecha_inicio }}" required placeholder="">

                        @error('fecha_inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>

                      <div class="col-md-6">
                        <label for="fecha_final" class="col-form-label text-muted">Fecha Final</label>
                        <input type="date"class="form-control @error('fecha_final') is-invalid @enderror" name="fecha_final" id="fecha_final" value="{{ $getCita->fecha_final }}" required placeholder="">

                        @error('fecha_final')
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
                          <label for="hora_inicio" class="col-form-label text-muted">Hora Inicio</label>
                          <input type="time"class="form-control @error('hora_inicio') is-invalid @enderror" name="hora_inicio" value="{{ $getCita->hora_inicio }}" required id="hora_inicio" placeholder="">
    
                          @error('hora_inicio')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
    
                      <div class="col-md-6">
                        <label for="hora_final" class="col-form-label text-muted">Hora Final</label>
                          <input type="time" class="form-control @error('hora_final') is-invalid @enderror" name="hora_final" id="hora_final" value="{{ $getCita->hora_final }}" required placeholder="">
    
                        @error('hora_final')
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
                      <label for="paciente_id" class="col-form-label text-muted ">Paciente</label>
                      <select name="paciente_id" id="paciente_id" class="form-control @error('paciente_id') is-invalid @enderror" required>
                        <option value="">Seleccionar....</option>
                        <option value="{{ $getCita->paciente->id }}" selected>{{ $getCita->paciente->nombre }} {{ $getCita->paciente->apellido }}</option>
                        @foreach($pacientes as $paciente)
                          @if($getCita->paciente->id != $paciente->id)
                            <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellido }}</option>
                          @endif
                        @endforeach
                      </select>

                      @error('paciente_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>

                  <div class="col-md-12">
                    <label for="observaciones" class="col-form-label text-muted">Observaciones</label>
                    <textarea name="observaciones" id="observaciones" class="form-control @error('observaciones') is-invalid @enderror" required>{{ $getCita->observaciones }}</textarea>

                    @error('observaciones')
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
                        <td><span for="nego" class="col-form-label text-muted">Se nego:&nbsp;&nbsp; </span></td>
                        <td>
                          <input type="radio" name="nego[]" class=" @error('nego') is-invalid @enderror" id="nego" value="Si" @if($getCita->negacion == 'Si') checked @endif>Si&nbsp;&nbsp;
                          <input type="radio" name="nego[]" class=" @error('nego') is-invalid @enderror" id="nego" value="No" @if($getCita->negacion == 'No') checked @endif>No
                          @error('nego')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </td>
                      </tr>
                      <tr>
                        <td><span for="acepto" class="col-form-label text-muted">Acepto la actividad:&nbsp;&nbsp; </span> </span></td>
                        <td>
                          <input type="radio" name="acepto[]" class=" @error('acepto') is-invalid @enderror" id="acepto" value="Si" @if($getCita->aceptacion == 'Si') checked @endif>Si&nbsp;&nbsp;
                          <input type="radio" name="acepto[]" class=" @error('acepto') is-invalid @enderror" id="acepto" value="No" @if($getCita->aceptacion == 'No') checked @endif>No
                          @error('acepto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </td>
                      </tr>
                      <tr>
                        <td><span for="distrajo" class="col-form-label text-muted">Se distrajo:&nbsp;&nbsp; </span> </span></td>
                        <td>
                          <input type="radio" name="distrajo[]" class=" @error('distrajo') is-invalid @enderror" id="distrajo" value="Si" @if($getCita->distrajo == 'Si') checked @endif>Si&nbsp;&nbsp;
                          <input type="radio" name="distrajo[]" class=" @error('distrajo') is-invalid @enderror" id="distrajo" value="No" @if($getCita->distrajo == 'No') checked @endif>No
                          @error('distrajo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </td>
                      </tr>
                      <tr>
                        <td><span for="concentro" class="col-form-label text-muted">Se concentro:&nbsp;&nbsp; </span> </span></td>
                        <td>
                          <input type="radio" name="concentro[]" class=" @error('concentro') is-invalid @enderror" id="concentro" value="Si" @if($getCita->concentro == 'Si') checked @endif>Si&nbsp;&nbsp;
                          <input type="radio" name="concentro[]" class=" @error('concentro') is-invalid @enderror" id="concentro" value="No" @if($getCita->concentro == 'No') checked @endif>No
                          @error('concentro')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </td>
                      </tr>
                      <tr>
                        <td><span for="borro" class="col-form-label text-muted">Borro alguna parte:&nbsp;&nbsp; </span> </span></td>
                        <td>
                          <input type="radio" name="borro[]" class=" @error('borro') is-invalid @enderror" id="borro" value="Si" @if($getCita->borro == 'Si') checked @endif>Si&nbsp;&nbsp;
                          <input type="radio" name="borro[]" class=" @error('borro') is-invalid @enderror" id="borro" value="No" @if($getCita->borro == 'No') checked @endif>No
                          @error('borro')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </td>
                      </tr>
                    </table>
                  </div>
                  
                  <div class="col-md-6">
                  </div>
                </div>

                <br>
                <h4>Información de Pago</h4>   
                <div class="form-group row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="medio_pago" class="col-form-label text-muted">Medio de pago</label>
                        <select name="medio_pago" id="medio_pago" class="form-control @error('medio_pago') is-invalid @enderror" required>
                          <option value="{{ $getCita->medio_pago }}">{{ $getCita->medio_pago }}</option>
                          <option value="gratis">Gratis</option>
                          <option value="transferencia">Transferencia</option>
                          <option value="tarjeta">Tarjeta</option>
                          <option value="efectivo">Efectivo</option>
  
                        </select>
  
                        @error('medio_pago')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <br><br>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="pagado" id="pagado" class="custom-control-input @error('pagado') is-invalid @enderror" value="si" @if($getCita->pagado == 'Si') checked  @endif id="pagado">
                              <label class="custom-control-label" for="pagado">Pagado</label>
                            </div>
                        </div>

                        @error('pagado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" name="importe" class="form-control @error('importe') is-invalid @enderror" id="importe" value="{{ $getCita->importe }}" aria-label="Amount (to the nearest dollar)" placeholder="Importe">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                        </div>
  
                        @error('importe')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <div class="custom-control custom-checkbox mt-1">
                              <input type="checkbox" name="finalizado" class="custom-control-input @error('finalizado') is-invalid @enderror" @if($getCita->finalizado == 'Si') checked @endif  id="finalizado">
                              <label class="custom-control-label" for="finalizado">Finalizado</label>
                            </div>
                        </div>

                        @error('finalizado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                  </div>          
                </div>

                <button type="submit" class="btn btn-success">Crear</button>
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