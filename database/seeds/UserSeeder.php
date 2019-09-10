<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@bigscreen.fr',
            'password' => Hash::make('admin'),
            'lien' => Str::uuid()->toString(),
            'role'=>'administrateur'
        ]);

        factory(App\User::class, 49)->create();
    }
}
