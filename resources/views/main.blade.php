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
            <p class="">lorem Ipsum</p>
        </div>
    </section>
    <section class="container">
        <div class="works-column">
            @foreach($works as $work)
            <div class="column-work">
                <div class="work-name">{{ $work->user->name }}</div>
                <div class="work-title">{{ $work->name }}</div>
                <div class="work-image"><img src="{{ Storage::url($work->image) }}" alt="" class="work"></div>
                <div class="work-like">
                    <button class="like-image"><img src="{{ asset('img/like.png') }}" alt="" class="like"></button>
                    <div class="like-count"><p>1565</p></div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
