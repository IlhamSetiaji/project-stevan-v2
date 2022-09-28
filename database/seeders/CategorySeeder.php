<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'Meja',
            ],
            [
                'name' => 'Kursi',
            ],
            [
                'name' => 'Almari',
            ],
            [
                'name' => 'Kabinet',
            ],
            [
                'name' => 'AC',
            ],
            [
                'name' => 'Dispenser',
            ],
            [
                'name' => 'Komputer',
            ],
            [
                'name' => 'Printer',
            ],
            [
                'name' => 'Scanner',
            ],
            [
                'name' => 'CCTV',
            ],
            [
                'name' => 'Telepon',
            ],
        ])->each(function ($categories) {
            Category::create($categories);
        });
    }
}
