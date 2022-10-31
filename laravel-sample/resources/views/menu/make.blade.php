@extends('layout')

@section('content')
<?php
// Log::debug("NO,24");
?>
<div class="container">
  <div class="row">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="panel panel-default">
        <div class="panel-heading">お届け先を入力してください</div>
        <div class="panel-body">
          <div class="panel-body">

          </div>
          @if($errors->any())
            <div class="alert alert-danger">
              @foreach($errors->all() as $message)
                <p>{{ $message }}</p>
              @endforeach
            </div>
          @endif


          <form action="{{ route('menus.makeSave') }}" enctype="multipart/form-data" method="POST">
            @csrf

              <label for="name">名前</label>
              <input type="text" class="form-control" name="name" id="name" />
              <label for="price">値段</label>
              <input type="text" class="form-control" name="price" id="price"/>
              <label for="image_label">画像</label>
              <input type="file" name="image" id="image_label" accept="image/*"/>

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
