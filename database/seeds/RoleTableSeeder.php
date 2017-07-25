<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'title' => 'Admin'
            ],
            [
                'title' => 'User'
            ],
        ];
        
        foreach ($roles as $index => $role) {
            $role = Role::forceCreate($role);
            $role->users()->attach(['user_id' => $role->id]);
        }
    }
}
