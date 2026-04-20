@extends('layouts.layout')
@section('title','Главная')
@section('content')
    <h1>Слайдер</h1>
    <style>
        .slider-container{
            width: 600px;
            height: 400px;
            overflow: hidden;
            position: relative;
        }
        .slider{
            display: flex;
            transition: transform 0.5s ease-in-out;
            height: 100%;
        }
        .slide img{
            width: 100%;
            height: 100%;
        }
    </style>
    <div class="slider-container">
        <div class="slider">
            <div class="slide"><img class="img" src="{{asset('img/image07.jpg')}}"></div>
            <div class="slide"><img class="img" src="{{asset('img/image06.jpg')}}"></div>
            <div class="slide"><img class="img" src="{{asset('img/image05.jpg')}}"></div>
        </div>
    </div>
@endsection
