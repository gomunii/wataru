<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordre extends Model
{
  const STATUS = [
1 => [ 'label' => '注文確認中', 'class' => 'label-danger' ],
2 => [ 'label' => '商品を作っています', 'class' => 'label-info' ],
3 => [ 'label' => 'お届け中', 'class' => 'label-info' ],
4 => [ 'label' => 'お届け済み', 'class' => 'label-info' ],
];

/**
     * 状態のラベル
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }



    public function findByUserIdAndSetTimePrefAndSituationFlg($user_id, $pref_id, $situ_flg) {

      $datas = $this::orderBy('ordres.created_at', 'desc')
      ->select(
        'menus.*','users.*','ordres.*','menu_times.*','menus.name as menus_name',
        'ordres.created_at as ordres_created_at')
      ->leftjoin('users','users.id','=','ordres.user_id')
      ->rightjoin('menus','menus.id','=','ordres.menu_id')
      ->rightjoin('menu_times','menu_times.menu_id','=','menus.id')
      ->where('ordres.user_id' ,'=', $user_id )
      ->where('menu_times.pref' ,'=', $pref_id)
      ->where('ordres.situation' ,'!=', $situ_flg)
      ->get();

      return $datas;


    }
}
