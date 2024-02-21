<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'app_name',
                'value' => 'سیستم جامع مدیریت مدرسه'
            ]
        ];

        foreach ($settings as $setting)
            if (!Setting::where('key', $setting['key'])->exists())
                Setting::create($setting);
    }
}
