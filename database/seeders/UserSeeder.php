<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
           'name' => 'Super Admin',
            'email' => 'rokon07@hotmail.com',
            'password' => Hash::make('rokon123'),
            'is_superuser' => '1',
            ]);
    }
}
