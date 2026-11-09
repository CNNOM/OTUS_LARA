<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class TourController extends Controller
{
    public function home(): View
    {
        return view('pages.main', [
            'tours' => Tour::where('is_active', true)->orderBy('id')->limit(4)->get(),
        ]);
    }

    public function index(): View
    {
        $tours = Tour::where('is_active', true)
            ->orderBy('id')
            ->get();

        return view('pages.tours', [
            'tours' => $tours,
        ]);
    }

    public function show(Tour $tour): View
    {
        abort_unless($tour->is_active, 404);

        return view('pages.tour-detail', ['tour' => $tour]);
    }

    public function cart(Request $request): View
    {
        if (! $request->filled('tour')) {
            return view('pages.cart', ['tour' => null]);
        }

        $selection = $request->validate([
            'tour' => 'required|integer',
            'adults' => 'nullable|integer|min:1|max:99',
            'under5' => 'nullable|integer|min:0|max:99',
            'children' => 'nullable|integer|min:0|max:99',
            'start' => 'nullable|date_format:Y-m-d|after_or_equal:today',
        ]);
        $tour = Tour::where('is_active', true)->findOrFail($selection['tour']);
        $request->validate(['hotel' => ['required', Rule::in(array_column($tour->hotels ?? [], 'id'))]]);
        $adults = (int) ($selection['adults'] ?? 1);
        $under5 = (int) ($selection['under5'] ?? 0);
        $children = (int) ($selection['children'] ?? 0);
        $hotel = collect($tour->hotels)->firstWhere('id', $request->input('hotel'));
        $hotelRate = (float) $hotel['extra_per_day'];
        $total = (float) $tour->price * ($adults + $under5 * 0.25 + $children * 0.7)
            + ($adults + $under5 + $children) * $hotelRate * $tour->duration_days;

        return view('pages.cart', compact('tour', 'adults', 'under5', 'children', 'hotel', 'total', 'selection'));
    }
}
