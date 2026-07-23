@extends('index')

@section('title', 'Туры')

@section('main')
    <main class="travel-content">
        <section class="hero hero--compact hero--tours">
            <div class="hero__content">
                <p class="hero__eyebrow">Curated journeys</p>
                <h1 class="hero__headline hero__headline--compact">
                    <span class="hero__headline-back">TOURS</span>
                    <span class="hero__headline-front">TOURS</span>
                </h1>
                <p class="hero__copy">
                    Подборка маршрутов с акцентом на атмосферу, комфорт и живые впечатления,
                    а не просто список отелей.
                </p>

                <div class="hero__actions">
                    <a class="button button--light" href="#tour-grid">Открыть каталог</a>
                    <a class="button button--ghost" href="/auth">Войти и сохранить</a>
                </div>
            </div>

            <div class="hero__image-wrap">
                <img class="hero__image"
                    src="https://images.unsplash.com/photo-1507608616759-54f48f0af0ee?auto=format&fit=crop&w=1600&q=80"
                    alt="Морское побережье и скалы">
            </div>
        </section>

        <section class="overview tours-overview">
            <div class="overview__intro">
                <p class="section-label">Подход к маршрутам</p>
                <h2>Туры для разного темпа отдыха</h2>
                <p>
                    Здесь можно развить настоящий каталог: фильтры, карточки, даты выезда,
                    количество мест, отзывы и кнопку бронирования.
                </p>
            </div>

            <div class="feature-list">
                <article class="feature-card">
                    <h3>Готовые сценарии</h3>
                    <p>Уикенд, семейный отдых, горы, море или спокойный slow travel.</p>
                </article>
                <article class="feature-card">
                    <h3>Прозрачная цена</h3>
                    <p>Сразу видно, что включено: трансфер, проживание, экскурсии и питание.</p>
                </article>
                <article class="feature-card">
                    <h3>Быстрое бронирование</h3>
                    <p>Сохранение тура в кабинете и оформление в несколько шагов.</p>
                </article>
            </div>
        </section>

        <section class="tour-grid-section" id="tour-grid">
            <div class="section-heading">
                <div>
                    <p class="section-label">Каталог туров</p>
                    <h2>Выберите настроение поездки</h2>
                </div>
                <a class="button button--dark" href="/auth">Войти для брони</a>
            </div>

            <div class="tour-grid">
                <article class="tour-card tour-card--large">
                    <span class="tour-card__tag">7 дней</span>
                    <h3>Алтайские панорамы</h3>
                    <p>Трекинг, эко-лодж и озёра на рассвете.</p>
                    <strong>от 68 000 ₽</strong>
                </article>

                <article class="tour-card tour-card--coast">
                    <span class="tour-card__tag">5 дней</span>
                    <h3>Средиземное море</h3>
                    <p>Бутик-отель, яхтенный день и ужины у воды.</p>
                    <strong>от 74 000 ₽</strong>
                </article>

                <article class="tour-card tour-card--city">
                    <span class="tour-card__tag">3 дня</span>
                    <h3>Городской уикенд</h3>
                    <p>Архитектура, гастрономия и авторский маршрут по кварталам.</p>
                    <strong>от 41 000 ₽</strong>
                </article>

                <article class="tour-card tour-card--forest">
                    <span class="tour-card__tag">4 дня</span>
                    <h3>Лес и тишина</h3>
                    <p>SPA, банный ритуал и прогулки без спешки.</p>
                    <strong>от 37 000 ₽</strong>
                </article>
            </div>
        </section>
    </main>
@endsection
