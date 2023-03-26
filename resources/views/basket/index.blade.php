@extends('layouts.main')
@section('main')
    @if(Session::has('message'))
        <div class="">
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        </div>
    @endif

    <a href="/">Вернуться на главную</a>
    <br>
    <br>
    @if(count($forAuthUser ) > 0)
        <h5>Заказы в корзине</h5>
        <br>
        <form method="POST" class="" action="{{route('basket_continue')}}">
            @csrf

            @foreach($basket as $order)
                @if($order->user_id === auth()->user()->id)
                    <div class="inner-form">
                        <h6>
                            <div class="d-flex flex-row align-items-center">
                                {{$order->categories->title}} {{$order->title}}, количество
                                {{$order->price}} руб..............
                                <input style="width: 45px;" class="" type="number" min="0" value="1" id="count"
                                       name="count[]">&nbsp;шт.
                            </div>
                        </h6>

                        <input type="hidden" id="product_id" name="product_id[]" value="{{$order->product_id}}">
                        <input type="hidden" id="price" name="price[]" value="{{$order->price}}">
                        <input type="hidden" id="user_id" name="user_id" value="{{$order->user_id}}">
                    </div>
                @endif
            @endforeach
            <button type="submit" class=" mt-3 btn btn-outline-success">Продолжить оформление</button>
        </form>
    @else
        <h5>У вас нет товаров в корзине</h5>
    @endif
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).on('click', '.deleteRecord', function (e) {

        var id = $(this).data("id");

        console.log(id);
        $.ajax(
            {
                url: "/basket/destroy/" + id,
                type: 'DELETE',
                data: {
                    "id": id,
                    _token: '{{csrf_token()}}'
                },
                success: function (data) {
                    id.closest('div').remove();
                },
                error: function (data, textStatus, errorThrown) {


                },
            });

    });
</script>

