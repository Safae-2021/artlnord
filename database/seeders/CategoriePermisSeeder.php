<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriePermisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categorie_permis')->insert([
            // 'label' => 'A',
            // 'label' => 'B',
            // 'label' => 'C',          
        ]);
    }
}
