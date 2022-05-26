<!DOCTYPE html>
<html lang="en">
@include('Backend.Head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
@include('Backend.Navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('Backend.Sidebar')

  <!-- Content Wrapper. Contains page content -->
@yield('index')
  <!-- /.content-wrapper -->
 @include('Backend.Footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@include('Backend.Script')
</body>
</html>
