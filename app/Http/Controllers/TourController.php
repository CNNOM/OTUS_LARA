<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\View\View;

class TourController extends Controller
{
    public function index(): View
    {
        $tours = Tour::where('is_active', true)
            ->orderBy('id')
            ->get();

        return view('pages.tours', [
            'tours' => $tours,
        ]);
    }
}
