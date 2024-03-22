<?php

namespace Database\Seeders\iam;

use Illuminate\Database\Seeder;


// Models
use App\Models\iam\module\ModuleCategory;
use App\Models\iam\module\Module;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ModuleSeeder extends Seeder
{

    protected $module_list = [];

    public function __construct()
    {


        $this->module_list = [

            // CMS [Start]

            [
                'module_category_name' => 'CMS',
                'modules' => [
                    [
                        'module_name' => 'pages',
                        'module_title' => 'Pages',
                        'permissions' => [
                            'edit' => 'Edit',
                        ],
                    ],
                    [
                        'module_name' => 'countries',
                        'module_title' => 'Countries',
                        'permissions' => [
                            'add' => 'Add',
                            'edit' => 'Edit',
                            'delete' => 'Delete',
                        ],
                    ],
                    [
                        'module_name' => 'awarding_bodys',
                        'module_title' => 'Awarding Bodys',
                        'permissions' => [
                            'add' => 'Add',
                            'edit' => 'Edit',
                            'delete' => 'Delete',
                        ],
                    ],
                    [
                        'module_name' => 'subjects',
                        'module_title' => 'Subjects',
                        'permissions' => [
                            'add' => 'Add',
                            'edit' => 'Edit',
                            'delete' => 'Delete',
                        ],
                    ],
                    [
                        'module_name' => 'lecture_schedules',
                        'module_title' => 'Lecture Schedules',
                        'permissions' => [
                            'add' => 'Add',
                            'edit' => 'Edit',
                            'delete' => 'Delete',
                        ],
                    ],
                    [
                        'module_name' => 'assignments',
                        'module_title' => 'Assignments',
                        'permissions' => [
                            'add' => 'Add',
                            'edit' => 'Edit',
                            'delete' => 'Delete',
                        ],
                    ],
                ]
            ],
            // CMS [End]

            //Campaign [Start]

            [
                'module_category_name' => 'Campaign',
                'modules' => [
                    [
                        'module_name' => 'institutions',
                        'module_title' => 'Institutions',
                        'permissions' => [
                            'add' => 'Add',
                            'edit' => 'Edit',
                            'delete' => 'Delete',
                        ],
                    ],
                    [
                        'module_name' => 'campus',
                        'module_title' => 'Campus',
                        'permissions' => [
                            'add' => 'Add',
                            'edit' => 'Edit',
                            'delete' => 'Delete',
                        ],
                    ],
                ]
            ],
            //Campaign [End]

            //Course Management [Start]

            [
                'module_category_name' => 'Course Management',
                'modules' => [
                    [
                        'module_name' => 'programcodes',
                        'module_title' => 'Program codes',
                        'permissions' => [
                            'add' => 'Add',
                            'edit' => 'Edit',
                            'delete' => 'Delete',
                        ],
                    ],
                ]
            ],
            //Course Management [End]

            //Person [Start]
            [
                'module_category_name' => 'Person',
                'modules' => [
                    [
                        'module_name' => 'faculties',
                        'module_title' => 'Faculties',
                        'permissions' => [
                            'add' => 'Add',
                            'edit' => 'Edit',
                            'delete' => 'Delete',
                            'view' => 'View',
                        ],
                    ],
                    [
                        'module_name' => 'students',
                        'module_title' => 'Students',
                        'permissions' => [
                            'view' => 'View',
                        ],
                    ],
                ]
            ],
            //Person [End]

            //IAM [Start]
            [
                'module_category_name' => 'IAM',
                'modules' => [
                    [
                        'module_name' => 'modules',
                        'module_title' => 'Modules',
                        'permissions' => [
                            'set_permissions' => 'Set Permissions',
                        ],
                    ],
                    [
                        'module_name' => 'roles',
                        'module_title' => 'Roles',
                        'permissions' => [
                            'add' => 'Add',
                            'edit' => 'Edit',
                            'delete' => 'Delete',
                            'view' => 'View',
                            'update_permission'=>'Update Permission',
                        ],
                        
                    ],
                    [
                        'module_name' => 'personnels',
                        'module_title' => 'Personnels',
                        'permissions' => [
                            'add' => 'Add',
                            'edit' => 'Edit',
                            'delete' => 'Delete',
                        ],
                        
                    ],
                ]
            ],
            //IAM [End]

            //-----Front Module --------
        ];
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $module_categories_arr = [];
        $modules_arr = [];
        $modules_name_arr = [];


        $role_item = Role::where('name', 'System Architecture')->first();


        foreach ($this->module_list as $category) {

            $module_category_item = ModuleCategory::firstOrCreate([
                'title' => $category['module_category_name']
            ]);

            $module_categories_arr[] = $module_category_item->title;


            if (!is_null($module_category_item) && isset($category['modules']) && count($category['modules']) > 0) {
                foreach ($category['modules'] as $module) {

                    $module_item = Module::firstOrCreate([
                        'module_category_id' => $module_category_item->id,
                        'name' => $module['module_name'],
                    ]);
                    $module_item->update(['title' => $module['module_title']]);

                    $modules_arr[] = $module_item->title;
                    $modules_name_arr[] = $module_item->name;


                    $module_item->permissions = implode(',', array_keys($module['permissions']));

                    if ($module_item->isDirty()) {
                        $module_item->need_set_permissions = 'Yes';
                        $module_item->save();
                    }


                    $permissions_arr = [];
                    $permission_options = [];
                    if (is_array($module['permissions']) && count($module['permissions']) > 0) {
                        foreach ($module['permissions'] as $permission_name => $permission_title) {
                            $permission_name = $module['module_name'] . '.' . $permission_name;
                            $permissions_arr[] = $permission_name;
                            $permission_options[] = $permission_name;
                            $permission_item = Permission::firstOrCreate([
                                'name' => $permission_name,
                                'title' => $permission_title,
                                'guard_name' => 'web',
                            ]);
                            $permission_item->update([
                                'module_id' => $module_item->id
                            ]);
                            $this->setPermissionToSystemArchitecture($role_item, $permission_item);
                        }
                    }
                    $module_item->permission_options = json_encode($permission_options);
                    $module_item->save();

                    // Delete Other Permissions of Module
                    Permission::where('module_id', $module_item->id)->whereNotIn('name', $permissions_arr)->delete();
                }
            }
        }

        // Delete Other Module
        Module::whereNotIn('title', $modules_arr)->delete();
        Module::whereNotIn('name', $modules_name_arr)->delete();
        ModuleCategory::whereNotIn('title', $module_categories_arr)->delete();
        Permission::whereNull('module_id')->delete();
    }


    // Assign All permissions to System Architecture [Start]

    private function setPermissionToSystemArchitecture(Role $role_item, Permission $permission_item) :void
    {
        if (!is_null($role_item)){
            $role_item->givePermissionTo($permission_item);
        }
    }

    // Assign All permissions to System Architecture [End]
}
