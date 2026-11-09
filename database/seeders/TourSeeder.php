<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class TourSeeder extends Seeder
{
    public function run(): void
    {
        $tours = json_decode(file_get_contents(database_path('seeders/data/tours.json')), true, flags: JSON_THROW_ON_ERROR);

        foreach ($tours as $tour) {
            if (! Storage::disk('public')->exists($tour['image'])) {
                Storage::disk('public')->put($tour['image'], file_get_contents(public_path('images/'.basename($tour['image']))));
            }
            $record = Tour::firstOrCreate(['title' => $tour['title']], $tour);
            $record->update(array_filter([
                'details' => $record->details === null ? $tour['details'] : null,
                'program' => $record->program === null ? $tour['program'] : null,
                'hotels' => $record->hotels === null ? $tour['hotels'] : null,
                'itinerary' => $record->itinerary === null ? $tour['itinerary'] : null,
            ], fn ($value) => $value !== null));
        }
    }
}
