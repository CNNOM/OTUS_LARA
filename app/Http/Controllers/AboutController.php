<?php

namespace App\Http\Controllers;

use App\Support\ContactDetails;

class AboutController
{
    public function index(ContactDetails $contacts)
    {
        return view('pages.about', $contacts->toArray());
    }
}
