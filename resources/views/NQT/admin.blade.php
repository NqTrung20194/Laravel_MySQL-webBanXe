<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x">
    <meta name="author" content="">
    <title>Admin</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="source/admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="source/admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="source/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="source/admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="source/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="source/admin/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
                <a class="navbar-brand" href="{{route('index')}}">Trang chủ</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <!-- /.phân quyền user -->
                    @if (Auth::check())
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Chào bạn {{Auth::user()->full_name}}<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
             <!--       @if(Auth::user()->lever <=2)
                        <li><a href="{{route('admin')}}">Quản Lý Trang</a></li>
                        @else
                        <li><a href="{{route('index')}}">Trang chủ</a></li>
                        @endif -->
                        <li><a href="{{route('logout')}}">Đăng xuất</a></li>
                    </ul>
                        @else
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
                        </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{route('signup')}}">Đăng kí</a></li>
                        <li><a href="{{route('login')}}">Đăng nhập</a></li>
                    </ul>
                        @endif
                    
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
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                   <!--     </li>
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li> -->
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Nhãn Hiệu<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('listloaisp')}}">Danh Sách </a>
                                </li>
                                <li>
                                    <a href="{{route('addidtype')}}">Thêm </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Sản Phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('listsanpham')}}">Danh sách sản phẩm</a>
                                </li>
                                <li>
                                    <a href="{{route('addsp')}}">Thêm Sản Phẩm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                            @if(Auth::user()->level ==1)
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Người Dùng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('listuser')}}">Danh Sách Người Dùng</a>
                                </li>
                                <li>
                                    <a href="{{route('adduser')}}">Thêm Người Dùng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                            @endif

                        <li>
                            <a href="{{route('listdh')}}">Quản lý đơn hàng</a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
    <div id="page-wrapper">
        
        @yield('noidung')
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="source/admin/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="source/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="source/admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="source/admin/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="source/admin/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="source/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>

</html>
