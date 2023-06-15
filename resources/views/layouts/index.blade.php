<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    @include('components.main.header')
    <div class="content">
        @yield('content')
        @include('components.main.footer')
    </div>

</div>
<script src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
<script>
    // Работа с лайками
    function like(button) {
        let form = button.closest('.like__form');
        let token = form.querySelector('input[name="_token"]').value;
        const formData = new FormData(form)
        let like = form.querySelector('.like')
        let count = form.querySelector('.like-count')
        if (like.classList.contains('active')) {
            like.classList.remove('active')
            count.innerHTML = parseInt(count.innerHTML) - 1
        } else {
            like.classList.add('active')
            count.innerHTML = parseInt(count.innerHTML) + 1
        }

        fetch(form.action, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': token,
                'Content-Type': 'application/json'
            },
            body: formData,
        })
    }

</script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
