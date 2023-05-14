<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="popup__background">
    <div class="popup__container">
        <div class="popup__image"><img src="" alt=""></div>
        <div class="popup__form">
            <h2 class="popup__title">
                Регистрация
            </h2>
            <form action="{{ route('register') }}" method="POST" class="popup__form">
                @csrf
                <label class="popup__label" for="password"><p>Логин</p>
                    <input class="popup__input" placeholder="Логин" id="username" type="text" name="username">
                </label>
                <label class="popup__label" for="password"><p>Почта</p>
                    <input class="popup__input" placeholder="Почта" id="username" type="email" name="email">
                </label>
                <label class="popup__label" for="password">
                    <p>Пароль</p><input class="popup__input" placeholder="Пароль" id="password" type="password" name="password">
                </label>
                <label class="popup__label" for="password_confirm">
                    <p>Подтвердите пароль</p><input class="popup__input" placeholder="Пароль" id="password" type="password" name="password_confirmation">
                </label>
                <button class="send__button">
                    Создать аккаунт
                </button>
            </form>
            <div class="popup__social">
                <div class="popup__social-title" style="font-size: 18px;">
                    Или войдите с помощью
                </div>
                <div class="socials_row" style="justify-content: start; padding: 10px 0">
                    <a href=""><i class="fa-brands fa-google icon"></i></a>
                    <a href=""><i style="color: #2563ea" class="fa-brands fa-telegram icon"></i></a>
                    <a href=""><i style="color: #2563eb" class="fa-brands fa-vk icon"></i></a>
                </div>
                <div class="popup__social-link" style="font-size: 20px;">
                    Уже есть аккаунт? <a href="{{ route('login') }}" style="color: black;">Авторизуйтесь</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
