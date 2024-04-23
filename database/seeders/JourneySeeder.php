<?php

namespace Database\Seeders;

use App\Models\Journey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JourneySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $urbano = [1,2,3,4,5];
    protected $rural =  [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
    public function run(): void
    {
        foreach ($this->urbano as $value) {
            Journey::create([
                'name' => $value,
                'type' => 'Urbano'
            ]);
        }

        foreach ($this->rural as $value) {
            Journey::create([
                'name' => $value,
                'type' => 'Rural'
            ]);
        }

    }
}
