<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
            <a class="navbar-brand mr-1" href="index.html">Start Bootstrap</a>
      
            <!-- Navbar Search -->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
      
            <!-- Navbar -->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                    </div>
                </li>
            </ul>
      
          </nav>
      
          <div id="wrapper">
      
            <!-- Sidebar -->
            <ul class="sidebar navbar-nav">
                <li class="nav-item {{ Request::is('admin') ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        Tableau de bord
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/orders*') ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.orders.index') }}">
                        Commandes
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/users*') ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.users.index') }}">
                        Utilisateurs
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/products*') ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.products.index') }}">
                        Produits
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/categories*') ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.categories.index') }}">
                        Catégories
                    </a>
                </li> 
                <li class="nav-item {{ Request::is('admin/labels*') ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.labels.index') }}">
                        Etiquettes
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/sliders*') ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.sliders.index') }}">
                        Carrousels
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/pages*') ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.pages.index') }}">
                        Pages
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/newsletters*') ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.newsletters.index') }}">
                        Newsletters
                    </a>
                </li> 
                <li class="nav-item {{ Request::is('admin/statistics') ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.statistics.index') }}">
                        Statistiques
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/parameters') ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin.parameters.index') }}">
                        Paramètres
                    </a>
                </li>                                                                                                                               
            </ul>
      
            <div id="content-wrapper">
      
                <div class="container-fluid">
                    @yield('content')
                </div>
                 <!-- /.container-fluid -->
      
                <!-- Sticky Footer -->
                <footer class="sticky-footer">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright © Your Website 2018</span>
                        </div>
                    </div>
                </footer>
      
            </div>
            <!-- /.content-wrapper -->
      
          </div>
          <!-- /#wrapper -->
      
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
      
          <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
