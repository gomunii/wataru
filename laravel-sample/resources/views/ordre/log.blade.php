@extends('layout')

@section('styles')
  @include('share.flatpickr.styles')
@endsection
<?php
// Log::debug("NO,48".$datas);
// Log::debug("NO,49".$timers);
?>
<style>
  img {
    max-width:150px;
  }
  div{

    font-size: 20px;
  }
  body {
    background-color: #FFC778;
  }

  a {
  font-family: 'ヒラギノ明朝 Pro W3', 'Hiragino Mincho Pro', 'Hiragino Mincho ProN', 'HGS明朝E', 'ＭＳ Ｐ明朝', serif;
  padding: 1rem 2rem;
  color: #fff;
  background: #000;
  }

  a span {
  background-image: -webkit-linear-gradient(315deg, #b8751e 0%, #ffce08 37%, #b8751e 47%, #ffce08 50%, #b8751e 53%, #ffce08 63%, #b8751e 100%);
  background-image: linear-gradient(135deg, #b8751e 0%, #ffce08 37%, #b8751e 47%, #ffce08 50%, #b8751e 53%, #ffce08 63%, #b8751e 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  }

  h2 {
  font-family: 'ヒラギノ明朝 Pro W3', 'Hiragino Mincho Pro', 'Hiragino Mincho ProN', 'HGS明朝E', 'ＭＳ Ｐ明朝', serif;
  padding: 1rem 2rem;
  color: #fff;
  background: #000;
  }


  h2 span {
  background-image: -webkit-linear-gradient(315deg, #b8751e 0%, #ffce08 37%, #fefeb2 47%, #fafad6 50%, #fefeb2 53%, #e1ce08 63%, #b8751e 100%);
  background-image: linear-gradient(135deg, #b8751e 0%, #ffce08 37%, #fefeb2 47%, #fafad6 50%, #fefeb2 53%, #e1ce08 63%, #b8751e 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  }

  table{
  width: 100%;
  border-collapse:separate;
  border-spacing: 0;
}

table th:first-child{
  border-radius: 5px 0 0 0;
}

table th:last-child{
  border-radius: 0 5px 0 0;
  border-right: 1px solid #3c6690;
}

table th{
  text-align: center;
  color:white;
  background: linear-gradient(#829ebc,#225588);
  border-left: 1px solid #3c6690;
  border-top: 1px solid #3c6690;
  border-bottom: 1px solid #3c6690;
  box-shadow: 0px 1px 1px rgba(255,255,255,0.3) inset;
  width: 25%;
  padding: 10px 0;
}

table td{
  text-align: center;
  border-left: 1px solid #a8b7c5;
  border-bottom: 1px solid #a8b7c5;
  border-top:none;
  box-shadow: 0px -3px 5px 1px #eee inset;
  width: 25%;
  padding: 10px 0;
}

table td:last-child{
  border-right: 1px solid #a8b7c5;
}

table tr:last-child td:first-child {
  border-radius: 0 0 0 5px;
}

table tr:last-child td:last-child {
  border-radius: 0 0 5px 0;
}
</style>

@section('content')
  <div class="container">
    <div class="row">
      <div class="column col-md-12">
        <div class="panel panel-default">
          <a href="{{ route('ordres.index') }}" class="btn btn-default btn-block">
            <span>
            オーダーリスト
          </span>
          </a>
          <h2><span>注文履歴 log</span></h2>

        <table class="table">
          <thead>
          <tr>
            <th>名前</th>
            <th>郵便番号</th>
            <th>都道府県</th>
            <th>住所</th>
            <th>電話番号</th>
            <th>商品名</th>
            <th>価格</th>
            <th>画像</th>
            <th>数量</th>
            <th>進行状況</th>
            <th>注文時間</th>
            <th>配達予定まで</th>


          </tr>
          </thead>
          <tbody>

          @foreach($datas as $data)
          @if(!empty($data->id))
            <tr>
              <td>{{ $data->last_name }}
              {{ $data->first_name }}</td>
              <td>{{ $data->postcode }}</td>
              <td>
              @foreach(config('pref') as $pref_id => $name)
                @if($pref_id == $data->prefectures)
                  {{$name}}
                  @break
                @endif
              @endforeach
              </td>
              <td>{{ $data->address }}</td>
              <td>{{ $data->phone }}</td>

              <td>{{ $data->menus_name }}</td>
              <td>{{ $data->price }}</td>
              <td><img src="http://localhost:8010/storage/sample/{{ $data->image }}"/></td>
              <td>{{ $data->quantity }}</td>
              <td>
                @foreach(config('situation') as $situation_id => $name)
                  @if($situation_id == $data->situation)
                    {{$name}}
                    @break
                  @endif
                @endforeach
              </td>
              <td>{{ $data->ordres_created_at }}</td>



              @if($data->situation != 4)
              <?php
              if(!empty($timers)){
              date_default_timezone_set("Asia/Tokyo") ;
              $target_day = $data->ordres_created_at ;

              $time = date("Y-m-d H:i:s",strtotime($target_day . " + $timers->time_pref minutes "));
              $now = date("Y-m-d H:i:s");

              $time1 = strtotime($now);
              $time2 = strtotime($time);
              }
              else{
              $target_day = $data->ordres_created_at ;

              $time = date("Y-m-d H:i:s",strtotime($target_day . " +50 minutes "));
              $now = date("Y-m-d H:i:s");

              $time1 = strtotime($now);
              $time2 = strtotime($time);
              }
              $timer = ($time2 - $time1) / (60)
               ?>
              @if( $timer  >= 0)
              <td>あと約{{ ceil($timer) }}分</td>

              @endif
              @endif

            </tr>
              @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
  @include('share.flatpickr.scripts')
@endsection
