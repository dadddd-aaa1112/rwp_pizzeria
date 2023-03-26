@extends('layouts.main')
@section('main')
    @if(Session::has('message'))
        <div class="">
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        </div>
    @endif

    <form method="get" class="" action="{{route('order_store')}}">

    <h5>Ваш заказ на сумму: {{$result}} руб</h5>

        <button type="submit" class=" mt-3 btn btn-outline-success">Создать заказ</button>
    </form>

    <form method="POST" class="" action="{{route('order_destroy')}}">
        @csrf
        @foreach($idOrderDB as $id)
            <input type="hidden" name="ids[]" value="{{$id}}">
        @endforeach
    <button type="submit" class=" mt-3 btn btn-outline-danger">Отменить заказ, корзину очистить</button>
    </form>
@endsection
