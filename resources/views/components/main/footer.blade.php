<footer>
    <div class="container">
        <div class="footer_row">
            <div class="footer_about">
                <div class="footer_title">О нас</div>
                <div class="footer_text">RapPortfolio - веб-сервис для всех, кто находится в поиске своего места в мире. Мы поможем вам найти работу.</div>
            </div>
            <div class="footer_navigation">
                <div class="footer_title">Навигация</div>
                <ul class="footer_list">
                    <li><a href="{{ route('home') }}" class="main_link footer_text">Главная</a></li>
                    <li><a href="{{ route('topAuthor') }}" class="rating_link footer_text">Топ авторов</a></li>
                    <li><a href="{{ route('topWorks') }}" class="rating_link footer_text">Топ работ</a></li>
                </ul>
            </div>
            <div class="footer_socials">
                <div class="footer_title footer_title__socials">Социальные сети</div>
                <div class="socials_row" style="justify-content: flex-start; padding: 15px 0;">
                    <a style="color: white; font-size: 24px;" href="mailto:dimalim110@gmail.com">Почта</a>
                </div>
            </div>
        </div>
    </div>
</footer>
