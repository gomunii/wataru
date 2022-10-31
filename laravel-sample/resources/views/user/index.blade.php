@extends('layout')

@section('styles')
  @include('share.flatpickr.styles')
@endsection

@section('content')

<?php
// Log::debug("NO,11".$datas);
?>

<style>

div{

  font-size: 16px;
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

body {
  background-color: #FFC778;
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


  <div class="container">
    <div class="row">
      <div class="column col-md-8">
        <div class="panel panel-default">
          <h2><span>お届け先Addressee</span></h2>
          
          <table class="table">
            <thead>
            <tr>
              <th>名前</th>
              <th>郵便番号</th>
              <th style="word-break: keep-all;">都道府県</th>
              <th>住所</th>
              <th style="word-break: keep-all;">電話番号</th>
              <th>編集</th>
              <th>決定</th>


            </tr>
            </thead>
            <tbody>

            @foreach($datas as $data)
              <tr>
                <td style="word-break: keep-all;">{{ $data->last_name }}
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
                <td>
                <a href="{{ route('users.edit', ['id' => $data->id]) }}">編集</a>
              </td>
              <a href="{{ route('menus.make', ['id' => $data->id]) }}">メニュー新規作成</a>
            </td>
              <td>
                  <form action="{{ route('menus.create',['id'=>$data->id]) }}" method="POST">
                    @csrf
                    <div class="text-right">
                      <button type="submit" class="btn btn-primary">このお届け先で商品選択</button>
                    </div>
                  </form>
              </td>
              </tr>
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
<!-- <style>
  img {
    width:500px;
  }
  .komaru {
    width:500px;
  }
  #text01 {
    color:red;
  }
</style>

<img src="sample.jpg" class="komaru" method="POST"/>
<p class="komaru">hello!</p>
<p class="text01">hello!</p>
<p id="text01">next text01!</p>

<div id="header">
  <img src="sample.jpg"/>
</div>
<div id="main">
  <img src="sample.jpg"/>
</div>
<div id="footer">
  <img src="sample.jpg"/>
</div> -->
