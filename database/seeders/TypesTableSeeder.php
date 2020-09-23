<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            [
                'id'   => 1,
                'name' => 'Default'
            ],
            [
                'id'   => 2,
                'name' => 'առանց ֆոնի'
            ],
            [
                'id'   => 3,
                'name' => 'ցուցակ'
            ],
            [
                'id'   => 4,
                'name' => 'ֆոնով'
            ],
            [
                'id'   => 5,
                'name' => 'ֆայլի դիտում'
            ],
        ]);
    }
}
