<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@travelasido.com',
            'password' => bcrypt('rahasia'),
            'status' => true
        ]);

        $user->assignRole('admin');
    }
}
