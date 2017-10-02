<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>{{ config('app.name') }} </title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!-- Bootstrap 3.3.7 -->
   <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
   <!-- Ionicons -->
   <link rel="stylesheet" href="{{ asset('assets/vendor/Ionicons/css/ionicons.min.css') }}">
   <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

   @yield('styles')

   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('assets/vendor/admin-lte/dist/css/AdminLTE.min.css') }}">
   <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="{{ asset('assets/vendor/admin-lte/dist/css/skins/_all-skins.min.css') }}">

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

   <!-- Google Font -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> 
   

</head>

<body class="hold-transition skin-blue sidebar-mini">
   <div class="wrapper">

      <!-- Main Header -->
      @include('components/header')

      <!-- Left side column. contains the logo and sidebar -->
      @include('components/sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         @yield('content')
      </div>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      @include('components/footer')

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
         <!-- Tab panes -->
         <div class="tab-content">
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
         </div>
      </aside>
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
   </div>
   <!-- ./wrapper -->

   <!-- jQuery 3 -->
   <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
   <!-- Bootstrap 3.3.7 -->
   <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
   <!-- AdminLTE App -->
   <script src="{{ asset('assets/vendor/admin-lte/dist/js/adminlte.min.js') }}"></script>
   <!-- AdminLTE for demo purposes -->
   <script src="{{ asset('assets/vendor/admin-lte/dist/js/demo.js') }}"></script>
   <!-- DataTables -->
   <script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('assets/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
   
   @yield('scripts')

</body>

</html>