<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stack;

class StackSeeder extends Seeder
{
    public function run()
    {
        Stack::create(['name' => 'PHP', 'icon_path' => 'icons/php.png']);
        Stack::create(['name' => 'Laravel', 'icon_path' => 'icons/laravel.png']);
        Stack::create(['name' => 'JavaScript', 'icon_path' => 'icons/javascript.png']);
        // Ajoute plus de stacks si nécessaire
    }
}
