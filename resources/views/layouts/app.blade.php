<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Visit Plan</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/weekly_table.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
    
    <!--JavaScript-->
    <script src="{{ asset('/js/table.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
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
                        <img src="data:image/png;base64,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">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">ログイン</a></li>
                            <li><a href="{{ route('register') }}">新規登録</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
@if($admin === 1)
                                    <li>
                                        <a href="{{ url('admin') }}">
                                            管理者ページ
                                        </a>
                                    </li>
@endif

                                    <li>
                                        <a href="{{ url('user') }}">
                                            登録情報変更
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            ログアウト
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
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
