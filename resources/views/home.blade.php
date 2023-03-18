@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row mx-5">
        <div class="w-25">
            <a class="btn btn-outline-info" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
               aria-controls="offcanvasExample">
                Показать админ панель
            </a>
            @include('components.admin.offcanvas')
        </div>

        <div class="w-75">
            <div class="container">
                @yield('body')
            </div>
        </div>
    </div>
@endsection

