<?php

namespace Database\Seeders;

use App\Models\Keterangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeteranganSeeder extends Seeder
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
                'name' => 'Intrakompatibel',
            ],
            [
                'name' => 'Ekstrakompatibel',
            ],
        ])->each(function ($ket) {
            Keterangan::create($ket);
        });
    }
}
