<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
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
                'name' => 'Ruang Pengelola',
            ],
            [
                'name' => 'Ruang Akademik',
            ],
            [
                'name' => 'Ruang Dosen',
            ],
        ])->each(function ($rooms) {
            Room::create($rooms);
        });
    }
}
