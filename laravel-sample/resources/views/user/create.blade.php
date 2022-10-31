@extends('layout')

@section('styles')
  @include('share.flatpickr.styles')
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="panel panel-default">
        <div class="panel-heading">お届け先を入力してください</div>
        <div class="panel-body">
          <div class="panel-body">
            <a href="{{ route('users.index') }}" class="btn btn-default btn-block">
              既存の情報を使用する
            </a>
          </div>
          @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
              <p>{{ $message }}</p>
            @endforeach
          </div>
        @endif
        <form action="{{ route('users.createSave') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="last_name">苗字</label>
            <input type="text" class="form-control" name="last_name" id="last_name" />
            <label for="first_name">名字</label>
            <input type="text" class="form-control" name="first_name" id="first_name" />
            <label for="postcode">郵便番号</label>
            <input type="text" class="form-control" name="postcode" id="postcode"/>
            <label for="prefectures">都道府県</label>
            <select name="prefectures">
            @foreach(config('pref') as $pref_id => $name)
              <option value="{{ $pref_id }}" {{ old('pref_id') === $pref_id ? "selected" : ""}}>{{ $name }}</option>
            @endforeach
            </select>
            <label for="address">住所</label>
            <input type="text" class="form-control" name="address" id="address"/>
            <label for="phone">電話番号</label>
            <input type="text" class="form-control" name="phone" id="phone" />
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

@section('scripts')
  @include('share.flatpickr.scripts')
@endsection
