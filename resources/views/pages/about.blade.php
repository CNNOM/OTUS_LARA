<section>
    <h1>Контакты</h1>
    <dl>
        <dt>Телефон</dt>
        <dd><a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}">{{ $phone }}</a></dd>

        <dt>Email</dt>
        <dd><a href="mailto:{{ $email }}">{{ $email }}</a></dd>

        <dt>Адрес</dt>
        <dd>{{ $address }}</dd>
    </dl>
</section>
