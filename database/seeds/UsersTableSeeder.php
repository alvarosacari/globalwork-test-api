<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::truncate();

        $admin = Role::findByName('admin');

        \DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $userAdmin = [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => \Hash::make('!admin2019#'),
        ];

        $user = User::create($userAdmin);
        $user->assignRole($admin);

        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
