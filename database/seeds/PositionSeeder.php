<?php

use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pos = new Position;
        $pos->position = "Kepala Sekolah";
        $pos->save();

        $pos = new Position;
        $pos->position = "Wakil Kepala Sekolah";
        $pos->save();

        $pos = new Position;
        $pos->position = "Kepala Jurusan";
        $pos->save();

        $pos = new Position;
        $pos->position = "Staff";
        $pos->save();
    }
}
