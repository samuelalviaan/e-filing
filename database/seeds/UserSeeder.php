<?php

namespace Database\Seeders;

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
        [
            'name' => 'Pak Budi',
            'jabatan' => 'Lurah',
            'alamat' => 'Jalan Cibaduyut',
            'no_telp' => '+628122122122',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'superadmin',
            'created_at' => \Carbon\Carbon::now(),
        ],
        // [
        //     'name' => 'Pak Budi',
        //     'jabatan' => 'Lurah',
        //     'alamat' => 'Jalan Cibaduyut',
        //     'no_telp' => '+628122122122',
        //     'email' => 'lurah@gmail.com',
        //     'password' => Hash::make('lurah123'),
        //     'role' => 'user',
        //     'created_at' => \Carbon\Carbon::now(),
        // ],

    ]);
    }

}
