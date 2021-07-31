<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'student-list',
           'student-create',
           'student-edit',
           'student-delete',
           'employee-list',
           'employee-create',
           'employee-edit',
           'employee-delete',
           'teacher-list',
           'teacher-create',
           'teacher-edit',
           'teacher-delete',
           'department-list',
           'department-create',
           'department-edit',
           'department-delete',
           'course-list',
           'course-create',
           'course-edit',
           'course-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'subject-list',
           'subject-create',
           'subject-edit',
           'subject-delete',
           'fees-list',
           'fees-create',
           'fees-edit',
           'fees-delete'
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
