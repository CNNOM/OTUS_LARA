@extends('index')

@section('title', 'Главная')

@section('main')
    <main class="travel-content">
        <section class="hero">
            <div class="hero__content">
                <p class="hero__eyebrow">Travel booking platform</p>
                <h1 class="hero__headline">
                    <span class="hero__headline-back">WANDER</span>
                    <span class="hero__headline-front">WANDER</span>
                </h1>
                <p class="hero__copy">
                    Бронируйте отели, авторские туры и поездки выходного дня в одном месте.
                    Страница специально повторяет любимый приём из референса: текст частично
                    уходит под фотографию и выглядит объёмнее.
                </p>

                <div class="hero__actions">
                    <a class="button button--light" href="/tours">Смотреть туры</a>
                    <a class="button button--ghost" href="/auth">Забронировать</a>
                </div>
            </div>

            <div class="hero__image-wrap">
                <img class="hero__image"
                    src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1600&q=80"
                    alt="Спокойное зелёное озеро в горах">
            </div>
        </section>

        <section class="overview" id="benefits">
            <div class="overview__intro">
                <p class="section-label">Почему выбирают нас</p>
                <h2>Удобный сервис для путешествий по России и за границу</h2>
                <p>
                    Для учебного проекта это хорошая тема: здесь можно показать каталог,
                    фильтры, личный кабинет, бронирование, оплату, статусы заказов и админку.
                </p>

                <div class="stats">
                    <article>
                        <strong>12k</strong>
                        <span>счастливых туристов</span>
                    </article>
                    <article>
                        <strong>85+</strong>
                        <span>направлений</span>
                    </article>
                    <article>
                        <strong>24/7</strong>
                        <span>поддержка</span>
                    </article>
                </div>
            </div>

            <div class="feature-list">
                <article class="feature-card">
                    <h3>Локальная экспертиза</h3>
                    <p>Подбор туров с понятными маршрутами, датами и рекомендациями по сезону.</p>
                </article>
                <article class="feature-card">
                    <h3>Отели и туры в одном месте</h3>
                    <p>Можно собрать поездку целиком: проживание, трансфер и экскурсионную программу.</p>
                </article>
                <article class="feature-card">
                    <h3>Управление бронями</h3>
                    <p>Из личного кабинета легко менять статус заказа, видеть историю и уведомления.</p>
                </article>
            </div>
        </section>

        <section class="destinations" id="destinations">
            <div class="section-heading">
                <div>
                    <p class="section-label">Популярные места</p>
                    <h2>Направления, которые хочется открыть первыми</h2>
                </div>
                <a class="button button--dark" href="#packages">Все предложения</a>
            </div>

            <div class="destination-grid">
                <article class="destination-card destination-card--tall">
                    <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=900&q=80"
                        alt="Горы">
                    <div class="destination-card__overlay">
                        <span>от 48 000 ₽</span>
                        <h3>Алтай</h3>
                        <p>Трекинг, озёра и панорамные маршруты</p>
                    </div>
                </article>

                <article class="destination-card">
                    <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=900&q=80"
                        alt="Пляж">
                    <div class="destination-card__overlay">
                        <span>от 62 000 ₽</span>
                        <h3>Бали</h3>
                        <p>Пляжи, виллы и slow travel</p>
                    </div>
                </article>

                <article class="destination-card">
                    <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=900&q=80"
                        alt="Долина">
                    <div class="destination-card__overlay">
                        <span>от 39 000 ₽</span>
                        <h3>Грузия</h3>
                        <p>Горы, вино и городские уикенды</p>
                    </div>
                </article>

                <article class="destination-card destination-card--wide">
                    <img src="https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?auto=format&fit=crop&w=1200&q=80"
                        alt="Город у воды">
                    <div class="destination-card__overlay">
                        <span>от 55 000 ₽</span>
                        <h3>Стамбул</h3>
                        <p>Бутик-отели, гастрономия и насыщенная экскурсионная программа</p>
                    </div>
                </article>
            </div>
        </section>

        <section class="packages" id="packages">
            <article class="packages__lead">
                <p class="section-label">Турпакеты</p>
                <h2>Соберите путешествие под свой ритм</h2>
                <p>
                    Вы можете оставить эту секцию как демо для каталога туров, а дальше уже
                    подключить данные из базы и сделать фильтрацию по цене, датам и стране.
                </p>
                <a class="button button--dark" href="#booking">Открыть каталог</a>
            </article>

            <article class="package-card package-card--forest">
                <p class="package-card__kicker">Adventure</p>
                <h3>Горные выходные</h3>
                <p>Хайкинг, спа-отель и готовый трансфер из аэропорта.</p>
            </article>

            <article class="package-card package-card--mist">
                <p class="package-card__kicker">Relax</p>
                <h3>Море и бутик-отель</h3>
                <p>Формат для спокойного отдыха с красивой первой линией.</p>
            </article>
        </section>

        <section class="booking" id="booking">
            <div>
                <p class="section-label">Как это работает</p>
                <h2>Бронирование за три простых шага</h2>
            </div>

            <div class="booking-steps">
                <article>
                    <strong>01</strong>
                    <h3>Выберите направление</h3>
                    <p>Страна, город, даты и тип отдыха.</p>
                </article>
                <article>
                    <strong>02</strong>
                    <h3>Настройте поездку</h3>
                    <p>Добавьте отель, экскурсии и трансфер.</p>
                </article>
                <article>
                    <strong>03</strong>
                    <h3>Подтвердите бронь</h3>
                    <p>Оплата, письмо-подтверждение и статус заказа.</p>
                </article>
            </div>
        </section>
    </main>
@endsection

