@extends('index')

@section('title', 'Контакты')

@section('main')
      <main class="layout__content">
        <section class="page-shell info-page">
          <div class="page-shell__inner">
            <div class="info-page__intro">
              <p class="info-page__eyebrow">На связи · демонстрационная страница</p>
              <h1 class="ui-title">Обсудим ваше путешествие</h1>
              <p class="page-shell__text">Ниже — пример оформления контактов. Телефоны, почта и три адреса в Москве вымышлены для макета: настоящих офисов по этим адресам нет.</p>
            </div>
            <div class="info-page__grid info-page__grid--wide">
              <article>
                <h2>Телефоны</h2>
                <p>Для примера: звонок по номеру открывает приложение телефона.</p>
                <div class="contacts-page__list">
                  <div>
                    <span>Вопросы о турах</span>
                    <a href="tel:+12025550142">+1 (202) 555-0142</a>
                  </div>
                  <div>
                    <span>Групповые поездки</span>
                    <a href="tel:+12025550173">+1 (202) 555-0173</a>
                  </div>
                </div>
              </article>
              <article>
                <h2>Электронная почта</h2>
                <p>Ссылки откроют почтовое приложение, но адреса демонстрационные.</p>
                <div class="contacts-page__list">
                  <div>
                    <span>Общие вопросы</span>
                    <a href="mailto:hello@example.com">hello@example.com</a>
                  </div>
                  <div>
                    <span>Вопросы о бронировании</span>
                    <a href="mailto:booking@example.com">booking@example.com</a>
                  </div>
                </div>
              </article>
              <article>
                <h2>Выберите свой маршрут</h2>
                <p>Посмотрите направления и подробности примерного тура.</p>
                <a class="ui-button ui-button--primary" href="/tours">Смотреть туры</a>
                <a class="ui-button ui-button--ghost" href="/tours">Выбрать тур</a>
              </article>
            </div>
            <div class="contacts-page__offices">
              <div class="contacts-page__offices-heading">
                <p class="info-page__eyebrow">На карте города</p>
                <h2>Наши офисы в Москве</h2>
                <p>Демонстрационные адреса: карта стилизована и не служит схемой проезда.</p>
              </div>
              <div class="contacts-page__offices-layout">
                <figure class="contacts-page__map">
                  <img src="/images/moscow-offices.svg" alt="Схематичная карта Москвы с тремя демонстрационными офисами: Арбат, Тверская и Пятницкая" width="1200" height="560" loading="lazy">
                  <figcaption>Иллюстрация · расположение точек условное</figcaption>
                </figure>
                <ol class="contacts-page__office-list">
                  <li>
                    <span>01 · Арбат</span>
                    <strong>ул. Арбат, 12</strong>
                    <p>Москва · пример адреса</p>
                  </li>
                  <li>
                    <span>02 · Тверская</span>
                    <strong>Тверская ул., 7</strong>
                    <p>Москва · пример адреса</p>
                  </li>
                  <li>
                    <span>03 · Замоскворечье</span>
                    <strong>Пятницкая ул., 25</strong>
                    <p>Москва · пример адреса</p>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </section>
      </main>
@endsection
