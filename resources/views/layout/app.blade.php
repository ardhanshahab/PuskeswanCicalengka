<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Puskeswan Cicalengka</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">



</head>

<body>
    <nav class="navbar navbar-default no-margin navbar-dark">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header fixed-brand d-flex">
            <button type="button" class="btn navbar-toggle collapsed" data-toggle="collapse" id="menu-toggle">
                <i class="fa-bars fa"></i>
            </button>
            <a class="navbar-brand mx-4" href="#">Puskeswan Cicalengka</a>
        </div>
        <ul class="nav navbar-nav ml-auto"> <!-- ml-auto untuk membuat tombol logout ke kanan -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
        <!-- navbar-header-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active">
                    <button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2">
                        <i class="fa-bars fa"></i>
                    </button>
                </li>
            </ul>
        </div>
        <!-- bs-example-navbar-collapse-1 -->
    </nav>

    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav nav-pills" id="menu">
                <li class="active">
                    <a href="/home"><span class="fa-stack fa-lg pull-left">
                        <i class="fa fa-cloud-download fa-stack-1x "></i></span>Dashboard</a>
                </li>
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i
                                class="fa fa-flag fa-stack-1x "></i></span>Master Data</a>
                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="/masterdata/hewan"><span class="fa-stack fa-lg pull-left"><i
                                        class="fa fa-flag fa-stack-1x "></i></span>Data Hewan</a></li>
                        <li><a href="/masterdata/dokter"><span class="fa-stack fa-lg pull-left"><i
                                        class="fa fa-flag fa-stack-1x "></i></span>Data Dokter</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/pemeriksaan"><span class="fa-stack fa-lg pull-left"><i
                                class="fa fa-cloud-download fa-stack-1x "></i></span>Pemeriksaan</a>
                </li>
                <li>
                    <a href=""><span class="fa-stack fa-lg pull-left"><i
                                class="fa fa-flag fa-stack-1x "></i></span>Laporan</a>
                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="/pemeriksaan/hariini"><span class="fa-stack fa-lg pull-left"><i
                                        class="fa fa-flag fa-stack-1x "></i></span>Pemeriksaan Hari ini</a></li>
                        <li><a href="/pemeriksaan/histori"><span class="fa-stack fa-lg pull-left"><i
                                        class="fa fa-flag fa-stack-1x "></i></span>Histori Pemeriksaan</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i
                                class="fa fa-server fa-stack-1x "></i></span>Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid xyz">
                <div class="row">
                    <div class="col-lg-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
        integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack('js')
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        $("#menu-toggle-2").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled-2");
            $('#menu ul').hide();
        });

        function initMenu() {
            $('#menu ul').hide();
            $('#menu ul').children('.current').parent().show();
            //$('#menu ul:first').show();
            $('#menu li a').click(
                function() {
                    var checkElement = $(this).next();
                    if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                        return false;
                    }
                    if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                        $('#menu ul:visible').slideUp('normal');
                        checkElement.slideDown('normal');
                        return false;
                    }
                }
            );
        }
        $(document).ready(function() {
            initMenu();
        });
    </script>
</body>

</html>
