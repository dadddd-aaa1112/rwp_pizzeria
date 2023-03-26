@extends('home')
@section('body')
@php
$i=1;
@endphp
    <h4>{{$title}}</h4>

    <table class="table table-striped table-info table-hover">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Покупатель</th>
            <th scope="col">Список покупок</th>
            <th scope="col">Категория</th>
            <th scope="col">Цена</th>
            <th scope="col">Количество</th>
            <th scope="col">Сумма</th>
            <th scope="col">Общая сумма заказа</th>
        </tr>
        </thead>
        <tbody>

        @foreach($orders as $order)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$order->users->name}} {{$order->users->email}}</td>
                <td>{{$order->products->title}}</td>
                <td>{{$order->products->categories->title}}</td>
                <td>{{$order->products->price}}</td>
                <td>{{$order->count}}</td>
                <td>{{$order->count * $order->products->price}}</td>
            </tr>
        @endforeach


        </tbody>
    </table>
    {{$orders->withQueryString()->links()}}
@endsection
