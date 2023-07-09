@extends('main.main')
@section('start')

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel c нуля</title>

        <link href="https://unpkg.com/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
            <div class="bg-white w-96 shadow-xl rounded p-5">
                <h1 class="text-3xl font-medium">Регистрация</h1>

                <form action="{{route('register_process_admin')}}" class="space-y-5 mt-5" method="post">
                    @csrf
                    <input name="name" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Name" />

                    @error('name')
                    <p> {{$message}}</p>
                    @enderror

                    <input name="email" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Email" />
                    @error('email')
                    <p> {{$message}}</p>
                    @enderror

                    <input name="password" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Пароль" />
                    @error('password')
                    <p> {{$message}}</p>
                    @enderror

                    <input name="password_confirmation" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Подтверждение пароля" />
                    @error('password_confirmation')
                    <p> {{$message}}</p>
                    @enderror

                    <div>
                        <a href="{{route('login_admin')}}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Есть аккаунт?</a>
                    </div>

                    <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </body>
</html>
@endsection
