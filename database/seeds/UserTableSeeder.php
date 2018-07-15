<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_station = Role::where('name', 'station')->first();
        
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'davidmartinezb1@hotmail.com';
        $user->password = bcrypt('ohdude');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'boris';
        $user->email = 'boris.hormechea@telemonitoreo.com';
        $user->password = bcrypt('telemonitoreo');
        $user->save();
        $user->roles()->attach($role_user);
        
        $user = new User();
        $user->name = 'station_test';
        $user->email = 'station.test@telemonitoreo.com';
        $user->password = bcrypt('telemonitoreo');
        $user->save();
        $user->roles()->attach($role_station);
        
    }
}
