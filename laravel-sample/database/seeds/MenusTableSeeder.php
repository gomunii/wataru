<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $names = collect(['モンブラン', 'アイス', 'ブリュレ','チップス']);
      $prices = collect([900, 500,800,450]);
      $images = collect(['S__9789486.jpg', 'S__9789482.jpg', 'S__9789483.jpg','messageImage_1661421091472.jpg']);

      foreach($names as $key => $name) {


        DB::table('menus')->insert([
        'name' => $name,
        'price' => $prices[$key],
        'image' => $images[$key],
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        ]);


      }

    }
}
