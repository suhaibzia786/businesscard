<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->delete();
        DB::table('user_roles')->insert([
            [
                'role' => 'Super User'
            ],
            [
                'role' => 'System Admin'
            ],
            [
                'role' => 'General User'
            ]
        ]
        );
    }
}