<?php

use Illuminate\Database\Seeder;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Demo',
            'email' => 'admin@demo.com',
            'password' => bcrypt('123456'),
        ]);

        DB::table('clients')->insert([
            'name' => 'Demo',
            'email' => 'admin@demo.com',
            'password' => bcrypt('123456'),
            'transportName' => 'Mohan',
            'mobile' => '1234567890',
            'address' => 'Salem',
        ]);
    }
}
