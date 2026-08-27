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
            <a href="/auth"
                class="site-header__link{{ request()->is('auth') ? ' site-header__link--active' : '' }}">Регистрация</a>
        </nav>
        <div class="site-header__actions">
            <details class="site-header__lang-switcher">
                <summary class="site-header__lang">RU</summary>
                <div class="site-header__lang-menu">
                    <button class="site-header__lang-option" type="button">RU</button>
                    <button class="site-header__lang-option" type="button">EN</button>
                    <button class="site-header__lang-option" type="button">KZ</button>
                </div>
            </details>
            <a class="site-header__talk" href="/auth">Связаться</a>
            <a class="site-header__cta" href="/auth">Забронировать</a>
        </div>
    </div>
</header>
