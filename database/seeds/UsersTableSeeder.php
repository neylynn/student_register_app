<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            array(
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin1234'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            )
        ]);
        DB::table('users')->insert([
            array(
                'name' => 'principal',
                'email' => 'principal@gmail.com',
                'password' => Hash::make('principal1234'),
                'role' => 'principal',
                'created_at' => now(),
                'updated_at' => now()
            )
        ]);
    }
}
