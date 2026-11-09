document.querySelectorAll('[data-quantity-control]').forEach((control) => {
    const input = control.querySelector('input[type="number"]');
    control.querySelector('[data-quantity-decrease]').addEventListener('click', () => {
        input.value = Math.max(Number(input.min) || 1, Number(input.value || 1) - 1);
    });
    control.querySelector('[data-quantity-increase]').addEventListener('click', () => {
        input.value = Number(input.value || 0) + 1;
    });
});

const checkout = document.querySelector('[data-checkout-form]');
if (checkout) {
    const panels = checkout.querySelectorAll('[data-customer-panel]');
    const toggle = () => {
        const type = checkout.querySelector('input[name="customer-type"]:checked').value;
        panels.forEach((panel) => {
            panel.hidden = panel.dataset.customerPanel !== type;
            panel.disabled = panel.hidden;
        });
    };
    checkout.querySelectorAll('input[name="customer-type"]').forEach((radio) => radio.addEventListener('change', toggle));
    toggle();
}

const gallery = document.querySelector('[data-tour-gallery]');
document.querySelector('[data-gallery-prev]')?.addEventListener('click', () => gallery.scrollBy({ left: -gallery.clientWidth, behavior: 'smooth' }));
document.querySelector('[data-gallery-next]')?.addEventListener('click', () => gallery.scrollBy({ left: gallery.clientWidth, behavior: 'smooth' }));
