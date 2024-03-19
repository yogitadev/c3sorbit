<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Models
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    protected $setting_list = [];

    public function __construct()
    {

        $this->setting_list = [

            [
                'setting_type' => 'Textarea',
                'setting_name' => 'address',
                'setting_title' => 'Address',
                'setting_required' => 'No',
                'setting_help_text' => null,
            ],
            [
                'setting_type' => 'Textarea',
                'setting_name' => 'vl_footer',
                'setting_title' => 'VL Footer',
                'setting_required' => 'No',
                'setting_help_text' => null,
            ],

            [
                'setting_type' => 'Input',
                'setting_name' => 'email',
                'setting_title' => 'Email',
                'setting_required' => 'No',
                'setting_help_text' => null,
            ],

            [
                'setting_type' => 'Input',
                'setting_name' => 'phone_number',
                'setting_title' => 'Phone Number',
                'setting_required' => 'No',
                'setting_help_text' => null,
            ],
            [
                'setting_type' => 'Input',
                'setting_name' => 'whatsapp_number',
                'setting_title' => 'Whatsapp Number',
                'setting_required' => 'No',
                'setting_help_text' => null,
            ],
            

            [
                'setting_type' => 'Input',
                'setting_name' => 'facebook',
                'setting_title' => 'Facebook',
                'setting_required' => 'No',
                'setting_help_text' => null,
            ],

            [
                'setting_type' => 'Input',
                'setting_name' => 'youtube',
                'setting_title' => 'Youtube',
                'setting_required' => 'No',
                'setting_help_text' => null,
            ],

            [
                'setting_type' => 'Input',
                'setting_name' => 'instagram',
                'setting_title' => 'Instagram',
                'setting_required' => 'No',
                'setting_help_text' => null,
            ],

        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach ($this->setting_list as $setting_item) {

            $update_setting_item = Setting::firstOrCreate([
                'setting_name' => $setting_item['setting_name'],
            ]);

            $update_setting_item->update([
                'setting_type' => $setting_item['setting_type'],
                'setting_title' => $setting_item['setting_title'],
                'setting_required' => $setting_item['setting_required'],
                'setting_help_text' => $setting_item['setting_help_text'],
            ]);
        }
    }
}
