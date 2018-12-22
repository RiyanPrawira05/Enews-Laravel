<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"> <!-- ({{ app()->getLocale() }}) ?? -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- {{ csrf_token() }} ?? -->

    <title>{{ config('app.name', 'Laravel') }}</title> <!-- ({{ config('app.name', 'Laravel') }}) ?? -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- ini di asset saya liat gada css adanya js (maksutnya ini dia manggil app.css di folder asset apa dia bikin fungsi) kasusnya samaseperti pemanggilan gambar di index berita -->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('font-awesome/css/font-awesome.min.css') }}"> <!-- ini font-awesome ada di folder public, tapi pemanggilan nya ko seperti ini? (masih kurang ngerti) -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a> <!-- ini ({{ config('app.name', 'Laravel') }}) dan ini ({{ url('/') }}) masih gatau?? 
                    dan bedanya url, dan route? apa sama saja? -->

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->

                        <!-- ini guest untuk yg belum login ya atau bagaimana? dan bedanya dengan else dibawah (lupa) -->
                        
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="{{ route::is('berita.index') ? 'active' : '' }}"><a href="{{ route('berita.index') }}">Berita</a></li>
                            <li class="{{ route::is('category.index') ? 'active' : '' }}"><a href="{{ route('category.index') }}">Category</a></li>
                            <li class="{{ route::is('pengguna.index') ? 'active' : '' }}"><a href="{{ route('pengguna.index') }}">Pengguna</a></li>
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span> <!-- ?? ({{ Auth::user()->name }}) -->
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a> <!-- ini route logout gada ko bsa begini-->

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }} 
                                        </form> <!-- setiap ada form harus ada ini ({{ csrf_field() }}) ya? untuk apa ini? -->
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
