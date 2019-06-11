<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--responsive-->
    <meta name="viewport" content="width=device-width">
    <!--SEOs-->
    <meta name="description" content= "Wedding Planning">
    <meta name="keywords" content="dianne, wedding planner">
    <meta name="author" content="Sarah Azman, Beatrice Ignacio, Hyein Jung, Ian Patrick Rodriguez">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">

    <link rel="stylesheet" href="/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="/css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">


    <title>@yield('title', 'Dianne | Welcome')</title>

</head>

<body>
    <nav class="navbar navbar-expand-md fixed-top" style = "margin-bottom: 10px">
        <div class="collapse navbar-collapse">
            <a class="navbar-brand"><img src="/img/diannelogo.png" width="70" height="70" alt="Dianne Logo"></a>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="marketplace">Vendors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            </li>
        </ul>
        </div>
    </nav>

<!--SIDEBAR-->
    <div class="wrapper">
        <div class="sidebar" data-color="white" data-active-color="danger">

            <div class="logo">
                <div class="logo-image-small">
                    <img src="/img/diannelogo.png" width="80" height="80" style="margin-left: 70px; margin-top:20px;">
                    <h4 style="margin-top: 20px; margin-left: 40px">Dashboard</h4>
                </div>
            </div>

            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li{{ request()->is('admin.dashboard') ? ' class=active' : '' }}>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li{{ request()->is('reports') ? ' class=active' : '' }}>
                        <a href="#">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>User Reports</p>
                        </a>
                    </li>
                    <li{{ request()->is('audits') ? ' class=active' : '' }}>
                        <a href="./ #">
                            <i class="nc-icon nc-tap-01"></i>
                            <p>Audits</p>
                        </a>
                    </li>
                    <li{{ request()->is('content-management') ? ' class=active' : '' }}>
                        <a href="/#">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <p>Manage Content</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- CONTENT-->
        <div class="main-panel">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- CSS Files -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />

    <!--   Core JS Files   -->
    <script src="/assets/js/core/jquery.min.js"></script>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
    <script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

    <!-- Chart JS -->
    <script src="/assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="/assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
</body>
</html>