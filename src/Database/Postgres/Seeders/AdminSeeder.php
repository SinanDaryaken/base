<?php

namespace Nonoco\Base\Database\Postgres\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'id' => Str::uuid(),
            'super' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@nono.company',
            'password' => bcrypt('secret!'),
        ]);
    }
}