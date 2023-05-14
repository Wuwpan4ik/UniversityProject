@extends('layouts.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
@endsection
@section('content')
    <div class="container" style="max-width: 800px">
        @include('components.main.header')
        <div class="main">
            <div class="main__title">
                <h1 class="title">Редактировать профиль
            </div>
            <div class="main__settings">
                <form action="" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="settings">
                        <div class="left__bar settings__bar">
                            <div class="circle" style="width: 140px; height: 140px; border-radius: 50%; background-color: #4F4F4F">
                            </div>
                            <button type="button" style="background-color: transparent;">
                                <img src="{{ asset('img/load__icon.png') }}" alt=""> Загрузить
                            </button>
                        </div>
                        <div class="right__bar">
                            <div class="cl-2">
                                <label class="popup__label" for="name">
                                    Имя
                                    <input type="text" id="name" class="settings__input" value="{{ Auth::user()->name }}">
                                </label>
                                <label class="popup__label" for="surname">
                                    Фамилия
                                    <input type="text" id="surname" class="settings__input" value="{{ Auth::user()->surname }}">
                                </label>
                            </div>
                            <div class="cl-1">
                                <label class="popup__label" for="email">
                                    Электронная почта
                                    <input type="text" id="email" class="settings__input" value="{{ Auth::user()->email }}">
                                </label>
                            </div>
                            <div class="cl-1">
                                <label class="popup__label" for="username">
                                    Имя пользователя
                                    <input type="text" id="username" class="settings__input" value="{{ Auth::user()->username }}">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="main__about cl-1">
                        <label class="popup__label" for="about">
                            <h2 class="title">О себе</h2>
                            <textarea name="about" id="about" class="settings__input" cols="30" rows="10" placeholder="..."></textarea>
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
