@extends('layouts.index')
@section('title', 'RapPortfolio - Мои работы')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
    <link rel="stylesheet" href="{{ asset('css/myWorks.css') }}">
@endsection
@section('content')
    <style>
        /* закрывающая кнопка */
        .close-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
            font-size: 20px;
            color: #333;
        }
        .popup-content {
            position: relative;
            color: black;
        }

        .popup-title {
            font-size: 29px;
            line-height: 120%;
            color: #000000;
        }

        .mail__form {
            display:flex;
            flex-direction: column;
            justify-content: center;
            gap: 20px;
            align-items: center;
        }

        .mail__button {
            font-size: 20px;
            color: #c4c4c4;
            padding: 15px 100px;
            height: 62px;
            max-width: 500px;
            background: #232323;
            border-radius: 11px;
        }

        .mail__button:hover {
            color: white;
            background: black;
        }

        .mail__button.active {
            background: #384831;
        }
    </style>
    <section class="profile">
        <div class="container">
            <div class="profile-menu" style="width: 100%">
                <div style="display: flex;align-items: center;gap: 30px;">
                    <div class="menu-avatar circle">
                        <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="" class="avatar">
                    </div>
                    <div class="menu-name">
                        <div style="margin-bottom: 15px">
                            <p style="color: black">@if(Auth::user()->name) {{ Auth::user()->name }} {{ Auth::user()->surname }} @else {{ Auth::user()->username }} @endif</p>
                        </div>
                        <button type="button" onclick="copyLink()" style="color: black; display: flex; align-items: center; gap: 10px"><span id="share">Поделиться</span><i class="fa-solid fa-share"></i></button>
                    </div>
                </div>
                <div class="profile-menu">
                    @if(!Auth::user()->is_manager)
                    <a href="{{ route('user.edit', Auth::id()) }}">
                        <button type="button" class="menu-redactor">
                            <div class="redactor-icon"><i class="fa-solid fa-pen"></i></div>
                            <div class="redactor-text">
                                <p style="color: #000;">Редактировать профиль</p>
                            </div>
                        </button>
                    </a>
                    @endif
                    @if(!Auth::user()->is_manager)
                        <button type="button" class="menu-redactor menu-redactor__message">
                            <div class="redactor-icon"><i class="fa-solid fa-pen"></i></div>
                            <div class="redactor-text">
                                <p style="color: #000;">Добавить сопроводительное письмо</p>
                            </div>
                        </button>
                    @endif
                </div>
            </div>
            <div class="profile-menu" style="width: 100%; margin-top: 20px; color: black;">
                {{ Str::limit(Auth::user()->about_me, $limit = 150, $end = '...') }}
            </div>
        </div>
    </section>
    <div class="line"></div>
    <section class="redactor">
        <div class="container">
            <div class="redactor-menu">
                <div class="redactor-menu_container">
                    <div class="works-column">
                        @foreach($works as $work)
                            @include('components.main.work')
                        @endforeach
                            <div class="menu-myWorks">
                                <button type="button" onclick="open_add_project()" class="menu-add"><img src="{{ asset('img/plus.png') }}" alt="" class="plus"></button>
                            </div>
                    </div>

                </div>
                <div class="menu-logo" onclick="open_add_project()"><img src="{{ asset('img/logo.png') }}" alt="" class="logo"></div>
                <button type="button" style="color: black" onclick="open_add_project()" class="menu-send">Создайте проект</button>
            </div>
        </div>
    </section>
    <div class="popup popup-add">
        <div class="popup-content">
            <form id="new_project" class="add-project__form" action="{{ route('work.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image">
                <input name="name" type="text" placeholder="Укажите название">
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <select name="category_id">
                    @foreach(\App\Models\Category::all() as $category)
                        <option style="color: black" value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                <textarea name="description" placeholder="Укажите описание" cols="30" rows="10"></textarea>
            </form>
            <div class="popup-footer">
                <button class="close" type="button">Отмена</button>
                <button class="send-button" onclick="document.querySelector('#new_project').submit()" type="button">Отправить</button>
            </div>
        </div>
    </div>
    <div class="popup" id="popup">
        <div class="popup-content" style="max-width: 800px;">
            <span class="close-btn">&times;</span>
            <h2 class="popup-title" style="margin-bottom: 20px">Сопроводительное письмо</h2>
            <h3 style="font-size: 24px; margin-bottom: 20px;">Профиль {{ Auth::user()->username }}</h3>
            <form action="{{ route('mail', Auth::id()) }}" class="mail__form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <label for="mail"></label><textarea @if(Auth::user()->is_manager) disabled @endif style="width: 100%; border: 1px solid #4F4F4F; border-radius: 10px; padding: 10px 20px;" name="mail" id="mail"  cols="30" rows="10" @if(Auth::user()->mail) >{{ Auth::user()->mail }} @else placeholder="Добавьте текст, и его увидит HR-специалист">@endif</textarea>
                @if(!Auth::user()->is_manager)
                    <button class="mail__button" type="button" onclick="submitMessage(this)">
                        Сохранить
                    </button>
                @endif
            </form>
        </div>
    </div>

    <script>
        function copyLink() {
            const url = window.location.href; // получаем текущий URL
            navigator.clipboard.writeText(url) // копируем текст в буфер обмена
                .then(() => {
                    alert('URL скопирован успешно!')
                })
                .catch((error) => {
                    console.error(`Не удалось скопировать URL: ${error}`);
                });

        }
    </script>

    <script>
        function submitMessage(button) {
            let form = document.querySelector('.mail__form')
            let data = {
                'mail': form.querySelector('textarea[name="mail"]').value
            }
            console.log(data)
            fetch(form.action, {
                headers: {
                    'Content-Type': 'application/json;charset=utf-8',
                    "X-CSRF-Token": form.querySelector('input[name="_token"]').value
                },
                method: "PATCH",
                body: JSON.stringify(data)
            })
            button.innerHTML = 'Сохранено';
            button.classList.add('active')
            setTimeout(function (){
                button.innerHTML = 'Сохранить';
                button.classList.remove('active')
                document.querySelector('.close-btn').click()
            }, 2000)
        }
    </script>

    <script>
        // получаем доступ к попапу и кнопке закрытия
        let popups = document.getElementById('popup');
        const closeButton = popups.querySelector('.close-btn');

        // обработчик клика на кнопку открытия попапа
        document.querySelector('.menu-redactor__message').addEventListener('click', (event) => {
            event.preventDefault();
            popups.style.display = 'block';
            document.body.style.overflow = 'hidden'; // блокируем скроллинг страницы
        });

        // обработчик клика на кнопку закрытия попапа
        closeButton.addEventListener('click', () => {
            popups.style.display = 'none';
            document.body.style.overflow = ''; // разблокируем скроллинг страницы
        });
    </script>

    @if(Auth::user()->is_manager)
        <script>
            document.addEventListener('DOMContentLoaded', function (){
                document.querySelector('.menu-redactor__message').click()
            })

        </script>
    @endif

@endsection

