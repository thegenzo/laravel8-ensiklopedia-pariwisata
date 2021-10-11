<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Administrator';
        $user->level = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = 'admin123';
        $user->save();

        $admin = new Admin();
        $admin->id_user = $user->id;
        $admin->nip = '12381290389210';
        $admin->alamat = 'Gunung Nona';
        $admin->no_hp = '082345671234';
        $admin->save();
    }
}
