<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Role::count() == 0){
            Role::create([
                'id'                => 1,
                'name'              => 'Super-Admin',
                'display_name'      => 'Super-Admin',
                'description'       => '',
                'guard_name'        => 'admin',
            ]);
        }
    }
}
