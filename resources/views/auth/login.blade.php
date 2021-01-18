<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('meta')

    <title>{{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Manjari|Roboto|Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/jquery-confirm.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/materialize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/app.css') }}" />

</head>

<body>

        <x-jet-validation-errors class="my-4 mx-auto" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="login-container">
            <div class="login-form">
                <div class="input-field">
                    <input type="text" name="email" id="email" :value="old('email')" required>
                    <label for="email" value="{{ __('Email') }}">Email</label>
                </div>

                <div class="input-field">
                    <input type="password" name="password" id="password" value="" required autocomplete="current-password">
                    <label for="password" value="{{ __('Password') }}">Password</label>
                </div>

                <div class="row mb0">
                    <button id="login" class="waves-effect waves-green btn btn-1 right ml20">
                        {{ __('Sign in') }}
                    </button>
                    @if (Route::has('register'))
                    <p class="right my0"><a href="{{ route('register') }}" class="mr5 underline" style="text-decoration:underline; ">Register</a> Or</p>
                    @endif


                </div>
            </div>
        </div>
    </form>

    <footer>
        @include('layouts.footer')
    </footer>


    <script>
        M.AutoInit();
    </script>
</body>



</html>