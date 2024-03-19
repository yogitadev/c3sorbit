<?php

namespace Database\Seeders\Iam;

use Illuminate\Database\Seeder;


// Models
use App\Models\iam\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_item = Role::firstOrCreate([
            'name' => 'System Architecture',
            'guard_name' => 'web',
        ]);

        $role_item->update([
            'short_name' => 'SA',
            'status' => 'Active',
        ]);
    }
}