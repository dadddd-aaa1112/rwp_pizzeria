@extends('layouts.main')

@section('main')
    @if(Session::has('message'))
        <div class="">
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        </div>
    @endif

    <div class="d-flex justify-content-between flex-wrap ">
        @foreach($products as $product)
            <form method="POST" action="{{route('basket_store')}}">
                @csrf
                <div class="card mb-5" style="width: 18rem;">
                    <img src="{{$product->image}}" class="card-img-top" alt="{{$product->title}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->title}}</h5>
                        <p class="card-text">{{$product->price }}руб </p>
                        <h5 class="card-text">{{$product->categories->title }} </h5>

                        <input type="hidden" name="title" value="{{$product->title}}">
                        <input type="hidden" name="image" value="{{$product->image}}">
                        <input type="hidden" name="price" value="{{$product->price}}">
                        <input type="hidden" name="category_id" value="{{$product->category_id}}">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <button type="submit" class="btn btn-outline-success">Добавить в корзину</button>
                    </div>
                </div>
            </form>
        @endforeach

    </div>
    {{$products->withQueryString()->links()}}
@endsection
