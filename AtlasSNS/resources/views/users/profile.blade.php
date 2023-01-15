@extends('layouts.login')

@section('content')

@if(Request::is('profile'))

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

@else

<div>
    @if($user->images == 'Atlas.png')
        <th><img src="{{ asset('images/'.$user->images)}}" alt="ユーザーアイコン" width="50" height="50"></th>
    @else
        <th><img src="{{ asset('storage/images/'.$user->images) }}" width="50" height="50"></th>
    @endif
    name:{{ $user->username }}
    bio:{{ $user->bio }}
    @if (auth()->user()->isFollowing($user->id))<!-- 相手をフォローしているかどうかで条件分岐 -->
        <form action="/profile/{{$user->id}}/profileUnFollow" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">フォロー解除</button>
        </form>
        @else
        <form action="/profile/{{$user->id}}/profileFollow" method="POST">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">フォローする</button>
        </form>
        @endif

</div>

<div>
@foreach($posts as $post)
@if($user->images == 'Atlas.png')
    <th><img src="{{ asset('images/'.$user->images)}}" alt="ユーザーアイコン" width="50" height="50"></th>
@else
    <th><img src="{{ asset('storage/images/'.$user->images) }}" width="50" height="50"></th>
@endif
{{ $user->username }}
{{ $post->post }}
{{ $post->updated_at }}
<br>

@endforeach
</div>

@endif

@endsection