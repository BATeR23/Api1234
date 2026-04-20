@extends('layouts.layout')
@section('title','Регистрация')
@section('content')
    <h1 class="text-center">Регистрация</h1>
    <div class="form-control">

        <form method="post" action="{{route('login')}}">
            @csrf

            <div class="form-group mb-3">
                <label>Ведите логин</label>
                <input name="login" class="form-control">
                @error('login')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label>Ведите пароль</label>
                <input name="password" type="password" class="form-control">
                @error('password')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <input type="submit"  class="form-control btn-primary">
            </div>

        </form>
        <h5>Ещё не зарегистрированы? <a href="{{route('register')}}">Зарегистрироваться</a></h5>

    </div>
@endsection
