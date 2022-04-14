<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\UserRole;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert(
            [
                'name' => 'Test Super User',
                'email' => 'test@gmail.com',
                'user_type' => 'Sora',
                'status' => 1,
                'user_linked_id' => 0,
                'password' => Hash::make('password'),
                'role_id' => UserRole::select('role_id')->where('role', 'System Admin')->get()[0]->role_id
            ],
        );
    }
}