<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Str;
use App\Role;

class GuestAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account = ['name' => 'Guest',
            'email' => 'guest@guest.x',
            'password' => Hash::make('secret')];
        $u = User::firstOrCreate(['email' => 'guest@guest.x'], $account);
        $role_id = Role::where('name', '=', 'guest')->pluck('id')->first();
        $u->assignRole($role_id);
        $u->college_id = Str::random(10);
    }
}
