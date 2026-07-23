@extends('index')

@section('title', 'Авторизация')

@section('main')
    <main class="layout__content">
        <section class="registration-hero">
            <div class="registration-hero__container container">
                <div class="registration-hero__content">
                    <p class="registration-hero__eyebrow">Регистрация поездки</p>
                    <h1>Забронируй следующее путешествие через простой и спокойный booking flow.</h1>
                    <p>Оставь контакты, предпочтительное направление и желаемые даты. Мы поможем подобрать маршрут, формат
                        отдыха и удобный темп поездки.</p>
                </div>
                <div class="registration-hero__card">
                    <img src="/images/register-retreat.png" alt="Lakeside glamping retreat">
                </div>
            </div>
        </section>
        <section class="registration-form-section">
            <div class="registration-form-section__container container">
                <div class="registration-form-section__intro">
                    <p class="registration-form-section__eyebrow">Форма регистрации</p>
                    <h2>Расскажи, куда хочешь поехать и какой формат отдыха тебе ближе.</h2>
                    <p>Сейчас это статичная front-end форма. Позже её можно подключить к Laravel, валидации, CRM или booking
                        backend.</p>
                </div>
                <form class="registration-form">
                    <label class="registration-form__field">
                        <span>Имя</span>
                        <input type="text" name="name" placeholder="Ваше имя">
                    </label>
                    <label class="registration-form__field">
                        <span>Email</span>
                        <input type="email" name="email" placeholder="mail@example.com">
                    </label>
                    <label class="registration-form__field">
                        <span>Направление</span>
                        <input type="text" name="destination" placeholder="Горы, побережье, озёра">
                    </label>
                    <label class="registration-form__field">
                        <span>Даты поездки</span>
                        <input type="text" name="dates" placeholder="Желаемый месяц или даты">
                    </label>
                    <label class="registration-form__field registration-form__field--full">
                        <span>Комментарий</span>
                        <textarea name="message" rows="5"
                            placeholder="Расскажите о бюджете, темпе поездки, составе путешественников и ожиданиях">
                </textarea>
                    </label>
                    <button class="registration-form__submit" type="submit">Отправить заявку</button>
                </form>
            </div>
        </section>
    </main>
@endsection
