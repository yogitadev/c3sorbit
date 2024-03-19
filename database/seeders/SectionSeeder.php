<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


// Models
use App\Models\cms\Section;


class SectionSeeder extends Seeder
{

    protected $section_list = [];

    public function __construct()
    {

        $this->section_list = [
            
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach ($this->section_list as $section_item) {

            $item = Section::firstOrCreate([
                'page_id' => $section_item['page_id'],
                'title' => $section_item['title'],
            ]);

            $item->update([
                'entry_required' => $section_item['entry_required']
            ]);
        }
    }
}
