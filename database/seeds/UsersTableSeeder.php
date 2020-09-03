<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name','admin')->first();
        $authorRole = Role::where('name','author')->first();
        $userRole = Role::where('name','user')->first();
        $sellerRole = Role::where('name','seller')->first();
        $seller2Role = Role::where('name','seller2')->first();
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('hoanglong')
        ]);

        $author = User::create([
            'name' => 'Author User',
            'email' => 'author@gmail.com',
            'password' => Hash::make('hoanglong')
        ]);

        $user = User::create([
            'name' => 'User User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('hoanglong')
        ]);

        $seller = User::create([
            'name' => 'Seller User',
            'email'=>'seller@gmail.com',
            'password'=>Hash::make('hoanglong')
        ]);
        $seller2 = User::create([
            'name' => 'Seller2 User',
            'email'=>'seller2@gmail.com',
            'password'=>Hash::make('hoanglong')
        ]);
        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
        $seller->roles()->attach($sellerRole);
        $seller2->roles()->attach($seller2Role);
    }
}
