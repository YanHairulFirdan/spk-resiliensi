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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
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
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('click', function(event) {
            // console.log('clicked anywhere :D');

        });

        var flag = [];

        function init() {
            var elementGroups = Array.from(document.querySelectorAll('.input-group'));
            for (let index = 0; index < elementGroups.length; index++) {
                flag[index] = false;

            }
        }
        init();
        window.onload = function() {
            // console.log('ok');
            var elementGroups = Array.from(document.querySelectorAll('.input-group'));
            var checkboxes = Array.from(document.querySelectorAll('input[type=radio]'));
            elementGroups.forEach(element => element.style.display = 'none');
            checkboxes.forEach(checkboxe => checkboxe.addEventListener('click', flagChange));
            document.getElementById('form-group-1').style.display = 'block';
            // var btn = document.getElementById('button');
            // console.log(btn);
            var buttons = Array.from(document.querySelectorAll('.page-number'));
            buttons.forEach(button => button.addEventListener('click', showForm))
        }

        function showForm(event) {
            // console.log('ok1');
            // return;
            var element = event.target;
            //get all input-form class
            var previousActiveButtons = document.querySelectorAll('.active');
            previousActiveButtons.forEach(button => {
                button.classList.remove('active')
            })
            console.log(element);
            element.classList.add('active')
            var inputElement = Array.from(document.getElementsByClassName("input-group"));
            //hide all input-form class
            inputElement.forEach(input => {
                input.style.display = 'none';
            })
            //get specific form-group
            var showform = document.getElementById("form-group-" + element.innerText)
            //show that form-group
            showform.style.display = 'block'
        }

        function flagChange(event) {

            //listen for event change occurs
            var element = event.target;
            let uncheck = 0;
            //get the id of event's parent
            var parentId = element.parentElement.parentElement.id;
            //get the last index of the id e.x 1
            var indexOfId = parentId[parentId.length - 1];
            var btn = document.getElementById('button');
            console.log(btn);
            console.log(indexOfId)
            var flagCheck = 0;
            //get all of input element from the current form input group
            var checkboxes = Array.from(document.querySelectorAll("#" + parentId + " input"));

            //check if the there  or some input were checked set flag i to true
            if (!element.checked) {
                // console.log("checked false");
                checkboxes.forEach(checkbox => console.log(checkbox.checked))
                check = checkboxes.forEach(checkbox => {
                    if (!checkbox.checked) {
                        uncheck++;
                    }
                })
                console.log("amount of uncheck form= " + uncheck)
                if (uncheck != checkboxes.length) {
                    // console.log("all input has checked")
                    flag[indexOfId - 1] = true;
                } else {
                    flag[indexOfId - 1] = false;
                }
            } else if (element.checked) {
                if (uncheck > 0) uncheck--;
                else if (uncheck == 0) flag[indexOfId - 1] = true;
            }
            console.log(flag);

            //else if none of them were checked set flag i to false



            //if all of flag is true set button of submit to enable

            flag.forEach(singleFlag => {
                if (singleFlag) flagCheck++;
                else if (!singleFlag) {
                    if (flagCheck > 0) flagCheck--;
                }
            });
            console.log('jumlah flag check = ' + flagCheck);
            if (flagCheck == 7) btn.style.display = "block";
            else btn.style.display = "none";

        }


        // document.getElementById('test-button').addEventListener('click', function (event) {
        //     console.log('okkkk');
        //     var element = event.target;
        //     if (element.classList.contains('active')) {
        //         element.classList.remove('active')
        //     } else {
        //         element.classList.add('active')
        //     }
        // })

    </script>
    @stack('javascript')
</body>

</html>
