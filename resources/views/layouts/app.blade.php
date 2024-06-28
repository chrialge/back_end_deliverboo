<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="icon" href="{{ url('/img/favicon-16x16.png') }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DeliveBoo') }}</title>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>

    <div id="app">

        <nav class="navbar navbar-expand-md light_shadow py-3">

            <div class="container">

                <a class="navbar-brand d-flex align-items-center p-0" href="{{ url('/') }}">
                    <div class="logo">
                        <h2 class="m-0">
                            <i class="fa-solid fa-utensils"></i>
                            DeliveBoo work
                        </h2>
                    </div>
                </a>
                <!-- /logo -->

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- /collapse button -->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link primary_text fs-5 header_link pt-4 pb-3" href="http://localhost:5174/"
                                target="_blank">{{ __('Ordina') }}</a>
                        </li>
                    </ul>
                    <!-- /home link -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link primary_text fs-5 header_link pt-4 pb-3"
                                    href="{{ route('login') }}">{{ __('Accedi') }}</a>
                            </li>
                            <!-- /login link -->
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link primary_text fs-5 header_link pt-4 pb-3"
                                        href="{{ route('register') }}">{{ __('Registrati') }}</a>
                                </li>
                                <!-- /register link -->
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown"
                                    class="nav-link dropdown-toggle primary_text fs-5 header_link pt-4 pb-3" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <!-- /dropdwn nav -->

                                <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item primary_text fs-5 header_link "
                                        href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}
                                    </a>
                                    <!-- /dashbard -->
                                    <a class="dropdown-item primary_text fs-5 header_link "
                                        href="{{ url('profile') }}">{{ __('Profilo') }}
                                    </a>
                                    <!-- /profile -->
                                    <a class="dropdown-item primary_text fs-5 header_link " href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Esci') }}
                                    </a>
                                    <!-- /logout -->
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                <!-- /dropdwn menu-->
                            </li>
                        @endguest

                    </ul>
                    <!-- /navbar righ-side-->

                </div>
                <!-- /.collapse -->

            </div>
            <!-- /container -->

        </nav>
        <!-- /navbar -->

        <main class="">
            @yield('content')
        </main>
        <!-- /main content -->

    </div>
    <!-- /#app -->


</body>

</html>
