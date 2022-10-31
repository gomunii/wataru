@extends('layout')

@section('styles')
  @include('share.flatpickr.styles')
@endsection

@section('content')

<?php
// Log::debug("NO,17".$data);
?>
<div class="container">
  <div class="row">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="panel panel-default">
        <div class="panel-heading">編集する</div>
        <div class="panel-body">
          @if($errors->any())
            <div class="alert alert-danger">
              @foreach($errors->all() as $message)
                <p>{{ $message }}</p>
              @endforeach
            </div>
          @endif
          <form action="{{ route('users.editForm') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="title">苗字</label>
              <input type="text" class="form-control" name="last_name"
                     value="{{ old('last_name') ?? $data->last_name }}" />
              <label for="title">名字</label>
              <input type="text" class="form-control" name="first_name"
                     value="{{ old('first_name') ?? $data->first_name }}" />
              <label for="title">郵便番号</label>
              <input type="text" class="form-control" name="postcode"
                      value="{{ old('postcode') ?? $data->postcode }}" />
              <select name="prefectures">
                <option value= "{{ old('postcode') ?? $data->prefectures }}">
                  @foreach(config('pref') as $pref_id => $name)
                    @if($pref_id == $data->prefectures)
                      {{$name}}
                      @break
                    @endif
                  @endforeach
                </option>
                @foreach(config('pref') as $pref_id => $name)
                  <option value="{{ $pref_id }}" {{ old('pref_id') === $pref_id ? "selected" : ""}}>{{ $name }}</option>
                @endforeach
              </select>
              <label for="title">住所</label>
              <input type="text" class="form-control" name="address"
                     value="{{ old('address') ?? $data->address }}" />
              <label for="title">電話番号</label>
              <input type="text" class="form-control" name="phone"
                     value="{{ old('phone') ?? $data->phone }}" />
              <input type="hidden" name="id" value="{{ $data->id }}" />
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
