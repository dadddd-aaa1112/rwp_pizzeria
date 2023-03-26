@extends('home')
@section('body')
    @php
        $i=1;
    @endphp
    <h4>{{$title}}</h4>
    <form class="w-50 bg-warning px-5 py-5 rounded" action="{{route('product_store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Название</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Введите название продукта">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input name="image" type="file" class="form-control" id="image" rows="3">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Цена</label>
            <input name="price"
                   min="0.00"
                   step="any"
                   type="number"
                   class="form-control"
                   id="price"
                   rows="3"
            >
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Категория</label>
            <select class="form-select" name="category_id" id="category">
                <option value="val" >Выберите категорию продукта</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection
