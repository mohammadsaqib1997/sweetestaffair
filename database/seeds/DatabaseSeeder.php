<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('admins')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'mohammadsaqib1997@gmail.com',
            'password' => bcrypt('admin123..321'),
            'created_at' => now()
        ]);
    }
}
