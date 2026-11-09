@extends('index')

@section('title', 'Корзина и оформление заказа')

@section('main')
      <main class="layout__content">
        <section class="cart-page">
          <div class="cart-page__container container">
            <div class="cart-page__heading">
              <p class="cart-page__eyebrow">Ваш заказ</p>
              <h1 class="ui-title">Корзина и оформление</h1>
              <p class="cart-page__intro">Это демонстрационный макет: оформление заказа пока не подключено.</p>
            </div>
            <div class="cart-page__layout">
              <div class="cart-page__cart">
                <div class="cart-page__section-heading">
                  <h2>Корзина</h2>
                  <span>1 товар</span>
                </div>
                <article class="cart-item">
                  <img src="/images/hero-discover.png" alt="Закатный круиз по Whitsunday Beach">
                  <div class="cart-item__content">
                    <span class="cart-item__label">Coastal Escape</span>
                    <h3>Закатный круиз по Whitsunday Beach</h3>
                    <p>Australia · 5 дней</p>
                    <strong>$1,280</strong>
                  </div>
                  <label class="cart-item__quantity">
                    <span>Количество</span>
                    <span class="cart-item__quantity-control" data-quantity-control>
                      <button type="button" data-quantity-decrease aria-label="Уменьшить количество">−</button>
                      <input type="number" name="quantity" min="1" value="1" aria-label="Количество товара">
                      <button type="button" data-quantity-increase aria-label="Увеличить количество">+</button>
                    </span>
                  </label>
                </article>
                <div class="cart-page__summary">
                  <span>Итого</span>
                  <strong>$1,280</strong>
                </div>
              </div>
              <form class="checkout-form" data-checkout-form>
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
                <button class="checkout-form__submit" type="button" disabled>Подтвердить заказ</button>
              </form>
            </div>
          </div>
        </section>
      </main>
@endsection
