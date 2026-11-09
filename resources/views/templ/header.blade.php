<header class="site-header">
    <div class="site-header__container container">
        <a class="site-header__logo" href="/">
            <span>Discover</span>
            <small>journey</small>
        </a>
        <nav class="site-header__nav" aria-label="Primary navigation">
            <a href="/"
                class="site-header__link{{ request()->path() === '/' ? ' site-header__link--active' : '' }}">Главная</a>
            <a href="/tours"
                class="site-header__link{{ request()->is('tours') ? ' site-header__link--active' : '' }}">Туры</a>
            <a href="/registration"
                class="site-header__link{{ request()->is('registration') ? ' site-header__link--active' : '' }}">Регистрация</a>
        </nav>
        <div class="site-header__actions">
            <a class="site-header__cart" href="/cart" aria-label="Корзина">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M3.5 4.5h2l1.7 10.2a1.5 1.5 0 0 0 1.48 1.25h7.96a1.5 1.5 0 0 0 1.47-1.18L19.5 8H7"></path>
                    <circle cx="9.5" cy="19" r="1"></circle>
                    <circle cx="17" cy="19" r="1"></circle>
                </svg>
            </a>
            <details class="site-header__lang-switcher">
                <summary class="site-header__lang">RU</summary>
                <div class="site-header__lang-menu">
                    <button class="site-header__lang-option" type="button">RU</button>
                    <button class="site-header__lang-option" type="button">EN</button>
                    <button class="site-header__lang-option" type="button">KZ</button>
                </div>
            </details>
            <a class="site-header__talk" href="/registration">Связаться</a>
            <a class="site-header__cta" href="/registration">Забронировать</a>
        </div>
    </div>
</header>
