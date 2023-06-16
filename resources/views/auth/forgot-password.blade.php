<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DepPortfolio - Вспомнить пароль</title>
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
                Вспомнить пароль
            </h2>
            <form method="POST" action="{{ route('password.email') }}" class="popup__form">
                @csrf
                <label class="popup__label" for="password"><p>Почта</p>
                    <input class="popup__input @error('email') error @enderror" placeholder="Почта" id="email" type="text" name="email">
                </label>
                @if(count($errors))
                    <label class="popup__label errors" for="password">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="error">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </label>
                @endif
                <button class="send__button">
                    Войти
                </button>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll(".popup__input.error").forEach(item => {
            item.addEventListener('input', function () {
                this.classList.remove('error')
                document.querySelector('.errors').classList.add('display-none')
            })

        })
    })
</script>
</body>
</html>

