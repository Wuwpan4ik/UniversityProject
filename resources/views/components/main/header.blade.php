<header class="header">
    <div class="container">
        <div class="header-menu">
            <div class="menu-label">
                <div class="label-icon">
                    <img src="{{ asset('img/logo.png') }}" alt="">
                </div>
                <div class="label-name">
                    RapPortfolio
                </div>
            </div>
            <div class="menu-nav">
                <nav class="nav">
                    <ul class="nav-list">
                        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Главная</a></li>
                        <li class="nav-item">
                            <div id="item" class="item-dropdown ">
                                <button id="item-btn" class="item-drop">Категории</button>
                                <div class="dropdown-content">
                                    @foreach(\App\Models\Category::all() as $category)
                                        <a href="{{ route('category.show', $category->id) }}">{{ $category->title }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        @if(!Auth::user()->is_manager())
                        <li class="nav-item"><a href="{{ route('user.show', Auth::id()) }}" class="nav-link">Мои работы</a></li>
                        @endif
                        <li class="nav-item"><a href="{{ route('topAuthor') }}" class="nav-link">Топ авторов</a></li>
                        <li class="nav-item"><a href="{{ route('topWorks') }}" class="nav-link">Топ работ</a></li>
                    </ul>
                    <div id="nav" class="nav-dropdown ">
                        <button id="nav-btn" class="nav-drop"><img src="{{ asset('img/gum.svg') }}" alt="" class="burger"></button>
                        <div class="nav-content">
                            <a href="#!">Главная</a>
                            <div id="a" class="a-dropdown ">
                                <button id="a-btn" class="a-drop"><p>Категории</p></button>
                                <div class="a-content">
                                    @foreach(\App\Models\Category::all() as $category)
                                        <a href="{{ route('category.show', $category->id) }}">{{ $category->title }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <a href="{{ route('user.show', Auth::id()) }}">Мои работы</a>
                            <a href="#!">Топ авторов</a>
                            <a href="#!">Топ работ</a>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="menu-tools">
                <div class="tools-search">
                    <form class="search-form">
                        <img src="img/search.png" alt="" class="form-button">
                        <input class="header-input" type="text" name="text" placeholder="Поиск..." class="form-search">
                    </form>
                </div>
                @guest()
                    <div class="tools-login">
                        <a href="{{ route('login') }}" class="login">Log in</a>
                    </div>
                @else
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Выйти</button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
</header>
