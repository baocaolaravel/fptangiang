<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website FPT Telecom">
    <meta name="author" content="Nguyen Tuan Kiet">
    <title>Admin - FPT Telecom</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{url('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="{{url('public/admin/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('public/admin/dist/css/sb-admin-2.css') }}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{url('public/admin/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <!-- DataTables CSS -->
    <link href="{{url('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="{{url('public/admin/bower_components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
    <!-- Ckeditor && Ckfinder-->
    <script src="{{url('public/admin/js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{url('public/admin/js/ckfinder/ckfinder.js') }}"></script>
    <script type="text/javascript">
        var baseURL = "{!! url('/') !!}";
    </script>
    <script src="{{url('public/admin/js/func_ckfinder.js') }}"></script>
</head>
<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Admin Area - FPT Telecom</a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> {!! Auth::user()->username !!}</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Cài đặt</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{!! url('auth/logout') !!}"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Tìm kiếm...">
                            <span class="input-group-btn">
                           <button class="btn btn-default" type="button">
                           <i class="fa fa-search"></i>
                           </button>
                           </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <!--<li>
                        <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>-->
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Danh mục<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! url('admin/cate/list') !!}"> Danh sách danh mục</a>
                            </li>
                            <li>
                                <a href="{!! url('admin/cate/add') !!}"> Thêm danh mục</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube fa-fw"></i> Sản phầm<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! url('admin/product/list') !!}"> Danh sách sản phẩm</a>
                            </li>
                            <li>
                                <a href="{!! url('admin/product/add') !!}"> Thêm sản phẩm</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> Người dùng<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! url('admin/user/list') !!}"> Danh sách người dùng</a>
                            </li>
                            <li>
                                <a href="{!! url('admin/user/add') !!}"> Thêm người dùng</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-compress fa-fw"></i> Liên lạc<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! url('admin/contact/list') !!}"> Danh sách liên lạc</a>
                            </li>
                            <li>
                                <a href="{!! url('admin/contact/add') !!}"> Thêm liên lạc</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('controller')
                        <small>@yield('action')</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                    @if (Session::has('flash_message'))
                        <div class="alert alert-{!! Session::get('flash_level') !!}">
                            {!! Session::get('flash_message') !!}
                        </div>
                    @endif
                </div>
                <!-- Đây là nơi chứa nội dung-->
                @yield('content')
                <!-- End - Đây là nơi chứa nội dung-->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="{{url('public/admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{url('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="{{url('public/admin/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{url('public/admin/dist/js/sb-admin-2.js') }}"></script>
<!-- DataTables JavaScript -->
<script src="{{url('public/admin/bower_components/DataTables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{url('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
<script src="{{url('public/admin/js/myscript.js') }}"></script>
<script src="{{url('public/admin/js/seccesscript.js') }}"></script>
</body>
</html>