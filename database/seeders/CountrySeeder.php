<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            'Malaysia',
            'Indonesia',
        ];

        // Insert countries using Eloquent and Collections
        collect($countries)
            ->each(fn($country) => Country::updateOrCreate(
                ['name' => $country],
                ['name' => $country]
            ));
    }
}
