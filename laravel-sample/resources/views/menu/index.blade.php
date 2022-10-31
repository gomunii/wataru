@extends('layout')

@section('styles')
  @include('share.flatpickr.styles')
@endsection
<style>
  img {
    max-width:150px;
  }
</style>

@section('content')
  <div class="container">
    <div class="row">
      <div class="column col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading">お届け先確認</div>
        <table class="table">
          <thead>
          <tr>
            <th>名前</th>
            <th>郵便番号</th>
            <th>都道府県</th>
            <th>住所</th>
            <th>電話番号</th>

            <th></th>
          </tr>
          </thead>
          <tbody>

          @foreach($datas as $data)
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
            </tr>
            @break
          @endforeach
          </tbody>
        </table>
          <div class="panel-heading">カートに入れた商品</div>
          <table class="table">
            <thead>
            <tr>
              <th>商品名</th>
              <th>価格</th>
              <th>画像</th>
              <th>数量</th>
              <th></th>

              <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($datas as $data)
              <tr>
                <td>{{ $data->menus_name }}</td>
                <td>{{ $data->price }}</td>
                <td><img src="http://localhost:8010/storage/sample/{{ $data->image }}"/></td>
                <td>{{ $data->quantity }}</td>
                <td>
                <form action="{{ route('ordres.createSave') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}" />
                    <input type="hidden" name="user_id" value="{{ $data->user_id }}" />
                    <input type="hidden" name="quantity" value="{{ $data->quantity }}" />
                    <button type="submit" class="btn btn-danger" onclick="return confirm('本当に商品を購入しますか？');">商品購入</button>
                  </form>
                </td>
                <td>
              <form action="{{ route('menus.delete', ['id'=>$data->id]) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-danger" onclick="return confirm('削除してよろしいですか？');">削除</button>
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
