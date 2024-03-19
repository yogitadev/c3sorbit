<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


// Models
use App\Models\cms\Page;


class PageSeeder extends Seeder
{

    protected $page_list = [];

    public function __construct()
    {

        $this->page_list = [
            [
                'name' => 'homepage',
                'title' => 'Homepage',
                'section_required' => 'No',
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
        foreach ($this->page_list as $page_item) {
            $item = Page::firstOrCreate([
                'name' => $page_item['name'],
            ]);
            $updateArr = [
                'title' => $page_item['title'],
                'section_required' => $page_item['section_required']
            ];
            if (isset($page_item['parent_id']) && $page_item['parent_id'] > 0) {
                $updateArr['parent_id'] = $page_item['parent_id'];
            }
            $item->update($updateArr);
        }
    }
}
