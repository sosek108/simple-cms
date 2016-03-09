<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = DB::table('users')->where('name', 'admin')->first();
        if (count($users) == 0) {
            DB::table('users')->insert([
                'name' => 'admin',
                'email' => 'sosek108@gmail.com',
                'password' => Hash::make('1fqra4'),
            ]);
        }
        // $this->call(UserTableSeeder::class);
    }
}
