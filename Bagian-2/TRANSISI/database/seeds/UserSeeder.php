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
        $user = [
            'name'=>'Admin',
            'email'=>'admin@transisi.id',
            'password'=> Hash::make('transisi'),
        ];
        User::create($user);
    }
}
