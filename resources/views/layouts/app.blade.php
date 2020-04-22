<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head class="page">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Invoice System') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="background">
    @stack('modals')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #353131;">
            @if(Auth::user()->roles[0]->name == 'Suspended')<nav class="navbar-brand sidebar-header"> <h5>{{ __('Pet Friends') }}  <i class="fas fa-paw"></i></h5></nav>@endif
            @can('invoices.edit')<nav class="navbar-brand sidebar-header"> <a class="nav-link" href="{{ route('home') }}"><h5 class="title">{{ __('Pet Friends') }}  <i class="fas fa-paw"></i></h5></a></nav>@endcan
            @if(Auth::user()->roles[0]->name == 'Customer')<nav class="navbar-brand sidebar-header"> <a class="nav-link" href="{{ route('homeCustomer') }}"><h5 class="title">{{ __('Pet Friends') }}  <i class="fas fa-paw"></i></h5></a></nav>@endif
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto text-center">
                        @can('invoices.edit')
                            <li class="nav-item font">
                                <a class="nav-link" href="{{ route('invoices.index') }}"><i class="fas fa-file-alt"></i> {{ __('Invoices') }}</a>
                            </li>
                            <li class="nav-item font">
                                <a class="nav-link" href="{{ route('customers.index') }}"><i class="fas fa-users"></i> {{ __('Customers') }}</a>
                            </li>
                            <li class="nav-item font">
                                <a class="nav-link" href="{{ route('sellers.index') }}"><i class="fas fa-users-cog"></i> {{ __('Sellers') }}</a>
                            </li>
                            <li class="nav-item font">
                                <a class="nav-link" href="{{ route('products.index') }}"><i class="fas fa-box-open"></i> {{ __('Products') }}</a>
                            </li>
                        @endcan
                        @can('users.index')
                            <li class="nav-item font">
                                <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user"></i> {{ __('Users') }}</a>
                            </li>
                        @endcan
                        @can('roles.index')
                            <li class="nav-item font">
                                <a class="nav-link" href="{{ route('roles.index') }}"><i class="fas fa-user-tag"></i>  {{ __('Roles') }}</a>
                            </li>
                        @endcan
                        @can('permissions.index')
                            <li class="nav-item font">
                                <a class="nav-link" href="{{ route('permissions.index') }}"><i class="fas fa-hand-paper"></i> {{ __('Permissions') }}</a>
                            </li>
                        @endcan
                    </ul>
                </div>

                <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            <li class="nav-item font">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item font">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item font dropdown">
                            <a href="{{ route('exports.show') }}" id="navbarDropdown" class="nav-link" role="button" aria-expanded="false">
                                {{ __('Notifications') }}
                                <span class="badge-info badge-pill">{{count(Auth::user()->unreadNotifications)}}</span>
                            </a>
                            </li>

                            <li class="nav-item font dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item font" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="mainApp">
            @yield('content')
        </main>

    </div>
    <script src="{{ asset(mix('js/manifest.js')) }}"></script>
    <script src="{{ asset(mix('js/vendor.js')) }}"></script>
    <script src="{{ asset(mix('js/app.js')) }}"></script>

    @stack('scripts')
</div>
</body>
</html>
