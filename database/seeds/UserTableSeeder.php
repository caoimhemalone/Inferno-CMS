<?php 

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        $user = new User;
        $user->name = 'Collie Kinsella';
        $user->email = 'infernofitnessteam@gmail.com';
        $user->password = bcrypt('Kilbarrack3');
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());

        $admin = new User;
        $admin->name = 'Caoimhe Malone';
        $admin->email = 'caoimhegmalone@gmail.com';
        $admin->password = bcrypt('password');
        $admin->save();
        $admin->roles()->attach(Role::where('name', 'admin')->first());
    }
}