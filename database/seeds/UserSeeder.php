<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'address' => 'Jl Pelita IV Gang Aman No 7',
            'birth' => '1998-10-21',
            'membership' => 'VVIP',
            'creditCard' => '000000000000',
            'password' => '$2y$12$oQ63NRQaAV.L/ugDTealLeXXZR8d8ZM1R21h2/0fMo2zhqcNm72Yy', // admin
        ]);
    }
}
