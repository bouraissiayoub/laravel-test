<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Property;


class PropertySeeder extends Seeder
{
    public function run(): void
    {
        Property::factory()->count(12)->create();
    }
}

