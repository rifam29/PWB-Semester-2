@extends('template.login')

@section('title','AdminLTE 3 | Dashboard')

@push('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
<style>
.btn-fixed-width {
    width: 100px; /* Set the desired fixed width */
}
</style>
@endpush

@section('content')
@if(Auth::check())
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"> SELAMAT DATANG ANDA BERHASIL LOGIN 
                    <small>Selamat Datang {{ Auth::user()->username }}</small>
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6 text-right">
                <a href="{{ route('user.logout') }}" class="btn btn-danger btn-fixed-width">Logout</a>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Data Cast</h5>

                <p class="card-text">
                    Inside there is some cast data that you can see, let's explore
                </p>

                <a href="{{ route('cast.index') }}" class="card-link">Start</a>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          @can('isAdmin')
          <div class="col-lg-6">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Create Cast</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">You can Create some cast</h6>

                <p class="card-text">let's create a new cast data in it, let's explore.</p>
                <a href="{{ route('cast.create') }}" class="btn btn-primary">Create</a>
              </div>
            </div>
          </div>
          @endcan
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@else
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Silahkan Login Terlebih Dahulu</h4>
            <p>Anda harus login untuk mengakses halaman ini.</p>
            <hr>
            <a href="{{ route('user.login') }}" class="btn btn-primary" style="text-decoration: none;">Login</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
    <!-- /.content-header -->
@endsection

@push('js')
<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush