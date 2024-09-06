<?php

namespace Database\Seeders;

use App\Models\Folder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $folders = [
            'Preliminary Review',
            'Design Review',
        ];

        // Insert folders using Eloquent and Collections
        collect($folders)
            ->each(fn($folder) => Folder::updateOrCreate(
                ['name' => $folder],
                ['name' => $folder]
            ));
    }
}
