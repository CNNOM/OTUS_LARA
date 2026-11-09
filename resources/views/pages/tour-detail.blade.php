@extends('index')

@section('title', $tour->title)

@section('main')
    <main class="layout__content">
        <section class="tour-detail">
            <div class="tour-detail__container container">
                <a class="tour-detail__back" href="{{ route('tours.index') }}">← Все туры</a>
                <div class="tour-detail__heading">
                    <p class="tour-detail__eyebrow">{{ $tour->category }} · {{ $tour->country }}</p>
                    <h1>{{ $tour->title }}</h1>
                    <p>{{ $tour->description }}</p>
                </div>
                <div class="tour-detail__layout">
                    <div class="tour-detail__gallery-wrap">
                        <div class="tour-detail__gallery">
                            <figure>
                                <img src="{{ $tour->image ? asset('storage/'.$tour->image) : asset('images/hero-discover.png') }}"
                                    alt="{{ $tour->title }}">
                                <figcaption>{{ $tour->country }} · {{ $tour->category }}</figcaption>
                            </figure>
                        </div>
                    </div>
                    <aside class="tour-detail__booking" aria-label="Информация о туре">
                        <p class="tour-detail__eyebrow">Информация о поездке</p>
                        <div class="tour-detail__facts">
                            <div><span>Страна</span><strong>{{ $tour->country }}</strong></div>
                            <div><span>Продолжительность</span><strong>{{ $tour->duration_days }} дней</strong></div>
                            <div><span>Категория</span><strong>{{ $tour->category }}</strong></div>
                            <div><span>Рейтинг</span><strong>{{ $tour->rating !== null ? '★ '.$tour->rating : 'Нет оценок' }}</strong></div>
                        </div>
                        <form id="tour-options" class="tour-options" action="{{ route('cart') }}" method="get"
                            data-base-price="{{ $tour->price }}" data-duration="{{ $tour->duration_days }}">
                            <h3>Настройте поездку</h3>
                            <input type="hidden" name="tour" value="{{ $tour->id }}">
                            <div class="tour-options__travelers">
                                <div class="tour-options__group">
                                    <label for="tour-adults">Взрослые · от 14 лет</label>
                                    <div class="tour-options__counter">
                                        <button type="button" data-count-change="-1" aria-label="Уменьшить количество взрослых">−</button>
                                        <input id="tour-adults" type="number" name="adults" min="1" max="99" value="1" required>
                                        <button type="button" data-count-change="1" aria-label="Увеличить количество взрослых">+</button>
                                    </div>
                                </div>
                                <div class="tour-options__group">
                                    <label for="tour-under5">Дети · до 5 лет</label>
                                    <div class="tour-options__counter">
                                        <button type="button" data-count-change="-1" aria-label="Уменьшить количество детей до 5 лет">−</button>
                                        <input id="tour-under5" type="number" name="under5" min="0" max="99" value="0" required>
                                        <button type="button" data-count-change="1" aria-label="Увеличить количество детей до 5 лет">+</button>
                                    </div>
                                </div>
                                <div class="tour-options__group">
                                    <label for="tour-children">Дети · 5–13 лет</label>
                                    <div class="tour-options__counter">
                                        <button type="button" data-count-change="-1" aria-label="Уменьшить количество детей">−</button>
                                        <input id="tour-children" type="number" name="children" min="0" max="99" value="0" required>
                                        <button type="button" data-count-change="1" aria-label="Увеличить количество детей">+</button>
                                    </div>
                                </div>
                            </div>
                            @if ($tour->hotels)
                            <fieldset class="tour-options__hotels">
                                <legend>Выберите отель</legend>
                                <div class="tour-options__hotel-controls">
                                    <span>Листайте варианты размещения</span>
                                    <div>
                                        <button type="button" data-hotel-prev aria-label="Предыдущий отель">←</button>
                                        <button type="button" data-hotel-next aria-label="Следующий отель">→</button>
                                    </div>
                                </div>
                                <div class="tour-options__hotel-track" data-hotel-track>
                                    @foreach ($tour->hotels as $hotel)
                                        <label class="tour-options__hotel">
                                            <input type="radio" name="hotel" value="{{ $hotel['id'] }}" data-tour-hotel
                                                data-rate="{{ $hotel['extra_per_day'] }}" @checked($loop->first)>
                                            <span class="tour-options__hotel-card">
                                                <img src="{{ asset($hotel['image']) }}" alt="Иллюстрация размещения: {{ $hotel['name'] }}" loading="lazy">
                                                <span class="tour-options__hotel-info">
                                                    <strong>{{ $hotel['name'] }}</strong>
                                                    <span>{{ $hotel['description'] }}</span>
                                                    <span class="tour-options__amenities">{{ $hotel['amenities'] }}</span>
                                                    <b>{{ $hotel['extra_per_day'] ? '+$'.number_format($hotel['extra_per_day']).' / день за человека' : 'Без доплаты' }}</b>
                                                </span>
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                                <small>Отели и фотографии — примеры, не подтверждённые варианты размещения.</small>
                            </fieldset>
                            @else
                                <p>Варианты размещения для этого тура пока не добавлены.</p>
                            @endif
                            <div class="tour-options__date">
                                <label for="tour-start">Дата начала тура</label>
                                <input id="tour-start" type="date" name="start" min="{{ now()->toDateString() }}" required>
                                <output data-tour-dates aria-live="polite">Выберите дату начала тура</output>
                                <small>Даты примерные, наличие мест не проверяется.</small>
                            </div>
                        </form>
                        <div class="tour-detail__booking-summary">
                            <div class="tour-detail__price">
                                <span>Базовый тариф за {{ $tour->duration_days }} дней / за человека</span>
                                <div><span>Взрослый · от 14 лет</span><strong>${{ number_format((float) $tour->price, 2, '.', ',') }}</strong></div>
                                <div><span>Ребёнок · до 5 лет</span><strong>${{ number_format((float) $tour->price * 0.25, 2, '.', ',') }}</strong></div>
                                <div><span>Ребёнок · 5–13 лет</span><strong>${{ number_format((float) $tour->price * 0.7, 2, '.', ',') }}</strong></div>
                                <small>Отель добавляется за гостя в день. Цены и доступность примерные.</small>
                                <div class="tour-detail__price-total"><span>Итого за всех</span>
                                    <strong data-tour-total>${{ number_format((float) $tour->price, 2, '.', ',') }}</strong>
                                </div>
                            </div>
                            <button class="ui-button ui-button--primary" type="submit" form="tour-options" @disabled(! $tour->hotels)>Перейти в корзину</button>
                            <p class="tour-detail__disclaimer">Заявки и оплата пока не подключены. Условия и даты уточняются.</p>
                        </div>
                    </aside>
                </div>
                <section class="tour-detail__section tour-detail__overview">
                    <div><p class="tour-detail__eyebrow">О путешествии</p><h2>Подробнее о маршруте</h2></div>
                    <div><p>{{ $tour->details ?: $tour->description }}</p></div>
                </section>
                @if ($tour->itinerary || $tour->program)
                    <section class="tour-detail__section" aria-labelledby="tour-route">
                        <p class="tour-detail__eyebrow">День за днём</p>
                        <h2 id="tour-route">Примерная программа</h2>
                        @if ($tour->itinerary)
                            <ol class="tour-detail__days">
                                @foreach ($tour->itinerary as $stage)
                                    <li><span>Этап {{ $loop->iteration }}</span>
                                        <div><h3>{{ $stage['title'] }}</h3><p>{{ $stage['description'] }}</p></div>
                                    </li>
                                @endforeach
                            </ol>
                        @else
                            <p>{{ $tour->program }}</p>
                        @endif
                        <p class="tour-detail__note">Порядок остановок и даты примерные; детали маршрута зависят от условий поездки.</p>
                    </section>
                @endif
                <section class="tour-detail__section" aria-labelledby="tour-terms">
                    <p class="tour-detail__eyebrow">Перед поездкой</p>
                    <h2 id="tour-terms">Стоимость и условия</h2>
                    <div class="tour-detail__terms">
                        <div><h3>Планируемый пакет</h3><p>Маршрут «{{ $tour->title }}» и размещение выбранной категории.</p></div>
                        <div><h3>Дополнительные расходы</h3><p>Дорога до места встречи, документы и личные расходы не включены в расчёт.</p></div>
                    </div>
                    <p class="tour-detail__note">Состав пакета, сроки, даты и условия отмены не утверждены. Оплата пока не подключена.</p>
                </section>
                <section class="tour-detail__section" aria-labelledby="tour-questions">
                    <p class="tour-detail__eyebrow">Полезно знать</p>
                    <h2 id="tour-questions">Частые вопросы</h2>
                    <div class="tour-detail__questions">
                        <details><summary>Когда можно поехать?</summary><p>Выбранная дата примерная: наличие мест пока не проверяется.</p></details>
                        <details><summary>Можно ли купить тур сейчас?</summary><p>Корзина демонстрационная, оплата и отправка заказа ещё не подключены.</p></details>
                    </div>
                </section>
                <div class="tour-detail__closing">
                    <div><p class="tour-detail__eyebrow">Уже представляете себя здесь?</p>
                        <h2>Пусть следующим кадром станет ваш</h2>
                        <p>Посмотрите другие направления и выберите подходящий маршрут.</p></div>
                    <div class="tour-detail__actions"><a class="ui-button ui-button--primary" href="{{ route('tours.index') }}">Другие туры</a></div>
                </div>
            </div>
        </section>
    </main>
    @vite('resources/scripts/tour-booking.js')
@endsection
