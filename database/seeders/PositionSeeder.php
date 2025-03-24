<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('positions')->insert([
            ['name' => 'Staff', 'level' => 1],
            ['name' => 'Supervisor', 'level' => 2],
            ['name' => 'Manager', 'level' => 3],
            ['name' => 'Director', 'level' => 4],
        ]);
    }
}
