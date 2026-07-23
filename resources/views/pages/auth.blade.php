@extends('index')

@section('title', 'Авторизация')

@section('main')
    <main class="travel-content">
        <section class="hero hero--compact hero--auth">
            <div class="hero__content">
                <p class="hero__eyebrow">Member access</p>
                <h1 class="hero__headline hero__headline--compact">
                    <span class="hero__headline-back">LOGIN</span>
                    <span class="hero__headline-front">LOGIN</span>
                </h1>
                <p class="hero__copy">
                    Вход в кабинет путешественника, где живут бронирования, избранные туры
                    и персональные предложения.
                </p>
            </div>

            <div class="hero__image-wrap hero__image-wrap--soft">
                <img class="hero__image"
                    src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=1600&q=80"
                    alt="Путешественница с картой в руках">
            </div>
        </section>

        <section class="auth-layout">
            <article class="auth-panel auth-panel--form">
                <p class="section-label">Добро пожаловать</p>
                <h2>Войдите, чтобы продолжить планировать поездку</h2>

                <form class="auth-form">
                    <label>
                        <span>Email</span>
                        <input type="email" name="email" placeholder="hello@nomadnest.ru">
                    </label>

                    <label>
                        <span>Пароль</span>
                        <input type="password" name="password" placeholder="Введите пароль">
                    </label>

                    <div class="auth-form__row">
                        <label class="checkline">
                            <input type="checkbox" name="remember">
                            <span>Запомнить меня</span>
                        </label>

                        <a href="/">Забыли пароль?</a>
                    </div>

                    <button class="button button--dark auth-form__submit" type="submit">Войти в кабинет</button>
                </form>
            </article>

            <aside class="auth-panel auth-panel--side">
                <div class="auth-note">
                    <p class="section-label">После входа</p>
                    <h3>Все детали путешествия в одном месте</h3>
                    <p>История поездок, статусы оплат, билеты и быстрый повтор бронирования.</p>
                </div>

                <div class="stats stats--stacked">
                    <article>
                        <strong>148</strong>
                        <span>активных подборок</span>
                    </article>
                    <article>
                        <strong>24/7</strong>
                        <span>чат с менеджером</span>
                    </article>
                    <article>
                        <strong>1 click</strong>
                        <span>повтор прошлой поездки</span>
                    </article>
                </div>
            </aside>
        </section>
    </main>
@endsection
