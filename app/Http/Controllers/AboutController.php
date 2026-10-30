<?php

namespace App\Http\Controllers;


class AboutController
{
    public function index()
    {
        return view('pages.about', [
            'phone' => config('contacts.phone'),
            'email' => config('contacts.email'),
            'address' => config('contacts.address'),
        ]);
    }
}
