<?php

use App\User;
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
        User::create([
            'roles'=>'1',
            'name'=>'Super Admin',
            'email'=>'official@gmail.com',
            'password'=>bcrypt('futsallkuy123'),
            'alamat'=>'Jalan Panglima Polim Perumda Blok N-1 Kab. Bojonegoro',
            'telp'=>'085334667569',
        ]);

        User::create([
            'roles'=>'2',
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin123'),
            'alamat'=>'Jalan Panglima Polim Perumda Blok N-1 Kab. Bojonegoro',
            'telp'=>'085334667569',
        ]);
    }
}
