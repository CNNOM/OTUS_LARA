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
            Tour::firstOrCreate(['title' => $tour['title']], $tour);
        }
    }
}
