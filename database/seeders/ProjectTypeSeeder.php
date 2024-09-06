<?php

namespace Database\Seeders;

use App\Models\ProjectType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Energy Efficiency Domestic',
            'Energy Efficiency Commercial Sector',
            'Biogas Electricity',
            'Biomass, or Liquid Biofuel',
            'Geo Thermal',
            'Solar Thermal',
            'Wind',
            'Biogas',
            'Energy Efficiency',
            'Small, Low - Impact Hydro',
            'Waste Handling and Disposal',
            'Agriculture Forestry and Other Land Use',
            'Energy Industries',
            'Energy Demand',
            'Fugitive Emissions from Fuels',
            'Metal Production',
            'Other',
        ];

        // Insert project types using Eloquent and Collections
        collect($types)
            ->each(fn($type) => ProjectType::updateOrCreate(
                ['name' => $type],
                ['name' => $type]
            ));
    }
}
