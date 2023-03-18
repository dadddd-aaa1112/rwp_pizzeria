@extends('home')
@section('body')
@php
$i=1;
@endphp
    <h4>{{$title}}</h4>

    <table class="table table-striped table-warning table-hover">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Имя</th>
            <th scope="col"> </th>
            <th scope="col"> </th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>

            </tr>
        @endforeach


        </tbody>
    </table>
    {{$users->withQueryString()->links()}}
@endsection
