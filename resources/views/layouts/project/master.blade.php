@include('layouts.project.header')

  @include('layouts.project.main-header')

  @include('layouts.project.mainsidebar')

  <!-- Content Wrapper. Contains page content -->


  @yield('content')



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
{{-- </div> --}}
<!-- ./wrapper -->
@include('layouts.project.footer')

@include('layouts.project.scripts')
</body>
</html>