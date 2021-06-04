<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('role_has_permissions')->delete();

        $roles = [
            [
                'name' => 'superuser',
                'display_name' => 'Superuser',
                'description' => 'Access to create, edit, delete and read data.'
            ],
            [
                'name' => 'standard-user',
                'display_name' => 'Standard Superuser',
                'description' => 'Access to create, edit, delete and read data.'
            ],
            [
                'name' => 'instructor',
                'display_name' => 'Instructor',
                'description' => 'Instructor'
            ],
            [
                'name' => 'student',
                'display_name' => 'Student',
                'description' => 'Student'
            ],
            [
                'name' => 'guest',
                'display_name' => 'Guest',
                'description' => 'Guest account to view features.'
            ],
        ];
        foreach ($roles as $key => $value) {
            $role = Role::firstOrCreate($value);
        }

        \DB::insert(\DB::raw('INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
        (1, 1),
        (2, 1),
        (3, 1),
        (4, 1),
        (5, 1),
        (6, 1),
        (7, 1),
        (8, 1),
        (9, 1),
        (10, 1),
        (11, 1),
        (12, 1),
        (13, 1),
        (13, 3),
        (14, 1),
        (14, 3),
        (15, 1),
        (15, 3),
        (16, 1),
        (16, 3),
        (17, 1),
        (17, 3),
        (18, 1),
        (18, 3),
        (19, 1),
        (19, 3),
        (20, 1),
        (20, 3),
        (21, 1),
        (21, 3),
        (22, 1),
        (22, 3),
        (23, 1),
        (23, 4),
        (24, 1),
        (24, 4),
        (25, 1),
        (25, 4),
        (26, 1),
        (26, 4),
        (27, 1),
        (27, 2),
        (27, 3),
        (27, 4);'));
    }
}
