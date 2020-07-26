<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_site')->truncate();
        $data = [
            'name' => 'Travelasido', 
            'email' => 'contact@travelasido.com', 
            'telf' => '+62 818 0759 3006', 
            'fax' => '+62 818 0759 3006', 
            'meta_social' => '{"fb": "https://fb.me/hsevfakhri", "twtr": "https://twitter.com/", "git": "https://github.com/saya.masfahri"}',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('about_site')->insert($data);
    }
}
