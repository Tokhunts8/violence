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
            [
                'id'   => 6,
                'name' => 'գլխավոր էջ'
            ],
            [
                'id'   => 7,
                'name' => 'տեսահոլովակ'
            ],
            [
                'id'   => 8,
                'name' => 'նկարը աջ կողմում'
            ],
            [
                'id'   => 9,
                'name' => 'դիագրամ'
            ],
            [
                'id'   => 10,
                'name' => 'դիագրամ 2'
            ],
            [
                'id'   => 11,
                'name' => 'բաժանված'
            ],
            [
                'id'   => 12,
                'name' => 'նկարներ'
            ],
            [
                'id'   => 13,
                'name' => 'առանց ֆոնի ցուցակ'
            ],
        ]);
    }
}
