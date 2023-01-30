@extends('layouts.login')

@section('content')

<!-- 自分のプロフィールここから -->

@if(Request::is('profile'))

@foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
@endforeach
<div class="profile-wrapper">
    <div class="profile-image">
    @if(Auth::user()->images == 'Atlas.png')
            <img src="{{ asset('images/'.Auth::user()->images)}}" alt="ユーザーアイコン" width="50" height="50" class="user-icon">
        @else
            <img src="{{ asset('storage/images/'.Auth::user()->images) }}" width="50" height="50" class="user-icon">
        @endif
    </div>

    <form action="/profile/edit" method="post" enctype="multipart/form-data" class="profile-form">
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
</div>

@else

<!-- ユーザープロフィールページここから -->

<div class="content-top user-profile-wrapper">
    @if($user->images == 'Atlas.png')
        <img src="{{ asset('images/'.$user->images)}}" alt="ユーザーアイコン" width="50" height="50" class="user-icon">
    @else
        <img src="{{ asset('storage/images/'.$user->images) }}" width="50" height="50" class="user-icon">
    @endif
    <div class="user-profile-detail">
        <div class="user-profile-header">
            <p>NAME</p>
            <p>BIO</p>
        </div>
        <div class="user-profile-data">
            <p>{{ $user->username }}</p>
            <p>{{ $user->bio }}</p>
        </div>
    </div>
    @if (auth()->user()->isFollowing($user->id))<!-- 相手をフォローしているかどうかで条件分岐 -->
        <form action="/profile/{{$user->id}}/profileUnFollow" method="POST" class="user-profile-btn">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">フォロー解除</button>
        </form>
        @else
        <form action="/profile/{{$user->id}}/profileFollow" method="POST" class="user-profile-btn">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">フォローする</button>
        </form>
        @endif
</div>
<!-- ユーザー投稿 -->

@foreach($posts as $post)
<div class="post">
    <div class="post-img">
    @if($user->images == 'Atlas.png')
        <img src="{{ asset('images/'.$user->images)}}" alt="ユーザーアイコン" width="50" height="50">
    @else
        <img src="{{ asset('storage/images/'.$user->images) }}" width="50" height="50">
    @endif
    </div>
    <div class="post-content">
        <div class="post-top">
            <p class="post-username">{{ $user->username }}</p><br>
            <p class="post-updated_at">{{ $post->updated_at }}</p><br>
        </div>
        <p class="post-post">{{ $post->post }}</p><br>
    </div>
</div>
@endforeach

@endif

@endsection