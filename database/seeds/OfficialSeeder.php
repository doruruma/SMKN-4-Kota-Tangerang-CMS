<?php

use App\Official;
use Illuminate\Database\Seeder;

class OfficialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $o = new Official;
        $o->name = 'kepsek';
        $o->position_id = 1;
        $o->image = '';
        $o->save();
    }
}
