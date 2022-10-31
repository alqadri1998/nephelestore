<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Artisan::call('config:cache');
        \Artisan::call('cache:clear');
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \Config::set('app.locale', 'ar');
        \DB::table('model_has_permissions')->truncate();
        Permission::truncate();
        $permissions = config('system.permissions');
        $i = 1;
        foreach ($permissions as $permission) {
            if($permission['crud']){
                foreach (['list', 'create', 'edit', 'delete'] as $perm) {
                    Permission::create([
                        'id'    =>  $i++,
                        'guard_name' => 'admin',
                        'name'  =>  $perm . '-' . $permission['name'],
                        'display_name'  =>  ucfirst($perm) . ' ' . $permission['display_name'],
                        'display_name_ar'  =>  __('admin.' . $perm) . ' ' . $permission['display_name_ar'],
                    ]);
                }
            }else{
                Permission::create([
                    'id'    =>  $i++,
                    'guard_name' => 'admin',
                    'name'  =>  $permission['name'],
                    'display_name'  =>  $permission['display_name'],
                    'display_name_ar'  =>  $permission['display_name_ar'],
                ]);
            }
        }
    }
}
