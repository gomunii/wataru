<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Menu_TimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $menus_id = collect([1,1,1,1,1,2,2,2,2,2,3,3,3,3,3,4,4,4,4,4]);
      $time_prefs = collect([10,20,30,40,50,10,20,30,40,50,10,20,30,40,50,10,20,30,40,50]);
      $prefs = collect([17,18,16,15,0,17,18,16,15,0,17,18,16,15,0,17,18,16,15,0]);
      foreach($time_prefs as $key => $time_pref) {
        DB::table('menu_times')->insert([
        'menu_id' => $menus_id[$key],
        'time_pref' => $time_pref,
        'pref' => $prefs[$key],
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        ]);
      }
    }
}
