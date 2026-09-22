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
                        <strong>{{ $tours->count() }}</strong>
                        <span>готовых маршрутов</span>
                    </article>
                    <article>
                        <strong>{{ $tours->pluck('country')->unique()->count() }}</strong>
                        <span>стран</span>
                    </article>
                    <article>
                        <strong>{{ $tours->whereNotNull('rating')->isNotEmpty() ? number_format($tours->avg('rating'), 1) . '/5' : '—' }}</strong>
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
                    @forelse ($tours as $tour)
                        <article class="tour-card">
                            <div class="tour-card__media">
                                <img src="{{ $tour->image ? asset('storage/' . $tour->image) : asset('images/hero-discover.png') }}"
                                    alt="{{ $tour->title }}" loading="lazy">
                                <span class="tour-card__badge">{{ $tour->country }}</span>
                            </div>
                            <div class="tour-card__meta">
                                <span>{{ $tour->category }}</span>
                                <span>{{ $tour->duration_days }}
                                    {{ trans_choice('день|дня|дней', $tour->duration_days, [], 'ru') }}</span>
                            </div>
                            <h3 class="tour-card__title">{{ $tour->title }}</h3>
                            <p class="tour-card__text">{{ $tour->description }}</p>
                            <div class="tour-card__footer">
                                <span
                                    class="tour-card__rating">{{ $tour->rating !== null ? '★ ' . $tour->rating : 'Нет оценок' }}</span>
                                <span
                                    class="tour-card__price">${{ number_format((float) $tour->price, 2, '.', ',') }}</span>
                            </div>
                        </article>
                    @empty
                        <p>Сейчас нет опубликованных туров. Загляните позже.</p>
                    @endforelse
                </div>
                <div class="tours-catalog__pagination">
                    <button class="ui-button ui-button--primary" type="button">Показать ещё</button>
                </div>
            </div>
        </section>
    </main>
@endsection
