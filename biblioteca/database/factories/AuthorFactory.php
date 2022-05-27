<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AuthorFactory extends Factory 
{

    protected $model = Author::class;
    
    public function definition( )
    {
        return [
            'name' => $this->faker->name(),
            'birthdate' => $this->faker->date(),
            'description' => $this->faker->realText(200)
        ];
    }
}
