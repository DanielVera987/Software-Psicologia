@extends('layouts.admin')


@section('content')
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Bienvenido de nuevo {{ Auth::user()->nombre }} 😊</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><a href="#">Cotrol de mando</a></li>
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

            <div class="col-lg-4">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <h2><strong>{{ $numPacientes }}</strong></h2><h5 class="card-title">Pacientes </h5>
                    </div>
                    <div class="col-md-6">
                      <div style="font-size: 45px;">👨‍👩‍👧‍👦</div>
                    </div>
                  </div>
                </div>
              </div><!-- /.card -->
            </div>

            <div class="col-lg-4">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <h2><strong>{{ $numCitas }}</strong></h2><h5 class="card-title">Citas </h5>
                    </div>
                    <div class="col-md-6">
                      <div style="font-size: 45px;">📋</div>
                    </div>
                  </div>
                </div>
              </div><!-- /.card -->
            </div>

            <div class="col-lg-4">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <h2><strong>{{ $numDocs }}</strong></h2><h5 class="card-title">Documentos </h5>
                    </div>
                    <div class="col-md-6">
                      <div style="font-size: 45px;">📁</div>
                    </div>
                  </div>
                </div>
              </div><!-- /.card -->
            </div>
          </div><!-- /.row -->

          <div class="row">


            <div class="col-lg-6">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <h5 class="card-title">Citas Recientes </h5>
                  <table class="table">
                    <tbody>
                      @foreach($citas as $cita)
                        <tr>
                          <td scope="row">
                              {{ $cita->title }}
                              <p class="small">{{ $cita->fecha_inicio }}</p>
                          </td>
                          <td >{{ $cita->hora_inicio }}</td>
                          <td>❤️</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div><!-- /.card -->
            </div>

            <div class="col-lg-6">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <h5 class="card-title">Pacientes Recientes </h5>
                  <table class="table">
                    <tbody>
                      @foreach ($pacientes as $item)
                        <tr>
                          <td scope="row">
                              {{ $item->nombre }} {{ $item->apellido }}
                              <p class="small">{{ $item->created_at }}</p>
                          </td>
                          <td>
                            @if ($item->sexo == 'H')
                              👦
                            @else
                              👧
                            @endif
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div><!-- /.row -->


        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection