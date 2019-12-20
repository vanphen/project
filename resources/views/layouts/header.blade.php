<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('style/semantic.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style/css.css') }}">
    <script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
    <script src=" {{ asset('style/semantic.min.js') }}"></script>

    <link data-turbolinks-track="true" href="{{ asset('style/application-5760f1ecfa283a3d994b4a09b37eaf19.css') }}" media="all" rel="stylesheet" />
    <link href="{{ asset('style/board-e5fa761c4c673840e96bb356898a17f8.css') }}" media="screen" rel="stylesheet" />

    <script data-turbolinks-track="true" src="{{ asset('style/application-8df18607b20c6c3a4e3aa08ad3dc39ee.js') }}"></script>
    <title>User</title>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
</head>
<body>
<header class="master-header ng-scope">
    <div class="ui centered grid transparent inverted main menu page ">
        <!-- Left -->
        <!-- Logo -->
        <div class="six wide tablet eight wide computer column">
            <p class="logo item">
                <a href="{{route('home')}}">
                    <img style="width: 18%; height: 50%;" class="ui image" src="https://kipalog.com/assets/common/icon/logo-089ee7649acd5dd69ceb7c9dddece3bf.png">
                </a>
            </p>
        </div>
        <div class="six wide tablet eight wide computer column">
            <div class="right menu">
                <!-- Home -->
                <a class="item home scale-item" href="{{route('home')}}">
                    <i class="small home icon"></i>
                    <strong>Trang chủ</strong>
                </a>

                <!-- New post -->
                <div class="ui simple dropdown item newpost">
                    <a class="main" href="{{route('create')}}">
                        <i class="small edit icon"></i>
                        <strong>Viết bài</strong>
                    </a>
                </div>
                @if(!empty(Session::has('session')))
                    <div class="ui simple dropdown item newpost">
                        <strong>Xin chào {{ Session::get('session') }}</strong>
                    </div>
                    <div class="ui simple dropdown item newpost">
                        <a class="main" href="{{route('logout')}}">
                            <i class="small edit icon"></i>
                            <strong>Logout</strong>
                        </a>
                    </div>
                @endif


            <!-- Profile -->
                @if(empty(Session::has('session')))
                    <a class="item store scale-item" href="{{route('login')}}">
                        <i class="small bookmark icon"></i>
                        <strong>Login</strong>
                    </a>
                @endif

            </div>
        </div>
        <!-- Logged in header -->
    </div>
</header>
