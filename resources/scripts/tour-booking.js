const form = document.querySelector('#tour-options');

if (form) {
    const price = Number(form.dataset.basePrice);
    const duration = Number(form.dataset.duration);
    const money = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' });
    const count = (name) => Number(form.elements[name].value) || 0;
    const update = () => {
        const guests = count('adults') + count('under5') + count('children');
        const hotelRate = Number(form.querySelector('input[name="hotel"]:checked')?.dataset.rate || 0);
        const total = price * (count('adults') + count('under5') * 0.25 + count('children') * 0.7)
            + guests * hotelRate * duration;
        document.querySelector('[data-tour-total]').textContent = money.format(total);

        const date = form.elements.start.value;
        const output = form.querySelector('[data-tour-dates]');
        if (date) {
            const end = new Date(`${date}T00:00:00Z`);
            end.setUTCDate(end.getUTCDate() + duration - 1);
            output.textContent = `До ${end.toLocaleDateString('ru-RU', { timeZone: 'UTC' })}`;
        } else {
            output.textContent = 'Выберите дату начала тура';
        }
    };

    form.querySelectorAll('[data-count-change]').forEach((button) => {
        button.addEventListener('click', () => {
            const input = button.parentElement.querySelector('input');
            input.value = Math.min(Number(input.max), Math.max(Number(input.min), Number(input.value || 0) + Number(button.dataset.countChange)));
            update();
        });
    });
    const hotels = [...form.querySelectorAll('[data-tour-hotel]')];
    const track = form.querySelector('[data-hotel-track]');
    const chooseHotel = (direction) => {
        const current = hotels.findIndex((hotel) => hotel.checked);
        const next = hotels[(current + direction + hotels.length) % hotels.length];
        next.checked = true;
        track.scrollBy({ left: next.closest('label').getBoundingClientRect().left - track.getBoundingClientRect().left, behavior: 'smooth' });
        update();
    };
    if (hotels.length) {
        form.querySelector('[data-hotel-prev]').addEventListener('click', () => chooseHotel(-1));
        form.querySelector('[data-hotel-next]').addEventListener('click', () => chooseHotel(1));
    }
    form.addEventListener('input', update);
    form.addEventListener('change', update);
    update();
}
