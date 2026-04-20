@extends('layouts.layout')
@section('title','Регистрация')
@section('content')
    <h1 class="text-center">Регистрация</h1>
    <div class="form-control">

        <form method="post" action="{{route('register')}}">
            @csrf

            <div class="form-group mb-3">
                <label>Ведите логин</label>
                <input name="login" class="form-control">
                @error('login')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label>Введите Фио</label>
                <input name="full_name" class="form-control">
                @error('full_name')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label>Введите телефон</label>
                <input name="phone" class="form-control">
                @error('phone')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label>Введите email</label>
                <input name="email" class="form-control">
                @error('email')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label>Введите password</label>
                <input name="password" class="form-control">
                @error('password')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <input type="submit"  class="form-control btn-primary">
            </div>

        </form>

    </div>
@endsection
