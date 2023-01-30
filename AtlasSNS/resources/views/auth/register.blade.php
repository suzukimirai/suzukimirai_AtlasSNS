@extends('layouts.logout')

@section('content')

{!! Form::open() !!}
@csrf

<div class="form">
  <p>新規ユーザー登録</p>

  @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
  @endforeach
  <div class="content">
    <label for="username" class="label">user name</label>
    <input type="text" name="username" class="input">
    <label for="mail" class="label">mail adress</label>
    <input type="email" name="mail" class="input">
    <label for="password" class="label">password</label>
    <input type="password" name="password" class="input">
    <label for="password_confirmation" class="label">password confirm</label>
    <input type="password" name="password_confirmation" class="input">
  </div>

  <input type="submit" value="REGISTER" class="submit">

  <p><a href="/login">ログイン画面へ戻る</a></p>

  {!! Form::close() !!}
</div>

@error('password_confirmation')
  <p>{{ $message }}</p>
@enderror


@endsection
