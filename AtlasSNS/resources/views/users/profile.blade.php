@extends('layouts.login')

@section('content')

@foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
@endforeach

<form action="/profile/edit" method="post" enctype="multipart/form-data">
    @csrf
    <label for="username">user name:</label>
    <input type="text" name="username" value="{{ Auth::user()->username }}"required><br>
    <label for="mail">mail adress:</label>
    <input type="mail" name="mail" value="{{ Auth::user()->mail }}"required><br>
    <label for="password">password:</label>
    <input type="password" name="password" value=""required><br>
    <label for="password_confirmation">password_confirm:</label>
    <input type="password" name="password_confirmation" value=""required><br>
    <label for="bio">bio:</label>
    <textarea name="bio" value="{{ Auth::user()->bio }}" rows="2"></textarea><br>
    <label for="images">icon image:</label>
    <input type="file" name="images"><br>
    <input type="submit" value="更新">
</form>


@endsection