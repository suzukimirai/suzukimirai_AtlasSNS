@extends('layouts.logout')

@section('content')

<div class="form">
    {!! Form::open() !!}
    @csrf
    <p>AtlasSNSへようこそ</p>
    <div class="content">
        <label for="mail" class="label">mail adress</label>
        <input type="email" name="mail" class="input">
        <label for="password" class="label">password</label>
        <input type="password" name="password" class="password">
    </div>
    <input type="submit" value="LOGIN" class="submit">

    <p><a href="/register">新規ユーザーの方はこちら</a></p>

    {!! Form::close() !!}
</div>

@endsection