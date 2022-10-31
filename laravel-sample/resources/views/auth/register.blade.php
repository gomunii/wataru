@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">会員登録</div>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
              </div>
              <div class="form-group">
                <label for="name">ユーザー名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
              </div>
              <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="form-group">
                <label for="password-confirm">パスワード（確認）</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
              </div>
              <div class="form-group">
                <label for="last_name">苗字</label>
                <input type="text" class="form-control" name="last_name" id="last_name" />
              </div>
              <div class="form-group">
                <label for="first_name">名字</label>
                <input type="text" class="form-control" name="first_name" id="first_name" />
              </div>
              <div class="form-group">
                <label for="postcode">郵便番号</label>
                <input type="text" class="form-control" name="postcode" id="postcode"/>
              </div>
              <div class="form-group">
                <label for="prefectures">都道府県</label>
                <select name="prefectures">
                @foreach(config('pref') as $pref_id => $name)
                  <option value="{{ $pref_id }}" {{ old('pref_id') === $pref_id ? "selected" : ""}}>{{ $name }}</option>
                @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="address">住所</label>
                <input type="text" class="form-control" name="address" id="address"/>
              </div>
              <div class="form-group">
                <label for="phone">電話番号</label>
                <input type="text" class="form-control" name="phone" id="phone" />
              </div>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection
