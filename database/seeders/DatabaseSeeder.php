<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $userAdminDefis = New User;
        $userAdminDefis->name="Test";
        $userAdminDefis->email="test@test.com";
        $userAdminDefis->password=Hash::make("test");
        $userAdminDefis->save();

        $userAdminDefis->createToken("test");

        $user = New User;
        $user->id=45;
        $user->name="Test";
        $user->email="test2@test.com";
        $user->password=Hash::make("test");
        $user->save();
    }
}
