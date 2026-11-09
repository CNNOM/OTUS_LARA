@extends('index')

@section('title', 'Корзина и оформление заказа')

@section('main')
<main class="layout__content">
        <section class="cart-page">
          <div class="cart-page__container container">
            <div class="cart-page__heading">
              <p class="cart-page__eyebrow">Ваш заказ</p>
              <h1 class="ui-title">Корзина и оформление</h1>
              <p class="cart-page__intro">Настройка поездки и ориентировочная стоимость. Отправка заказа пока не подключена.</p>
            </div>
            <div class="cart-page__layout">
              @if ($tour)
                  <div class="cart-page__cart">
                      <div class="cart-page__section-heading"><h2>Выбранный тур</h2></div>
                      <article class="cart-item">
                          <img src="{{ $tour->image ? asset('storage/'.$tour->image) : asset('images/hero-discover.png') }}" alt="{{ $tour->title }}">
                          <div class="cart-item__content">
                              <span class="cart-item__label">{{ $tour->category }}</span>
                              <h3>{{ $tour->title }}</h3>
                              <p>{{ $tour->country }} · {{ $tour->duration_days }} дней</p>
                              <a href="{{ route('tours.show', $tour) }}">Изменить выбор</a>
                          </div>
                      </article>
                      <p>Взрослые: {{ $adults }} · Дети до 5 лет: {{ $under5 }} · Дети 5–13 лет: {{ $children }}</p>
                      <p>Отель: {{ $hotel['name'] }}</p>
                      <p>Дата начала: {{ $selection['start'] ?? 'Не выбрана' }}</p>
                      <div class="cart-page__summary"><span>Ориентировочная стоимость</span>
                          <strong>${{ number_format($total, 2, '.', ',') }}</strong></div>
                  </div>
              @else
                  <div class="cart-page__cart"><p>Корзина пуста. Выберите тур в каталоге.</p>
                      <a class="ui-button ui-button--primary" href="{{ route('tours.index') }}">Смотреть туры</a></div>
              @endif
              @if ($tour)
      <form class="checkout-form" id="checkout-form" data-checkout-form>
        <div class="cart-page__section-heading">
          <h2>Оформление заказа</h2>
        </div>
        <fieldset>
          <legend>Кто оформляет заказ</legend>
          <div class="checkout-form__type-grid" role="tablist" aria-label="Тип покупателя">
            <label class="checkout-form__choice">
              <input type="radio" name="customer-type" value="individual" checked aria-controls="individual-fields">
              <span>
                <strong>Физическое лицо</strong>
                <small>Для личной поездки</small>
              </span>
            </label>
            <label class="checkout-form__choice">
              <input type="radio" name="customer-type" value="business" aria-controls="business-fields">
              <span>
                <strong>Юридическое лицо</strong>
                <small>Для компании или организации</small>
              </span>
            </label>
          </div>
        </fieldset>
        <fieldset class="checkout-form__customer-panel" id="individual-fields" data-customer-panel="individual" aria-label="Данные физического лица">
          <legend>Контактные данные</legend>
          <div class="checkout-form__fields">
            <label>
              <span>Имя и фамилия</span>
              <input type="text" name="name" placeholder="Иван Иванов">
            </label>
            <label>
              <span>Телефон</span>
              <input type="tel" name="phone" placeholder="+7 (___) ___-__-__">
            </label>
            <label class="checkout-form__field--full">
              <span>Email</span>
              <input type="email" name="email" placeholder="name@example.com">
            </label>
          </div>
        </fieldset>
        <fieldset class="checkout-form__customer-panel" id="business-fields" data-customer-panel="business" aria-label="Данные юридического лица" hidden>
          <legend>Данные юридического лица</legend>
          <div class="checkout-form__fields">
            <label class="checkout-form__field--full">
              <span>Название компании</span>
              <input type="text" name="company" placeholder="ООО «Компания»">
            </label>
            <label>
              <span>Контактное лицо</span>
              <input type="text" name="company-contact" placeholder="Иван Иванов">
            </label>
            <label>
              <span>Email компании</span>
              <input type="email" name="company-email" placeholder="office@example.com">
            </label>
            <label>
              <span>ИНН</span>
              <input type="text" name="tax-id" placeholder="0000000000">
            </label>
            <label>
              <span>КПП</span>
              <input type="text" name="tax-registration" placeholder="000000000">
            </label>
            <label class="checkout-form__field--full">
              <span>Юридический адрес</span>
              <input type="text" name="legal-address" placeholder="Адрес компании">
            </label>
          </div>
        </fieldset>
        <fieldset class="checkout-form__delivery">
          <legend>Выберите способ доставки</legend>
          <div class="checkout-form__option-grid">
            <label class="checkout-form__option">
              <input type="radio" name="delivery-method" value="email" checked>
              <span class="checkout-form__option-icon checkout-form__option-icon--email">@</span>
              <span class="checkout-form__option-info">
                <strong>Email</strong>
                <small>Электронная доставка<br>на вашу почту</small>
              </span>
              <span class="checkout-form__option-check" aria-hidden="true">✓</span>
            </label>
            <label class="checkout-form__option">
              <input type="radio" name="delivery-method" value="courier">
              <span class="checkout-form__option-icon checkout-form__option-icon--courier">→</span>
              <span class="checkout-form__option-info">
                <strong>Курьерская доставка</strong>
                <small>Доставим заказ<br>курьером по адресу</small>
              </span>
              <span class="checkout-form__option-check" aria-hidden="true">✓</span>
            </label>
            <label class="checkout-form__option">
              <input type="radio" name="delivery-method" value="pickup">
              <span class="checkout-form__option-icon checkout-form__option-icon--pickup">⌂</span>
              <span class="checkout-form__option-info">
                <strong>Самовывоз из офиса</strong>
                <small>Заберите заказ<br>в нашем офисе</small>
              </span>
              <span class="checkout-form__option-check" aria-hidden="true">✓</span>
            </label>
          </div>
        </fieldset>
        <fieldset class="checkout-form__payment">
          <legend>Выберите способ оплаты</legend>
          <div class="checkout-form__option-grid">
            <label class="checkout-form__option">
              <input type="radio" name="payment-method" value="card" checked>
              <span class="checkout-form__option-icon checkout-form__option-icon--card">VISA</span>
              <span class="checkout-form__option-info">
                <strong>Банковская карта</strong>
                <small>Visa, Mastercard, МИР</small>
              </span>
              <span class="checkout-form__option-check" aria-hidden="true">✓</span>
            </label>
            <label class="checkout-form__option">
              <input type="radio" name="payment-method" value="yoomoney">
              <span class="checkout-form__option-icon checkout-form__option-icon--yoomoney">Я</span>
              <span class="checkout-form__option-info">
                <strong>Яндекс Деньги</strong>
                <small>Быстрая оплата<br>через Яндекс</small>
              </span>
              <span class="checkout-form__option-check" aria-hidden="true">✓</span>
            </label>
            <label class="checkout-form__option">
              <input type="radio" name="payment-method" value="sberbank">
              <span class="checkout-form__option-icon checkout-form__option-icon--sberbank">✓</span>
              <span class="checkout-form__option-info">
                <strong>Сбербанк Онлайн</strong>
                <small>Оплата через<br>Сбербанк Онлайн</small>
              </span>
              <span class="checkout-form__option-check" aria-hidden="true">✓</span>
            </label>
            <label class="checkout-form__option">
              <input type="radio" name="payment-method" value="cash">
              <span class="checkout-form__option-icon checkout-form__option-icon--cash">₽</span>
              <span class="checkout-form__option-info">
                <strong>Наличные</strong>
                <small>Оплата наличными<br>при получении</small>
              </span>
              <span class="checkout-form__option-check" aria-hidden="true">✓</span>
            </label>
            <label class="checkout-form__option">
              <input type="radio" name="payment-method" value="crypto">
              <span class="checkout-form__option-icon checkout-form__option-icon--crypto">₿</span>
              <span class="checkout-form__option-info">
                <strong>Криптовалюта</strong>
                <small>Условия оплаты уточняются при бронировании</small>
              </span>
              <span class="checkout-form__option-check" aria-hidden="true">✓</span>
            </label>
            <label class="checkout-form__option">
              <input type="radio" name="payment-method" value="webmoney">
              <span class="checkout-form__option-icon checkout-form__option-icon--webmoney">W</span>
              <span class="checkout-form__option-info">
                <strong>WebMoney</strong>
                <small>Электронный кошелёк<br>WebMoney</small>
              </span>
              <span class="checkout-form__option-check" aria-hidden="true">✓</span>
            </label>
            <label class="checkout-form__option">
              <input type="radio" name="payment-method" value="alfa-click">
              <span class="checkout-form__option-icon checkout-form__option-icon--alfa">A</span>
              <span class="checkout-form__option-info">
                <strong>Альфа-Клик</strong>
                <small>Оплата через<br>Альфа-Клик</small>
              </span>
              <span class="checkout-form__option-check" aria-hidden="true">✓</span>
            </label>
          </div>
        </fieldset>
        <p class="checkout-form__notice">Это демонстрационная форма: оплата и отправка заказа пока не подключены.</p>
        <button class="checkout-form__submit" type="button" disabled>Подтвердить заказ</button>
      </form>
              @endif
    </div>
  </div>
</section>
</main>
@endsection
