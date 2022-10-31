<?php

use Illuminate\Database\Seeder;
use App\Admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Admin::count() == 0){
            Admin::create([
                'id'            => 1,
                'name'          => 'superadmin',
            	'email'			=> 'superadmin@nephele.com',
            	'password'		=> bcrypt('superadmin@nephele.com')
            ]);
        }
    }
}
