<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>News Admin</title>
        <base href="{{ asset('') }}" >
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="admin_asset/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="admin_asset/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="admin_asset/dist/css/skins/skin-blue.min.css">
         <!-- DataTables -->
        <link rel="stylesheet" href="admin_asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="admin_asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="admin_asset/bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="admin_asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @include('admin.layout.header')
            <!-- Left side column. contains the logo and sidebar -->
            @include('admin.layout.sidebar')  
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
                </div>
                <strong>Copyright &copy; 2018 <a href="#">Tran Huu Trung</a>.</strong> All rights
                reserved.
            </footer>
        </div>
        <!-- ./wrapper -->
        <!-- jQuery 3 -->
        <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="admin_asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="admin_asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="admin_asset/dist/js/adminlte.min.js"></script>
        <!-- CK Editor -->
        <script src="admin_asset/bower_components/ckeditor/ckeditor.js"></script>
        @yield('script')
    </body>
</html>
