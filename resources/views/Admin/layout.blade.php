<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('assets/template')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('assets/template')}}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('assets/template')}}/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/template')}}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('assets/template')}}/dist/css/skins/_all-skins.min.css">
    {{-- dataTable --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

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
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="{{asset('assets/template')}}/index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>LTE</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->

                        {{-- languange --}}
                        @if (app()->getLocale()=='id')
                            <li>
                                <a href="{{url('locale/en')}}">EN</a>
                            </li> 
                            @endif
                        @if (app()->getLocale()=='en')
                            <li>       
                                <a href="{{url('locale/id')}}">IND</a>
                            </li>    
                        @endif
                        
                       
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{asset('assets/template')}}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{session('user')->name}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{asset('assets/template')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        {{session('user')->name}} - @lang('translate.hello')
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('logout-with-jwt') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Sign out</a>
                                        <form id="logout-form" action="{{ route('logout-with-jwt') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                       
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{asset('assets/template')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{session('user')->name}}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="{{__('translate.search')}}...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                @include('Admin.sidebar');
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
               @yield('content')
            </div>
            <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.18
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
            reserved.
        </footer>

      
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    @stack('js')
    <!-- jQuery 3 -->
    {{-- <script src="{{asset('assets/template')}}/bower_components/jquery/dist/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('assets/template')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="{{asset('assets/template')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{{asset('assets/template')}}/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/template')}}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('assets/template')}}/dist/js/demo.js"></script>
    <script>

function previewImg (){
        const imgPreview = document.querySelector('.img-preview');
        const imgOld = document.querySelector('#img-old');

        const fileName = new FileReader();
        fileName.readAsDataURL(imgOld.files[0]);
        fileName.onload = function(e){
            imgPreview.src = e.target.result;
        }
}
    </script>
    <script>
        $(document).ready(function() {
            $('.sidebar-menu').tree()
        });
    </script>
</body>

</html>