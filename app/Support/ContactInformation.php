<?php

namespace App\Support;

class ContactInformation
{
    public function forAboutPage(): array
    {
        $phone = config('contacts.phone');
        $phoneDigits = preg_replace('/[^0-9]/', '', $phone);

        return [
            'phone' => $phone,
            'phoneHref' => (str_starts_with(trim($phone), '+') ? '+' : '') . $phoneDigits,
            'email' => config('contacts.email'),
            'address' => config('contacts.address'),
        ];
    }
}
