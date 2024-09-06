<?php

namespace Database\Seeders;

use App\Enums\ProjectStatus as ProjectStatusEnum;
use App\Models\ProjectStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'Planned',
            'Listed',
            'Ongoing',
            'Certified',
            'Estimated',
            'Under Validation',
            'Under Development',
            'Verification Approval Requested',
            'Registered',
            'Late to Verify',
            'Inactive',
            'Rejected by Administrator',
            'Registration Requested',
            'Withdrawn',
            'Units Transferred from Approved GHG Program',
            'Completed',
        ];

        // Insert statuses using Eloquent and Collections
        collect($statuses)
            ->each(fn($status) => ProjectStatus::updateOrCreate(
                ['name' => $status],
                ['name' => $status]
            ));
    }
}
