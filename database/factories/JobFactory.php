<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->text(1000),
            'company' => $this->faker->text(20),
            'company_url' => $this->faker->url(),
            'location' => $this->faker->text(20),
            'how_to_apply' => $this->faker->url(),
            'company_email' => $this->faker->email(),
            'company_phone' => $this->faker->phoneNumber(),
            'status' => $this->faker->randomElement([1, 2]),
            'salary' => $this->faker->randomNumber(2, 6),
            'type' => $this->faker->text(10),
            'benefices' => $this->faker->text(200),
            'requisites' => $this->faker->text(200),
            'responsabilities' => $this->faker->text(200),
            'requirements' => $this->faker->text(200),
            'about' => $this->faker->text(300),
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
