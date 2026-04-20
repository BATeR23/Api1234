@extends('layouts.layout')
@section('title','Главная')
@section('content')
    <div class="form-control">

        <form method="post" action="{{route('storeOrder')}}">
            @csrf

            <div class="form-group mb-3">
                <label>Ведите курс</label>
               <select class="form-select" name="name">
                    @foreach($name as $n)
                        <option value="{{$n}}">{{$n}}</option>
                    @endforeach
               </select>
                @error('name')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label>Дата начала</label>
                <input name="date" type="date" class="form-control">
                @error('date')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label>способ оплаты</label>
                <select class="form-select" name="payment_method">
                    @foreach($payment_method as $p)
                        <option value="{{$p}}">{{$p}}</option>
                    @endforeach
                </select>
                @error('payment_method')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <input type="submit"  class="form-control btn-primary">
            </div>

        </form>
@endsection
