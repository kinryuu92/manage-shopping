<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class createPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name'=>'Categories','display_name'=> 'Categories'],
            ['name'=>'List','display_name'=> 'List', 'parent_id'=>1],
            ['name'=>'Add','display_name'=> 'Add', 'parent_id'=>1],
            ['name'=>'Edit','display_name'=> 'Edit', 'parent_id'=>1],
            ['name'=>'Delete','display_name'=> 'Delete', 'parent_id'=>1]
        ]);
    }
}
