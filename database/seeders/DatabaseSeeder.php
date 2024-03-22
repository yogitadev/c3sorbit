<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// User

use Database\Seeders\PageSeeder;
use Database\Seeders\SettingSeeder;

// Module
use Database\Seeders\iam\ModuleSeeder;
use Database\Seeders\iam\UsersTableSeeder;
use Database\Seeders\iam\RoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        
        $this->call(SettingSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
