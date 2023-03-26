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
            <th scope="col">Название</th>
            <th scope="col">Цена</th>
            <th scope="col">Категория</th>
        </tr>
        </thead>
        <tbody>

        @foreach($products as $product)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$product->title}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->categories->title}}</td>
            </tr>
        @endforeach


        </tbody>
    </table>
    {{$products->withQueryString()->links()}}
@endsection
