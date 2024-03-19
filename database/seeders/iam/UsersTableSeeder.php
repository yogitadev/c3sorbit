<?php

namespace Database\Seeders\Iam;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\iam\personnel\User;
// Other
use Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $list = [
            [
                
                'first_name' => 'Dev',
                'last_name' => 'css',
                'username' => 'stdev',
                'email' => 'dev@csss.es',
                'password' => Hash::make('StDe#1234'),
                'role_id' => '1',
                'status' => 'Active',
            ],
        ];

        if (is_array($list) && count($list) > 0) {
            foreach ($list as $item) {
                $user_item = User::where('email', $item['email'])->first();
                if (is_null($user_item)) {
                    $user_item = User::create($item);
                }
                $role_item = \Spatie\Permission\Models\Role::find($user_item->role_id);
                $user_item->syncRoles($role_item);
            }
        }
    }
}
