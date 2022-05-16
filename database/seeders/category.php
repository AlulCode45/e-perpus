<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeder untuk kategori
        DB::table('category')->insert([
            'category_name' => 'Kategori 1', 'category_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum vel earum dolores nisi sint enim explicabo exercitationem assumenda, possimus mollitia voluptate vitae, aliquam corporis magni delectus dolore repellendus tempora repellat.'
        ]);
        DB::table('category')->insert([
            'category_name' => 'Kategori 2', 'category_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum vel earum dolores nisi sint enim explicabo exercitationem assumenda, possimus mollitia voluptate vitae, aliquam corporis magni delectus dolore repellendus tempora repellat.'
        ]);
        DB::table('category')->insert([
            'category_name' => 'Kategori 3', 'category_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum vel earum dolores nisi sint enim explicabo exercitationem assumenda, possimus mollitia voluptate vitae, aliquam corporis magni delectus dolore repellendus tempora repellat.'
        ]);
    }
}
