@extends('view')
@section('main')

    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui teal image header">
                <div class="content">
                    Login Account
                </div>
            </h2>
            <form class="ui large form" action="/posts/login" method="post">
                @csrf
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="username" placeholder="Tai Khoản">
                        </div>
                        <br>
                        @error('username')
                        <div style="color: red;" class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="Mật Khẩu">
                        </div>
                        <br>
                        @error('password')
                        <div style="color: red;" class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="submit" class="ui fluid large teal button" value="Login">
                </div>
            </form>
        </div>
    </div>
    <style type="text/css">
        body {
            background-color: #DADADA;
        }
        body > .grid {
            height: 100%;
        }
        .image {
            margin-top: -100px;
        }
        .column {
            max-width: 450px;
        }
    </style>
@endsection
