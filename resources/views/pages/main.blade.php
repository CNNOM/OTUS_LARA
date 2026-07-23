@extends('index')

@section('title', 'Главная')

@section('main')
    <main class="layout__content">
        <section class="home-hero">
            <div class="home-hero__frame container">
                <div class="home-hero__panel">
                    <div class="home-hero__visual">
                        <img src="{{ asset('images/hero-discover.png') }}" alt="Green ocean cliffs">
                        <div class="home-hero__overlay">
                        </div>
                        <p class="home-hero__brand">DISCOVER</p>
                        <div class="home-hero__intro">
                            <h1>Открой красоту природы совершенно по-новому</h1>
                            <p>Открывай живописные места, бронируй memorable tours и планируй спокойные путешествия
                                в одном удобном сервисе.</p>
                            <div class="home-hero__cta-row">
                                <a class="home-hero__button" href="/tours">Начать путешествие</a>
                                <span class="home-hero__note">Листай к рекомендованным направлениям</span>
                            </div>
                        </div>
                        <div class="home-hero__side-card">
                            <img src="{{ asset('images/tour-alpine.png') }}" alt="Mountain valley path">
                            <div class="home-hero__side-caption">
                                <span>Scenic routes</span>
                                <strong>Путешествуй шире привычных маршрутов</strong>
                            </div>
                        </div>
                    </div>
                    <div class="home-hero__search">
                        <div class="home-hero__search-item">
                            <span class="home-hero__search-label">Город или адрес</span>
                            <strong>Выберите направление</strong>
                        </div>
                        <div class="home-hero__search-item">
                            <span class="home-hero__search-label">Даты поездки</span>
                            <strong>Выберите период</strong>
                        </div>
                        <div class="home-hero__search-item">
                            <span class="home-hero__search-label">Тип ландшафта</span>
                            <strong>Горы, озёра, побережье</strong>
                        </div>
                        <a class="home-hero__search-button" href="/tours" aria-label="Find tours">Туры</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="recommended-tours">
            <div class="recommended-tours__container container">
                <div class="recommended-tours__heading">
                    <div>
                        <p class="recommended-tours__eyebrow">Рекомендованные направления</p>
                        <h2>Красивые путешествия для тех, кто любит впечатления и комфорт</h2>
                    </div>
                    <a class="recommended-tours__link" href="/tours">Смотреть все туры</a>
                </div>
                <div class="recommended-tours__grid">
                    <article class="tour-card">
                        <div class="tour-card__media">
                            <img src="{{ asset('images/hero-discover.png') }}" alt="Закатный круиз по Whitsunday Beach" loading="lazy">
                            <span class="tour-card__badge">Australia</span>
                        </div>
                        <div class="tour-card__meta">
                            <span>Coastal Escape</span>
                            <span>5 дней</span>
                        </div>
                        <h3 class="tour-card__title">Закатный круиз по Whitsunday Beach</h3>
                        <p class="tour-card__text">Морские панорамы, уединённые бухты и расслабленный маршрут в
                            премиальном стиле.</p>
                        <div class="tour-card__footer">
                            <span class="tour-card__rating">★ 4.9</span>
                            <span class="tour-card__price">$1,280</span>
                        </div>
                    </article>
                    <article class="tour-card">
                        <div class="tour-card__media">
                            <img src="{{ asset('images/tour-alpine.png') }}" alt="Пикник у озера Lucerne Swiss" loading="lazy">
                            <span class="tour-card__badge">Switzerland</span>
                        </div>
                        <div class="tour-card__meta">
                            <span>Lake Retreat</span>
                            <span>4 дня</span>
                        </div>
                        <h3 class="tour-card__title">Пикник у озера Lucerne Swiss</h3>
                        <p class="tour-card__text">Горные панорамы, локальная кухня и спокойный ритм путешествия.</p>
                        <div class="tour-card__footer">
                            <span class="tour-card__rating">★ 4.8</span>
                            <span class="tour-card__price">$1,540</span>
                        </div>
                    </article>
                    <article class="tour-card">
                        <div class="tour-card__media">
                            <img src="{{ asset('images/hero-discover.png') }}" alt="Путешествие к водопаду Angel Falls" loading="lazy">
                            <span class="tour-card__badge">Venezuela</span>
                        </div>
                        <div class="tour-card__meta">
                            <span>Adventure Trail</span>
                            <span>7 дней</span>
                        </div>
                        <h3 class="tour-card__title">Путешествие к водопаду Angel Falls</h3>
                        <p class="tour-card__text">Дикая природа, маршруты с гидом и насыщенные остановки в
                            красивых местах.</p>
                        <div class="tour-card__footer">
                            <span class="tour-card__rating">★ 4.7</span>
                            <span class="tour-card__price">$1,920</span>
                        </div>
                    </article>
                    <article class="tour-card">
                        <div class="tour-card__media">
                            <img src="{{ asset('images/tour-alpine.png') }}" alt="Скрытые тропы северной долины" loading="lazy">
                            <span class="tour-card__badge">Iceland</span>
                        </div>
                        <div class="tour-card__meta">
                            <span>Highland Route</span>
                            <span>6 дней</span>
                        </div>
                        <h3 class="tour-card__title">Скрытые тропы северной долины</h3>
                        <p class="tour-card__text">Путешествие для тех, кто ищет тишину, чистый воздух и северную
                            красоту.</p>
                        <div class="tour-card__footer">
                            <span class="tour-card__rating">★ 5.0</span>
                            <span class="tour-card__price">$2,060</span>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="adventure-highlight">
            <div class="adventure-highlight__container container">
                <div class="adventure-highlight__content">
                    <p class="adventure-highlight__eyebrow">Сделай путешествия ярче</p>
                    <h2>Маршруты, в которых сочетаются комфорт, природа и живые впечатления.</h2>
                    <p class="adventure-highlight__lead">Мы создаём поездки для людей, которым важны продуманные
                        маршруты, красивые места проживания и свобода наслаждаться дорогой в своём темпе.</p>
                    <div class="adventure-highlight__features">
                        <article>
                            <strong>Дайвинг и снорклинг</strong>
                            <p>Гибкие водные активности, помощь с экипировкой и тщательно выбранные локации у воды.</p>
                        </article>
                        <article>
                            <strong>Профессиональный гид</strong>
                            <p>Опытные локальные проводники, которые делают каждый маршрут проще и интереснее.</p>
                        </article>
                    </div>
                </div>
                <div class="adventure-highlight__visual">
                    <img src="{{ asset('images/tour-alpine.png') }}" alt="Panoramic green valley">
                    <span class="adventure-highlight__chip">Australia</span>
                    <span class="adventure-highlight__chip adventure-highlight__chip--muted">Beach</span>
                </div>
            </div>
        </section>
    </main>
@endsection
