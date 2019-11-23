<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Role::truncate();

        $roles = [
            [
                'name' => 'admin',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'editor',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Role::insert($roles);

        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
