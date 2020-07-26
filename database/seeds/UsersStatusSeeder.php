<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_status')->truncate();
        $data = [
            ['title' => 'not-activated', 'class' => 'info', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['title' => 'activated', 'class' => 'success', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['title' => 'deactive', 'class' => 'danger', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];
        DB::table('users_status')->insert($data);
    }
}
