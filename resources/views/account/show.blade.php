@extends('layouts.index')
@section('title', 'Мои работы')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
    <link rel="stylesheet" href="{{ asset('css/myWorks.css') }}">
@endsection
@section('content')
    <section class="profile">
        <div class="container">
            <div class="profile-menu">
                <div class="menu-avatar circle">
                    <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="" class="avatar">
                </div>
                <div class="menu-name"><p class="">{{ Auth::user()->username }}</p></div>
                <button type="button" class="menu-redactor">
                    <div class="redactor-icon"><img src="{{ asset('img/pen.png') }}" alt="" class="pen"></div>
                    <div class="redactor-text">
                        <p class=""><a href="{{ route('user.edit', Auth::id()) }}">Редактировать профиль</a></p>
                    </div>
                </button>
            </div>
        </div>
    </section>
    <div class="line"></div>
    <section class="redactor">
        <div class="container">
            <div class="redactor-menu">
                <div class="redactor-menu_container">
                    @foreach($works as $work)
                        <div class="menu-myWorks">
                            <img src="{{ $work->image }}" alt="">
                            <h3>
                                {{ $work->name }}
                            </h3>
                            <h3>
                                {{ $work->description }}
                            </h3>
                        </div>
                    @endforeach
                    <div class="menu-myWorks">
                        <button type="button" onclick="open_add_project()" class="menu-add"><img src="{{ asset('img/plus.png') }}" alt="" class="plus"></button>
                    </div>
                </div>
                <div class="menu-logo"><img src="{{ asset('img/logo.png') }}" alt="" class="logo"></div>
                <button type="button" onclick="open_add_project()" class="menu-send">Создайте проект</button>
            </div>
        </div>
    </section>
    <div class="popup">
        <div class="popup-content">
            <form id="new_project" class="add-project__form" action="{{ route('work.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image">
                <input name="name" type="text" placeholder="Укажите название">
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <textarea name="description" placeholder="Укажите описание" cols="30" rows="10"></textarea>
            </form>
            <div class="popup-footer">
                <button class="close" type="button">Отмена</button>
                <button class="send-button" onclick="document.querySelector('#new_project').submit()" type="button">Отправить</button>
            </div>
        </div>
    </div>
@endsection

