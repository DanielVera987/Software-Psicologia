<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>PsicoSoft | Plataforma para Psicologos</title>
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <link rel="stylesheet" href="/css/app.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
    .sidebar-dark-primary{
      background-color: #FE669B;
    }
    .texto-blanco{
      color: white;
    }
    .navbar-light{
      background-color: #FE669B;
    }
    .card-primary.card-outline{
      border-top: 3px solid #E91E63;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li><a href="{{ route('logout') }}" style="color: white;">Salir</a></li>
      </ul>
    </nav>
    <!-- /.navbar -->

    

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.html" class="brand-link" style="border-bottom: 0px;">
        <h3 class="font-weight-light text-center">SoftPsico</h3>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../img/usuario.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="{{ route('user.edit') }}" class="d-block" style="color: white;">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              
              <a href="{{ route('home') }}" class="nav-link">
                <span class="nav-icon">📊&nbsp;&nbsp;&nbsp;</span>
                <p class="texto-blanco">
                   Control de Mando
                </p>
              </a>
            </li>
            <li class="nav-item">
              
              <a href="{{ route('paciente.index') }}" class="nav-link">
                <span class="nav-icon">👨‍👩‍👧‍👦</span>
                <p class="texto-blanco">
                  Pacientes
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('cita.index') }}" class="nav-link">
                <span class="nav-icon">👩🏼‍⚕️&nbsp;&nbsp;&nbsp;</span>
                <p class="texto-blanco">
                  Consultas
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('documentos.index') }}" class="nav-link">
                <span class="nav-icon">📁&nbsp;&nbsp;&nbsp;</span>
                <p class="texto-blanco">
                  Documentos
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('user.edit') }}" class="nav-link">
                <span class="nav-icon" >⚙️&nbsp;&nbsp;&nbsp;</span>
                <p class="texto-blanco">
                  Ajustes
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <main>
      @yield('content')
    </main>

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2020 <a href="http://danielvera.com.mx">Daniel Vera</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="/js/app.js"></script>
  
</body>

</html>