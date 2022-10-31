<?php

use Illuminate\Database\Seeder;
use App\Setting;
class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $system_settings = config('settings.settings');
        foreach ($system_settings as $setting) {
            if(Setting::where('key',$setting['key'])->first())
                continue;
            else
            	Setting::create($setting);
        }
    }
}
