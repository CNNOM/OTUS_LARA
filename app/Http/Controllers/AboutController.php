<?php

namespace App\Http\Controllers;

use App\Support\ContactInformation;

class AboutController
{
    public function index(ContactInformation $contacts)
    {
        return view('pages.about', $contacts->forAboutPage());
    }
}
