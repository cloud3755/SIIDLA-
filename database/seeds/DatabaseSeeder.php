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
            db::table('roles')->insert(array(
                   'rol' => "superadministrador",
                   'descripcion'     => 'Control total en la app',
                   
                 )
            );
            db::table('roles')->insert(array(
                   'rol' => "administrador",
                   'descripcion'     => 'administrador de la app',
                   
                 )
            );
            db::table('roles')->insert(array(
                   'rol' => "usuario",
                   'descripcion'     => 'User sin permisos especiales',
                 )
            );
            db::table('roles')->insert(array(
                   'rol' => "Cliente",
                   'descripcion'     => 'Cliente, para poder ver pdos',
                   
                 )
            );
            db::table('sucursales')->insert(array(
                   'nombre' => 'Estado de México',
                   'descripcion'     => 'Estado de México',
                 )
            );
            db::table('sucursales')->insert(array(
                   'nombre' => 'Irapuato',
                   'descripcion'     => 'Irapuato',
                 )
            );
          db::table('users')->insert(array(
                   'name' => "DSV",
                   'email'     => 'dsv@dsv.com',
                   'password'    =>  Hash::make('dsv@dsv.com'),
                   'id_sucursal'      =>  0,
                   'id_rol'      =>  1,
                   'supervisor'        =>  0
                 )
            );
            db::table('users')->insert(array(
                   'name' => "User",
                   'email'     => 'User@dsv.com',
                   'password'    =>  Hash::make('User@dsv.com'),
                   'id_sucursal'      =>  1,
                   'id_rol'      =>  3,
                   'supervisor'        =>  1
                 )
            );

        }
}