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
                                    <a class="nav-link text-white"
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
                            <a class="nav-link text-white" href="/teacher">{{ __('Guru') }}</a>
                        </li>
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
                            <img class="d-block w-100" src="/img/images/banner{{ $i }}.jpg"
                                alt="First slide">
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
                            src="data:image/jpeg;base64,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"
                            alt="" srcset="">
                    </div>
                    <h5 class="my-3 text-bold">SMA Negeri 1 Kota Bima</h5>
                    <span>jln. Soekarno-Hatta Kota Bima NTB</span>
                </div>
            </div>
        </div>
        <p class="text-white text-center" style="margin: 0">
            <span class="text-small">dikembangkan oleh : YanHF.dev</span>
        </p>
    </footer>
    <script>

    </script>
    @stack('javascript')
</body>

</html>
