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
                    <a href="/registration">Заказать индивидуальный тур</a>
                </div>
                <div class="tours-catalog__grid">
                    @forelse ($tours as $tour)
                        @include('pages.tour-card', ['tour' => $tour])
                    @empty
                        <p>Сейчас нет опубликованных туров. Загляните позже.</p>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
@endsection
