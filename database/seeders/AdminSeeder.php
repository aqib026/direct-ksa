<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        $user = new admin;
        $user->name     = 'shari';
        $user->email    = 'sharisaleem0@gmail.com';
        $user->password = bcrypt('Shari143');
        
        $user->usertype = 'admin';
        $user->save();

    }
}
