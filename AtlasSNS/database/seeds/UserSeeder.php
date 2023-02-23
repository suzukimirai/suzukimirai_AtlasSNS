<?php

use Illuminate\Database\Seeder;
use App\User;
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
        //
        User::create([
            'username' => 'リンゴ',
            'mail' => 'apple@gmail.com',
            'password' => Hash::make('Miraidesu0717'),
            'images' => 'Atlas.png'
        ]);
    }
}
