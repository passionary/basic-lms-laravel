<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Url;
use Illuminate\Support\Str;

class SecurityURLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = Str::random(250);
        Url::create(['url' => $url]);
    }
}
