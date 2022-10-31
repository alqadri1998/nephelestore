<?php

use Illuminate\Database\Seeder;
use App\Admin;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$superAdmin = Admin::find(1);
        $superAdmin->assignRole('Super-Admin');
        $superAdminRole = Role::where('name', 'Super-Admin')->first();
        $superAdminRole->givePermissionTo(Permission::pluck('id','id')->toArray());
    }
}
