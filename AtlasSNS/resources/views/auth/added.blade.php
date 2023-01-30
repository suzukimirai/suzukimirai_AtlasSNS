@extends('layouts.logout')

@section('content')

<div id="clear">
  <p class="name"><span>{{ session('username') }}</span>さん<br>
    ようこそ！AtlasSNSへ！</p>
  <p class="welcome">ユーザー登録が完了しました。<br>
    早速ログインをしてみましょう。</p>

  <p class="btn"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection