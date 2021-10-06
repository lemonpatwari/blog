<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Lemon Patwari',
            'email' => 'lemonpatwari@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => Carbon::now()
        ]);
    }
}
