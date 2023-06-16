<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

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
            <form method="POST" action="{{ route('password.update') }}" class="popup__form">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <label class="popup__label" for="password"><p>Почта</p>
                    <input class="popup__input @error('email') error @enderror" value="{{ old('email', $request->email) }}" placeholder="Почта" id="email" type="text" name="email">
                </label>
                <label class="popup__label " for="password">
                    <p>Пароль</p>
                    <input class="popup__input @error('password') error @enderror" placeholder="Пароль" id="password" type="password" name="password">
                </label>
                <label class="popup__label" for="password_confirm">
                    <p>Подтвердите пароль</p>
                    <input class="popup__input @error('password_confirmation') error @enderror" placeholder="Пароль" id="password" type="password" name="password_confirmation">
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


