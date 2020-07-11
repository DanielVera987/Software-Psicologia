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
            <li class="breadcrumb-item active"><a href="{{ route('documentos.index') }}"> Documentos</a></li>
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
              <h3 class="float-left">Documentos  👨‍👩‍👧‍👦</h3>
              <a class="btn btn-primary btn-sm float-right" href="{{ route('documentos.create') }}" role="button">Nuevo Documento</a>
              <div class="table-responsive">
                @if(session()->has('message'))
                  <div class="alert alert-success">
                      {{ session()->get('message') }}
                  </div>
                @endif
                <table class="table mt-3">
                  <thead>
                    <tr>
                      <th>Nombre de Docs</th>
                      <th>Pertenece a</th>
                      <th>Documento</th>
                      <th>Fecha creacion</th>
                      <th>Administrar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($documentos as $documento)
                      <tr>
                        <td scope="row">
                            <p>{{ $documento->nombre }}</p>
                        </td>
                        <td>{{ $documento->paciente->nombre }} {{ $documento->paciente->apellido }}</td>
                        <td ><img width="80" src="{{ $documento->path }}"></td>
                        <td>{{ $documento->created_at }}</td>
                        <td> 
                          <form method="POST" action="{{ route('documentos.destroy', [$documento->id]) }}">
                            @csrf
                            @method('DELETE')
                              <a href="{{ route('documentos.edit',[$documento->id]) }}">✏️</a>  
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