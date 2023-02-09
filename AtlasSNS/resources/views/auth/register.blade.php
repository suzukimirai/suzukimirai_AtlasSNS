@extends('layouts.logout')

@section('content')

{!! Form::open() !!}
@csrf

<div class="form">
  <p class="register">新規ユーザー登録</p>
  <div class="content">
    <label for="username" class="label">user name</label>
    <input type="text" name="username" class="input">
    <div class="error-box">
        @if($errors->has('username'))
        @foreach($errors->get('username') as $message)
            <p class="errormessage">{{ $message }}</p>
        @endforeach
        @endif 
    </div>
    <label for="mail" class="label">mail adress</label>
    <input type="email" name="mail" class="input">
    <div class="error_box">
        @if($errors->has('mail'))
        @foreach($errors->get('mail') as $message)
            <p class="errormessage">{{ $message }}</p>
        @endforeach
        @endif 
    </div>
    <label for="password" class="label">password</label>
    <input type="password" name="password" class="input">
    <div class="error_box">
        @if($errors->has('password'))
        @foreach($errors->get('password') as $message)
            <p class="errormessage">{{ $message }}</p>
        @endforeach
        @endif 
    </div>
    <label for="password_confirmation" class="label">password confirm</label>
    <input type="password" name="password_confirmation" class="input">
  </div>

  <input type="submit" value="REGISTER" class="submit">

  <p><a href="/login">ログイン画面へ戻る</a></p>

  {!! Form::close() !!}
</div>

@endsection
