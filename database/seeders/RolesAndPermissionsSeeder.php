<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'assign roles']);
        Permission::create(['name' => 'assign permissions']);
        Permission::create(['name' => 'manage users']);

        Permission::create(['name' => 'invite mentors']);
        Permission::create(['name' => 'invite mentees']);
        Permission::create(['name' => 'assign courses to mentors']);
        Permission::create(['name' => 'remove mentors from courses']);
        Permission::create(['name' => 'assign mentees to mentors']);
        Permission::create(['name' => 'enroll mentees in courses']);
        Permission::create(['name' => 'remove mentees from courses']);
        Permission::create(['name' => 'enroll classes in courses']);

        Permission::create(['name' => 'create course template']);
        Permission::create(['name' => 'edit course template']);
        Permission::create(['name' => 'delete course template']);

        Permission::create(['name' => 'review solutions']);
        Permission::create(['name' => 'add notes to solutions']);
        Permission::create(['name' => 'add notes to mentees']);

        Permission::create(['name' => 'submit solutions']);

        Permission::create(['name' => 'manage course announcements']);
        Permission::create(['name' => 'manage global announcements']);

        Role::create(['name' => 'admin'])
            ->givePermissionTo([
                'assign roles',
                'assign permissions',
                'manage users',
            ]);

        Role::create(['name' => 'operator'])
            ->givePermissionTo([
                'invite mentors',
                'invite mentees',
                'assign courses to mentors',
                'remove mentors from courses',
                'assign mentees to mentors',
                'enroll mentees in courses',
                'remove mentees from courses',
                'enroll classes in courses',
                'manage global announcements',
                'manage course announcements',
            ]);

        Role::create(['name' => 'mentor'])
            ->givePermissionTo([
                'review solutions',
                'manage course announcements',
                'enroll mentees in courses',
            ]);

        Role::create(['name' => 'mentee'])
            ->givePermissionTo([
                'submit solutions',
            ]);
    }
}
