@extends('layouts.index')
@section('title', 'Главная страница')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
@endsection
@section('content')
    <section class="title container">
        <div class="title-name"><p class="">Создай<br>
                портфолио</p></div>
        <div class="title-info"><p class="">С помощью нашего сервиса ты<br> можешь представить нужный продукт</p></div>
        <div class="title-footer">
        </div>
    </section>
    <section class="container">
        @isset($category)
            <div class="title-name" style="margin: 50px 0">
                <p class="" style="color: black;">{{ $category->title }}</p>
            </div>
        @endisset
        <div class="works-column">
            @foreach($works as $work)
                @include('components.main.work')
            @endforeach
        </div>
    </section>
@endsection
