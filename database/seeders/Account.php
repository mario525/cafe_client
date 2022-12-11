<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Account extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             //
             DB::statement('SET FOREIGN_KEY_CHECKS=0;');
             // Elimino los datos que pueda tener, ya que solo deberia tener un registro
             DB::table('users')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
                 DB::table('users')->insert([
                     'name' => 'Prueba',
                     'email' => 'prueba@hotmail.com',
                     'password' => bcrypt('password'),
                     'created_at' => Carbon::now()->setTimezone('America/Mexico_City'),
                     'updated_at' => Carbon::now()->setTimezone('America/Mexico_City'),
                 ]);
    }
}
