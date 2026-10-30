<?php

namespace App\Support;

class ContactDetails
{
    public function toArray(): array
    {
        $phone = config('contacts.phone');

        return [
            'phone' => $phone,
            'phoneHref' => preg_replace('/[^\d+]/', '', $phone),
            'email' => config('contacts.email'),
            'address' => config('contacts.address'),
        ];
    }
}
