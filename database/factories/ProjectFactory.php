<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\ProjectType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;

    private static $usedIds = [];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'unique_id' => $this->generateUniqueNumber(), // Short unique number
            'name' => $this->faker->word, // Name of the project
            'project_status_id' => ProjectStatus::inRandomOrder()->first()->id, // Randomly selected status
            'project_type_id' => ProjectType::inRandomOrder()->first()->id, // Randomly selected type
            'country_id' => Country::inRandomOrder()->first()->id, // Randomly selected country
            'is_visible' => $this->faker->boolean, // Random boolean value
            'created_at' => $this->faker->dateTimeThisDecade, // Random date and time in the last decade
            'updated_at' => $this->faker->dateTimeThisDecade, // Random date and time in the last decade
        ];
    }

    /**
     * Generate a unique short number.
     *
     * @return int
     */
    private function generateUniqueNumber(): int
    {
        do {
            $number = rand(10000, 99999); // Generate a random number between 10000 and 99999
        } while (in_array($number, self::$usedIds));

        self::$usedIds[] = $number; // Store the number to avoid duplicates

        return $number;
    }
}
