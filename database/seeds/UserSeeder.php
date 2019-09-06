<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{

    protected $admins;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->admins = [
            [
                'name' => 'TJ Bourke',
                'email' => 'tjbourke1@gmail.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Kyle Burleigh',
                'email' => 'kyle.d.burleigh@gmail.com',
            ],
        ];

        foreach ($this->admins as $admin) {
            if (!DB::table('users')->where('email', $admin['email'])->exists()) {
                factory(User::class)->create($admin);
            }
        }
    }
}
