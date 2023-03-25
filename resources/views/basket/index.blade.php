@extends('layouts.main')
@section('main')
    <a href="/">Вернуться на главную</a>
    <br>
    <br>
    @if(count($forAuthUser ) > 0)
        <h5>Заказы в корзине</h5>
        <br>
        <form method="POST" action="{{route('order_store')}}">
            @csrf
            @foreach($basket as $order)
                @if($order->user_id === auth()->user()->id)
                    <h6>{{$order->categories->title}} {{$order->title}}, количество <input style="width: 45px;" class="" type="number" min="1" value="1" name="count">.............{{$order->prices->price}}</h6>
                @endif
            @endforeach
            <input type="hidden" name="basket" value="{{$basket}}">
            <input type="hidden" name="user_id" value="{{$order->user_id}}">
            <input type="hidden" name="product_id" value="{{$order->id}}">


            <button type="submit" class="mt-3 btn btn-outline-success">Оформить заказ</button>
        </form>
    @else
        <h5>У вас еще нет заказов</h5>
    @endif
@endsection
