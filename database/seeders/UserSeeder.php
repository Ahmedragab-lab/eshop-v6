<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'name' => 'wolf',
            'email' => 'ahmedragabyasin2020@gmail.com',
            'password' => bcrypt('258258258'),
        ]);
    }
}
