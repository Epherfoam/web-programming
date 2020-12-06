<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'id' => 0,
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('$adminPizza'),
            'address' => 'officeAdmin',
            'phoneNumber' => 'numberAdmin',
            'gender' => 'dough',
            'role' => 'Admin',
        ]);
    }
}
