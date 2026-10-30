<?php

namespace App\Support;

class ContactDetails
{
    public function toArray(): array
    {
        return [
            'phone' => config('contacts.phone'),
            'email' => config('contacts.email'),
            'address' => config('contacts.address'),
        ];
    }
}
