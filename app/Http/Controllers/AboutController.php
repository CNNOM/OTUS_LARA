<?php

namespace App\Http\Controllers;

use App\Support\AboutContactDetails;

class AboutController
{
    public function index(AboutContactDetails $contactDetails)
    {
        return view('pages.about', $contactDetails->viewData());
    }
}
