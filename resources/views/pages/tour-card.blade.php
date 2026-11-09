<article class="tour-card">
    <a class="tour-card__media" href="{{ route('tours.show', $tour) }}">
        <img src="{{ $tour->image ? asset('storage/'.$tour->image) : asset('images/hero-discover.png') }}"
            alt="{{ $tour->title }}" loading="lazy">
        <span class="tour-card__badge">{{ $tour->country }}</span>
    </a>
    <div class="tour-card__meta">
        <span>{{ $tour->category }}</span>
        <span>{{ $tour->duration_days }} {{ trans_choice('день|дня|дней', $tour->duration_days, [], 'ru') }}</span>
    </div>
    <h3 class="tour-card__title"><a href="{{ route('tours.show', $tour) }}">{{ $tour->title }}</a></h3>
    <p class="tour-card__text">{{ $tour->description }}</p>
    <div class="tour-card__footer">
        <span class="tour-card__rating">{{ $tour->rating !== null ? '★ '.$tour->rating : 'Нет оценок' }}</span>
        <span class="tour-card__price">${{ number_format((float) $tour->price, 2, '.', ',') }}</span>
    </div>
</article>
