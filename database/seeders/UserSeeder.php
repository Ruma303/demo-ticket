<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'prova',
                'email' => 'prova@prova.com',
                'password' => Hash::make('provaprova'),
            ],
            [
                'name' => 'tizio',
                'email' => 'tizio@tizio.com',
                'password' => Hash::make('tiziotizio'),
            ],
            [
                'name' => 'caio',
                'email' => 'caio@caio.com',
                'password' => Hash::make('caiocaio'),
            ],
            [
                'name' => 'sempronio',
                'email' => 'sempronio@sempronio.com',
                'password' => Hash::make('semproniosempronio'),
            ],
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }
}
