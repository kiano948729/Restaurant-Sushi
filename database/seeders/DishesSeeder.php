<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;


class DishesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
    {
        Dish::insert([
            ['name' => 'California Roll', 'category' => 'Maki', 'description' => 'Rijst, avocado, krab', 'price' => 6.50, 'image' => 'california_roll.jpg'],
            ['name' => 'Salmon Nigiri', 'category' => 'Nigiri', 'description' => 'Verse zalm op rijst', 'price' => 2.50, 'image' => 'salmon_nigiri.jpg'],
            ['name' => 'Tuna Sashimi', 'category' => 'Sashimi', 'description' => 'Verse tonijn', 'price' => 8.00, 'image' => 'tuna_sashimi.jpg'],
            ['name' => 'Green Tea', 'category' => 'Dranken', 'description' => 'Warme groene thee', 'price' => 2.00, 'image' => 'green_tea.jpg'],
        ]);
    }
}
