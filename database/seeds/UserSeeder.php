<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{

    protected $admins = [
        [
            'name' => 'TJ Bourke',
            'email' => 'tbourke@flexngate-mi.com' // i dont know your personal email
        ],
        [
            'name' => 'Kyle Burleigh',
            'email' => 'kyle.d.burleigh@gmail.com',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->admins as $admin) {
            if (!DB::table('users')->where('email', $admin['email'])->exists()) {
                factory(User::class)->create($admin);
            }
        }
    }
}
