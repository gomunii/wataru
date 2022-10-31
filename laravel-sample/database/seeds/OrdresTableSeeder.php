<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrdresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('ordres')->insert([
      'name' => 'test太郎',
      'last_name' => 'test',
      'first_name' => '太郎',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
      ]);
    }
}
