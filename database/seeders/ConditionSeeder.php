<?php

namespace Database\Seeders;

use App\Models\Condition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
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
                'name' => 'Bagus',
            ],
            [
                'name' => 'Rusak Ringan',
            ],
            [
                'name' => 'Rusak Berat',
            ],
        ])->each(function ($conditions) {
            Condition::create($conditions);
        });
    }
}
