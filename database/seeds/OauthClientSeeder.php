<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OauthClientSeeder extends Seeder
{

    protected $client = [
        'id' => 1,
        'name' => 'Laravel Password Grant Client',
        'secret' => '1yTF4oJcMEE9jiA7Wg8b1CYFtslM8cBgaajR4Unb',
        'redirect' => 'http://localhost',
        'personal_access_client' => 0,
        'password_client' => 1,
        'revoked' => 0,
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->truncate();
        DB::table('oauth_clients')->insert(array_merge($this->client, [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]));
    }
}
