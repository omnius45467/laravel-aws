<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $this->call(UserTableSeeder::class);
        Model::unguard();

        DB::table('users')->delete();

        
        $adminUser = [
            'name'=> 'ohMyGherd',

            'email' => 'admin@marx.com',

            'password' => Hash::make('1234')
        ];

        $nonAdminUser = [
            'name' => 'GermNater',

            'email' => 'nonadmin@marx.com',

            'password' => Hash::make('1234')
        ];

        User::create($adminUser);

        User::create($nonAdminUser);


        Model::reguard();
    }
}
