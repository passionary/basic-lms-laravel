<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Role;

class SuperUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\User::factory()->create()->each(function ($u) {
            $role_id = Role::where('name', '=', 'superuser')->first();

            $u->assignRole($role_id);
        });
    }
}
