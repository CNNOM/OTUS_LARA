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
                    @foreach ($tours as $tour)
                        @include('pages.tour-card', ['tour' => $tour])
                    @endforeach
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
