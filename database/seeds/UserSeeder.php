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
        DB::table('users')->insert([[
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('$adminPizza'),
            'address' => 'officeAdmin',
            'phoneNumber' => '11111111',
            'gender' => 'Admin',
            'role' => 'Admin',
        ], [
            'username' => 'Member',
            'email' => 'member@member.com',
            'password' => Hash::make('$memberPizza'),
            'address' => 'officeMember',
            'phoneNumber' => '2222222',
            'gender' => 'Member',
            'role' => 'Member',
        ], [
            'username' => 'Member2',
            'email' => 'member2@member.com',
            'password' => Hash::make('$member2Pizza'),
            'address' => 'office2Member',
            'phoneNumber' => '3333333333',
            'gender' => 'Member',
            'role' => 'Member',
        ]]);
    }
}
