@extends('layouts.layout')
@section('title','Панель Администратора')
@section('content')
    <div class="container">
        <h1>Панель админа</h1>
        <form action="{{route('showAdmin')}}" method="Get">
            <label>Статус</label>
            <select name="status" class="form-label" is="status" onchange="this.form.submit()">
                @foreach($status as $value)
                    <option value="{{$value}}">{{request('status') == $value ? 'selected' : ''}}
                    {{$value}}
                    </option>
                @endforeach
            </select>
            <div class="btn ptn-primary" href="{{route('showAdmin')}}">Сбросить</div>
        </form>
        <div class="table">

            <table class="table">

                <thead>
                    <tr>
                        <th>Номер</th>
                        <th>Имя курса</th>
                        <th>Дата</th>
                        <th>Споcоб оплаты</th>
                        <th>Cтатус</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>

                        <td>{{$order->id}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->date->format('d.m.Y')}}</td>
                        <td>{{$order->payment_method}}</td>
                        <td>
                            <form action="{{route('updateStatus', $order->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select" {{$order->status === 'Закончено' ? 'disabled' : ''}} onchange="this.form.submit()">
                                    <option value="Новая" {{$order->status == 'Новая' ? 'selected' : ''}}>Новая</option>
                                    <option value="Идёт обучение" {{$order->status == 'Идёт обучение' ? 'selected' : ''}}>Идёт обучение</option>
                                    <option value="Закончено" {{$order->status == 'Закончено' ? 'selected' : ''}}>Закончено</option>
                                </select>
                            </form>

                        </td>

                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
        <div class="d-flex justify-content-center">
            {{$orders->links()}}
        </div>
    </div>
@endsection
