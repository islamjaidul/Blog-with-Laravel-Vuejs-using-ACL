<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'is_alpha' => 1,
                'email' => 'heera.sheikh77@gmail.com',
                'password' => 123456,
                'name' => 'Sheikh Heera'
            ],
            [
                'is_alpha' => 0,
                'email' => 'jaidul26@gmail.com',
                'password' => 123456,
                'name' => 'Jaidul Islam'
            ],
            [
                'is_alpha' => 0,
                'email' => 'gafoor@gmail.com',
                'password' => 123456,
                'name' => 'Gafoor'
            ],
        ];
        
        foreach ($users as $user) {
            User::forceCreate($user);
        }
    }
}
