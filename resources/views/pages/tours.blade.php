@extends('index')

@section('title', 'Туры')

@section('main')
    <main class="layout__content">
        <section class="tours-hero">
            <div class="tours-hero__container container">
                <div class="tours-hero__content">
                    <p class="tours-hero__eyebrow">Коллекция туров</p>
                    <h1>Найди маршрут, который подходит твоему темпу, настроению и мечтам.</h1>
                    <p>Выбирай гибкие пакеты для красивых поездок, активных выходных и premium-маршрутов с гидом для тех,
                        кто ценит и комфорт, и эмоции.</p>
                </div>
                <div class="tours-hero__stats">
                    <article>
                        <strong>48+</strong>
                        <span>готовых маршрутов</span>
                    </article>
                    <article>
                        <strong>16</strong>
                        <span>стран</span>
                    </article>
                    <article>
                        <strong>4.9/5</strong>
                        <span>средний рейтинг</span>
                    </article>
                </div>
            </div>
        </section>
        <section class="tours-catalog">
            <div class="tours-catalog__container container">
                <div class="tours-catalog__toolbar">
                    <div class="tours-catalog__filters">
                        <span>Отдых на природе</span>
                        <span>Luxury stay</span>
                        <span>Маршруты с гидом</span>
                    </div>
                    <a href="/registration.html">Заказать индивидуальный тур</a>
                </div>
                <div class="tours-catalog__grid">
                    <article class="tour-card">
                        <div class="tour-card__media">
                            <img src="/images/hero-discover.png" alt="Закатный круиз по Whitsunday Beach" loading="lazy">
                            <span class="tour-card__badge">Australia</span>
                        </div>
                        <div class="tour-card__meta">
                            <span>Coastal Escape</span>
                            <span>5 дней</span>
                        </div>
                        <h3 class="tour-card__title">Закатный круиз по Whitsunday Beach</h3>
                        <p class="tour-card__text">Морские панорамы, уединённые бухты и расслабленный маршрут в премиальном
                            стиле.</p>
                        <div class="tour-card__footer">
                            <span class="tour-card__rating">★ 4.9</span>
                            <span class="tour-card__price">$1,280</span>
                        </div>
                    </article>
                    <article class="tour-card">
                        <div class="tour-card__media">
                            <img src="/images/tour-alpine.png" alt="Пикник у озера Lucerne Swiss" loading="lazy">
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
                            <img src="/images/hero-discover.png" alt="Путешествие к водопаду Angel Falls" loading="lazy">
                            <span class="tour-card__badge">Venezuela</span>
                        </div>
                        <div class="tour-card__meta">
                            <span>Adventure Trail</span>
                            <span>7 дней</span>
                        </div>
                        <h3 class="tour-card__title">Путешествие к водопаду Angel Falls</h3>
                        <p class="tour-card__text">Дикая природа, маршруты с гидом и насыщенные остановки в красивых местах.
                        </p>
                        <div class="tour-card__footer">
                            <span class="tour-card__rating">★ 4.7</span>
                            <span class="tour-card__price">$1,920</span>
                        </div>
                    </article>
                    <article class="tour-card">
                        <div class="tour-card__media">
                            <img src="/images/tour-alpine.png" alt="Скрытые тропы северной долины" loading="lazy">
                            <span class="tour-card__badge">Iceland</span>
                        </div>
                        <div class="tour-card__meta">
                            <span>Highland Route</span>
                            <span>6 дней</span>
                        </div>
                        <h3 class="tour-card__title">Скрытые тропы северной долины</h3>
                        <p class="tour-card__text">Путешествие для тех, кто ищет тишину, чистый воздух и северную красоту.
                        </p>
                        <div class="tour-card__footer">
                            <span class="tour-card__rating">★ 5.0</span>
                            <span class="tour-card__price">$2,060</span>
                        </div>
                    </article>
                    <article class="tour-card">
                        <div class="tour-card__media">
                            <img src="/images/register-retreat.png" alt="Лесные лоджи и термальные источники"
                                loading="lazy">
                            <span class="tour-card__badge">Norway</span>
                        </div>
                        <div class="tour-card__meta">
                            <span>Wellness Journey</span>
                            <span>3 дня</span>
                        </div>
                        <h3 class="tour-card__title">Лесные лоджи и термальные источники</h3>
                        <p class="tour-card__text">Медленные утра, панорамные террасы и восстановление на природе.</p>
                        <div class="tour-card__footer">
                            <span class="tour-card__rating">★ 4.8</span>
                            <span class="tour-card__price">$980</span>
                        </div>
                    </article>
                    <article class="tour-card">
                        <div class="tour-card__media">
                            <img src="/images/register-retreat.png" alt="Glamping-уикенд у альпийского озера"
                                loading="lazy">
                            <span class="tour-card__badge">Austria</span>
                        </div>
                        <div class="tour-card__meta">
                            <span>Cabin Stay</span>
                            <span>2 дня</span>
                        </div>
                        <h3 class="tour-card__title">Glamping-уикенд у альпийского озера</h3>
                        <p class="tour-card__text">Стильный отдых на природе для пар, друзей и тех, кто едет впервые.</p>
                        <div class="tour-card__footer">
                            <span class="tour-card__rating">★ 4.9</span>
                            <span class="tour-card__price">$860</span>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </main>
@endsection
