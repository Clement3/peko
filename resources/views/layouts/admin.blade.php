<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Administration Péko</a>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
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
        </nav>
        
        <div class="container-fluid">
            <div class="row">
                <!-- Menu Aside -->
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin') ? 'active' : null }}" href="{{ route('admin.dashboard') }}">
                                    <span data-feather="home"></span>
                                    {{ __('Dashboard') }} <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <span data-feather="orders"></span>
                                    {{ __('Orders') }}
                                </a>
                            </li>                            
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/users') ? 'active' : null }}" href="{{ route('admin.users.index') }}">
                                    <span data-feather="users"></span>
                                    {{ __('Users') }}
                                </a>
                            </li>    
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <span data-feather="products"></span>
                                    {{ __('Products') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <span data-feather="categories"></span>
                                    {{ __('Categories') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <span data-feather="labels"></span>
                                    {{ __('Labels') }}
                                </a>
                            </li>  
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <span data-feather="sliders"></span>
                                    {{ __('Sliders') }}
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <span data-feather="pages"></span>
                                    {{ __('Pages') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <span data-feather="newsletters"></span>
                                    {{ __('Newsletters') }}
                                </a>
                            </li>                                                                                                                                          
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <span data-feather="statistics"></span>
                                    {{ __('Statistics') }}
                                </a>
                            </li>                            
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <span data-feather="parameters"></span>
                                    {{ __('Parameters') }}
                                </a>
                            </li>                                                                                 
                        </ul>
                    </div>
                </nav> 

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    @yield('content')
                </main>               
            </div>
        </div>
    </div>
</body>
</html>
