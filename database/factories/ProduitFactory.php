<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             //random = intervalle de valeur aléatoire
             'categorie_id'=> mt_rand(1 , 10) ,
             'user_id'=> 1 ,
             'name' => fake()->name(),
             'description' => fake()->text(),
             'price' => mt_rand(1 , 1000),
 
            //
        ];
    }
}
