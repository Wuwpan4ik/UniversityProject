@extends('layouts.index')
@section('title', 'Редактировать профиль')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
@endsection
@section('content')
    <div class="container" style="max-width: 800px">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">
                Привет
            </button>
        </form>
        @include('components.main.header')
        <div class="main">
            <div class="main__title">
                <h1 class="title">Редактировать профиль
            </div>
            <div class="main__settings">
                <form action="{{ route('user.update', Auth::id()) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="settings">
                        <div class="left__bar settings__bar">
                            <div class="circle" style="width: 140px; height: 140px; border-radius: 50%;">
                                <img style="width: 100%; height: 100%;" src="{{ Storage::url(Auth::user()->avatar) }}" alt="">
                            </div>
                            <input id="avatar" name="avatar" class="settings__avatar" type="file" title=" " style="background-color: transparent;">
                            <label for="avatar" style="display: flex; align-items: center; gap: 10px">
                                <img src="{{ asset('img/load__icon.png') }}" alt=""> Загрузить</label>
                            </input>
                        </div>
                        <div class="right__bar">
                            <div class="cl-2">
                                <label class="popup__label" for="name">
                                    Имя
                                    <input type="text" id="name" name="name" class="settings__input" value="{{ Auth::user()->name }}">
                                </label>
                                <label class="popup__label" for="surname">
                                    Фамилия
                                    <input type="text" id="surname" name="surname" class="settings__input" value="{{ Auth::user()->surname }}">
                                </label>
                            </div>
                            <div class="cl-1">
                                <label class="popup__label" for="email">
                                    Электронная почта
                                    <input type="text" id="email" name="email" class="settings__input" value="{{ Auth::user()->email }}">
                                </label>
                            </div>
                            <div class="cl-1">
                                <label class="popup__label" for="username">
                                    Имя пользователя
                                    <input type="text" id="username" name="username" class="settings__input" value="{{ Auth::user()->username }}">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="main__about cl-1">
                        <label class="popup__label" for="about">
                            <h2 class="title">О себе</h2>
                            <textarea name="about_me" id="about" class="settings__input" cols="30" rows="10" placeholder="...">{{ Auth::user()->about_me }}</textarea>
                        </label>
                    </div>
                    <div class="cl-1">
                        <button type="submit" class="settings__button">
                            Применить изменения
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('components.main.footer')
@endsection
