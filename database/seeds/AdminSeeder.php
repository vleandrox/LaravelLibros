<?php

use Illuminate\Database\Seeder;
use App\RoleUser;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleuser=new RoleUser();
        $roleuser->role_id = '1';
        $roleuser->user_id = '1';
        $roleuser->save();
    }
}
