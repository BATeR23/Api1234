@extends('layouts.layout')
@section('title','Кабинет')
@section('content')
    <button class="btn btn-light" >
        <a href="{{route('formOrder')}}">Записаться на курс</a>
    </button>

    <div class="table-responsive">

        <table class="table">

            <tr>
                <th>Номер</th>
                <th>Имя курса</th>
                <th>Дата</th>
                <th>Споcоб оплаты</th>
                <th>Cтатус</th>
            </tr>
            @foreach($orders as $order)

                <tr>

                    <td>{{$order->id}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->date->format('d.m.Y')}}</td>
                    <td>{{$order->payment_method}}</td>
                    <td>{{$order->status}}</td>
                    <td>
                        <form action="{{route('addComment', $order->id)}}" method="post">
                            @csrf
                            <textarea name="comment" class="form-control mb-2" rows="2" placeholder="Оставте отзыв" @if($order->status !== 'Закончено') disabled @endif>{{old('comment', $order->comment)}}</textarea>
                            <button type="submit"
                                    @if($order->status !== 'Закончено') disabled @endif>
                                Сохранить
                            </button>
                        </form>
                    </td>

                </tr>

            @endforeach


        </table>
    </div>
@endsection
