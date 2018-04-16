<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->command->info('USERS creados');
    }
}

class UsersTableSeeder extends Seeder {

        public function run()
        {
          db::table('users')->insert(array(
                   'name' => "DSV",
                   'email'     => 'dsv@dsv.com',
                   'password'    =>  Hash::make('dsvdsv'),
                   'sucursal'      =>  0,
                   'rol'      =>  0,
                   'supervisor'        =>  1
                 )
        );

        }
}