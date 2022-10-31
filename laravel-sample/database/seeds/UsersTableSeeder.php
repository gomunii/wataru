<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
      'name' => 'test太郎',
      'last_name' => 'test',
      'first_name' => '太郎',
      'postcode' => '2222222',
      'prefectures' => '1',
      'address' => '金沢市藤江2-529',
      'phone' => '09058695553',
      'email' => 'dummy@email.com',
      'password' => bcrypt('test1234'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);
    }
}
