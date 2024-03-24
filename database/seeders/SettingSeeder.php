<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::updateOrCreate([
            'key' => Setting::CONTACT_PHONES,
        ], [
            'value' => ''
        ]);

        Setting::updateOrCreate([
            'key' => Setting::CONTACT_MOBILES,
        ], [
            'value' => ''
        ]);

        Setting::updateOrCreate([
            'key' => Setting::CONTACT_FAX,
        ], [
            'value' => ''
        ]);

        Setting::updateOrCreate([
            'key' => Setting::CONTACT_EMAILS,
        ], [
            'value' => ''
        ]);
        Setting::updateOrCreate([
            'key' => Setting::CATALOGUE_URL,
        ], [
            'value' => ''
        ]);
    }
}
