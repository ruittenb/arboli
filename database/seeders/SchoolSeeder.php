<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::factory()->create([ 'description' => 'nabije vaderskant' ]);
        School::factory()->create([ 'description' => 'nabije moederskant' ]);
        School::factory()->create([ 'description' => 'verre vaderskant' ]);
        School::factory()->create([ 'description' => 'verre moederskant' ]);
        School::factory()->create([ 'description' => 'Koninklijk Huis' ]);
    }
}
