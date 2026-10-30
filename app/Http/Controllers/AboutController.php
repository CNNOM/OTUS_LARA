<?php

namespace App\Http\Controllers;

use App\Support\ContactDetails;

class AboutController
{
    public function index(ContactDetails $contactDetails)
    {
        return view('pages.about', $contactDetails->toArray());
    }
}
