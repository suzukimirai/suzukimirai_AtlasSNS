@extends('layouts.login')

@section('content')

<!-- フォローリストここから -->
<div class="content-top follow-list">
    <p>Follower List</p>
    <div class="follow-list-icon">
        @foreach($followeruserimages as $followeruserimage)
        @if($followeruserimage->images == 'Atlas.png')
                    <a href="/{{$followuserimage->id}}/userProfile"><img src="{{ asset('images/'.$followeruserimage->images)}}" alt="ユーザーアイコン" width="50" height="50" class="user-icon"></a>
                @else
                    <a href="/{{$followuserimage->id}}/userProfile"><img src="{{ asset('storage/images/'.$followeruserimage->images) }}" width="50" height="50" class="user-icon"></a>
                @endif
        @endforeach
    </div>
</div>
<!-- フォローリストここまで -->

@foreach($followeruserposts as $followeruserpost)
<div class="post">
    <div class="post-img">
    @if($followeruserpost->user->images == 'Atlas.png')
        <a href="/{{$followeruserpost->user->id}}/userProfile"><img src="{{ asset('images/'.$followeruserpost->user->images)}}" alt="ユーザーアイコン" width="50" height="50" class="user-icon"></a>
    @else
        <a href="/{{$followeruserpost->user->id}}/userProfile"><img src="{{ asset('storage/images/'.$followeruserpost->user->images) }}" width="50" height="50" class="user-icon"></a>
    @endif
    </div>
    <div class="post-content">
        <div class="post-top">
            <p class="post-username">{{ $followeruserpost->user->username}}</p><br>
            <p class="post-updated_at">{{ $followeruserpost->updated_at }}</p><br>
        </div>
        <p class="post-post">{{ $followeruserpost->post }}</p><br>
    </div>
</div>
@endforeach


@endsection