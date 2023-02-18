<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\ManagerUser\{Role, Permission};
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRole = Role::create(['name' => 'user', 'active' => 1]);
        $userAdmin = Role::create(['name' => 'admin', 'active' => 1]);

        User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'role_id' => $userRole->id,
            'active' => 1,
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'role_id' => $userAdmin->id,
            'active' => 1,
        ]);
    }
}
