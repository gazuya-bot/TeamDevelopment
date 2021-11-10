<?php

use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members_lists')->insert([
            'club_name' => 'テック高校テニス部',
            'email' => 'users@user.com',
            'address' => '東京都千代田区',
            'name' => 'テック太郎',
            'tel' => '09000000000',
            'fax' => '09000000000',
            'memo' => '熱血先生',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
