<!doctype html>
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
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @yield('stepperstyle')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand text-white text-bold" href="{{ url('/') }}">
                    {{ config('Resilience', 'Resilience') }}
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
                            <a class="nav-link text-white" href="/">{{ __('Home') }}</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Masuk') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Daftar') }}</a>
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
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid" style="padding: 0">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="carousel-item {{ $i <= 0 ? 'active' : '' }}">
                            <img class="d-block w-100" src="img/images/banner{{ $i }}.jpg" alt="First slide">
                        </div>
                    @endfor
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
    <footer class="container-fluid py-4" style="background-color: #0799D6">
        <div class="container my-4">
            <div class="row justify-content-center text-white">
                <div class="col-md-3">
                    <h4 class="font-weight-bold">Kontak saya</h4>
                    <div class="contact-wrapper row my-2" style="display: flex; flex-direction: row">
                        <div class="mx-2 bg-white" style="height: 38px; width: 38px; border-radius: 50%;"></div>
                        <div class=""><span>Facebook</span></div>
                    </div>
                    <div class="contact-wrapper row my-2" style="display: flex; flex-direction: row">
                        <div class="mx-2 bg-white" style="height: 38px; width: 38px; border-radius: 50%;"></div>
                        <div class=""><span>linkedIn</span></div>
                    </div>
                    <div class="contact-wrapper row my-2" style="display: flex; flex-direction: row">
                        <div class="mx-2 bg-white" style="height: 38px; width: 38px; border-radius: 50%;"></div>
                        <div class=""><span>Instagaram</span></div>
                    </div>
                    <div class="contact-wrapper row my-2" style="display: flex; flex-direction: row">
                        <div class="mx-2 bg-white" style="height: 38px; width: 38px; border-radius: 50%;"></div>
                        <div class=""><span>Twitter</span></div>
                    </div>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-5">
                    <h4 class="font-weight-bold">Partner : </h4>
                    <div class="bg-white" style="height: 130px; width: 130px; border-radius: 50%;"></div>
                    <h5 class="my-3">SMA Negeri 1 Kota Bima</h5>
                    <span>jln. Soekarno-Hatta no.x Kota Bima NTB</span>
                </div>
            </div>
        </div>
        <p class="text-white text-center" style="margin: 0">
            <span class="text-small">dikembangkan oleh : YanHF.dev</span>
        </p>
    </footer>
    @stack('javascript')
</body>

</html>
