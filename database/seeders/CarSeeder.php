<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use Carbon\Carbon;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        Car::insert([
            [
                'name' => 'Toyota Corolla',
                'make' => 'Toyota',
                'model' => 'Corolla',
                'year' => 2019,
                'status' => '1',
                'description' => 'Reliable and fuel-efficient sedan.',
                'image' => 'cars/toyota_corolla.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Honda Civic',
                'make' => 'Honda',
                'model' => 'Civic',
                'year' => 2020,
                'status' => '1',
                'description' => 'Sporty compact car with modern design.',
                'image' => 'cars/honda_civic.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Ford Mustang',
                'make' => 'Ford',
                'model' => 'Mustang',
                'year' => 2021,
                'status' => '1',
                'description' => 'Iconic American muscle car.',
                'image' => 'cars/ford_mustang.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
