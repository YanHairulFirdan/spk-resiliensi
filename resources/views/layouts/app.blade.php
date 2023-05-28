<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Resiliensi</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

    <style>
        .carousel-inner, .carousel-item {
            height: 50em  !important;
        }
        
        @media (max-width: 768px) { 
            .carousel-item img {
                margin: 0 auto; /* this will align the image to center. */
                width: auto; /* for those images which don't have a width specified, but has a max-height will be auto adjusted */
                height: 15em !important;
            }
    
            /* .carousel-item > image {
                max-width: 100%;
                max-height: 100%;
            } */
         }

        body{
            font-family: "Concert One", Arial, Helvetica, sans-serif !important;
        }

        #logo {
            width: 4em;
            height: 4em;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- Styles -->
    @yield('stepperstyle')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand text-white text-bold" href="{{ url('/') }}">
                    {{-- <b>{{ config('Resilience', 'Resilience') }}</b> --}}
                    <img id="logo" src="{{ asset("img/images/logo.png") }}" alt="" srcset="">
                </a>
                <button class="navbar-toggler text-white" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('home') ? 'font-weight-bold' : '' }}" href="/">{{ __('Home') }}</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white {{ request()->routeIs('login') ? 'font-weight-bold' : '' }}" href="{{ route('login') }}">{{ __('Masuk') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white {{ request()->routeIs('register') ? 'font-weight-bold' : '' }}"
                                        href="{{ route('register') }}">{{ __('Daftar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('teacher.login') ? 'font-weight-bold' : '' }}" href="/teacher">{{ __('Guru') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @if (Request::is('kuisioner'))
            @php
                $index = 3;
            @endphp
        @else
            @php
                $index = 0;
            @endphp
        @endif
        <div class="" style="padding: 0">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner h-50">
                    <div class="carousel-item h-25 active">
                        <img class="d-block w-100" src="{{ asset("img/images/banners/banner-0.jpg") }}"
                            alt="First slide">
                    </div>
                    <div class="carousel-item h-25">
                        <img class="d-block w-100" src="{{ asset("img/images/banners/banner-1.jpg") }}"
                            alt="First slide">
                    </div>
                    <div class="carousel-item h-25">
                        <img class="d-block w-100" src="{{ asset("img/images/banners/banner-2.jpg") }}"
                            alt="First slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <main class="py-4" style="background-color: #FFF">
            @if (!Request::is('/'))
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            @if (Request::is('kuisioner') || Request::is('motivation') || Request::is('result'))
                                <div class="container-fluid">
                                    @include('components.formStepper')
                                </div>
                            @endif
                        </div>
                    </div>
                    @yield('content')
                </div>
            @else
                @yield('content')
            @endif

        </main>
    </div>
    <footer class="container-fluid py-4 bg-primary">
        <div class="container my-4">
            <div class="row justify-content-center text-white">
                <div class="col-md-3">
                    <h4 class="font-weight-bold">Kontak saya</h4>
                    <div class="contact-wrapper row my-2" style="display: flex; flex-direction: row">
                        <div class="my-auto"><span>
                                <i class="fab fa-facebook" aria-hidden="true"></i>
                                Syagiful Fathayatih
                            </span>
                        </div>
                    </div>
                    <div class="contact-wrapper row my-2" style="display: flex; flex-direction: row">
                        <div class="my-auto"><span>
                                <i class="fab fa-pinterest" aria-hidden="true"></i>
                                @syagiful</span></div>
                    </div>
                    <div class="contact-wrapper row my-2" style="display: flex; flex-direction: row">
                        <div class="my-auto">
                            <span>
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                                Syagifullnm@gmail.com
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-5">
                    <h4 class="font-weight-bold">Partner : </h4>
                    <div class="bg-white" style="height: 130px; width: 130px; border-radius: 50%;">
                        <img class="img-fluid rounded-circle"
                            src="{{ asset("img/sma1.jpg") }}"
                            alt="" srcset="">
                    </div>
                    <h5 class="my-3 font-weight-bold">SMA Negeri 1 Sape</h5>
                    <span>Jalan Pelabuhan Sape</span>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center text-white">
                <div class="col-md-12 text-center">
                    <span>© 2021 Resiliensi. All rights reserved.</span>
                </div>
            </div>
        </div>
    </footer>
    <script>

    </script>
    @stack('javascript')
</body>

</html>
