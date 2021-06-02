<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Role;
use Illuminate\Support\Str;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::factory()->count(20)->create()->each(function ($u) {
            $role_id = Role::where('name', '=', 'student')->pluck('id')->first();
            $u->assignRole($role_id);
            $u->college_id = Str::random(10);
            $u->save();
        });
    }
}
