<?php

namespace App\Support;

class AboutContactDetails
{
    public function viewData(): array
    {
        $phone = config('contacts.phone');

        return [
            'phone' => $phone,
            'phoneHref' => (str_starts_with(trim($phone), '+') ? '+' : '') . preg_replace('/[^0-9]/', '', $phone),
            'email' => config('contacts.email'),
            'address' => config('contacts.address'),
        ];
    }
}
