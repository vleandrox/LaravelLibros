<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        DB::table('users')->insert([
            [
                'name' => 'usuario1',
                'email' => 'usuario1@gmail.com',
                'password' =>bcrypt('usuario1'),
            ]
        ]);
        $this->call(AdminSeeder::class);
    }
}
