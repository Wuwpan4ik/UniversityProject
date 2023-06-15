<div class="popup__background">
    <div class="popup__container">
        <div class="popup__image"><img src="" alt=""></div>
        <div class="popup__form">
            <h2 class="popup__title">
                Авторизация
            </h2>
            <form action="" method="POST" class="popup__form">
                <label class="popup__label" for="password"><p>Логин</p><input class="popup__input" placeholder="Почта" id="username" type="email" name="username"></label>

                <label class="popup__label" for="password"><p>Пароль</p><input class="popup__input" placeholder="Пароль" id="password" type="text" name="password"></label>
                <button class="send__button">
                    Войти
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
                    Нет аккаунта? <a href="{{ route('register') }}" style="color: black;">Зарегистрируйтесь</a>
                </div>
            </div>
        </div>
    </div>
</div>
