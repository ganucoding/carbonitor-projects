<?php

namespace Database\Seeders;

use App\Models\RetirementStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RetirementStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'Active',
            'Retired',
            'Pending',
        ];

        // Insert statuses using Eloquent and Collections
        collect($statuses)
            ->each(fn($status) => RetirementStatus::updateOrCreate(
                ['name' => $status],
                ['name' => $status]
            ));
    }
}
