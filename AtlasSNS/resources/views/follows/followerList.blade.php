@extends('layouts.login')

@section('content')

<!-- フォローリストここから -->
<div class="content_top follow_list">
    <p>Follower List</p>
    <div class="follow_list_icon">
        @foreach($followeruserimages as $followeruserimage)
        @if($followeruserimage->images == 'Atlas.png')
                    <a href="/{{$followeruserimage->id}}/userProfile"><img src="{{ asset('images/'.$followeruserimage->images)}}" alt="ユーザーアイコン" width="50" height="50" class="user_icon"></a>
                @else
                    <a href="/{{$followeruserimage->id}}/userProfile"><img src="{{ asset('storage/images/'.$followeruserimage->images) }}" width="50" height="50" class="user_icon"></a>
                @endif
        @endforeach
    </div>
</div>
<!-- フォローリストここまで -->

@foreach($followeruserposts as $followeruserpost)
<div class="post">
    <div class="post_img">
    @if($followeruserpost->user->images == 'Atlas.png')
        <a href="/{{$followeruserpost->user->id}}/userProfile"><img src="{{ asset('images/'.$followeruserpost->user->images)}}" alt="ユーザーアイコン" width="50" height="50" class="user_icon"></a>
    @else
        <a href="/{{$followeruserpost->user->id}}/userProfile"><img src="{{ asset('storage/images/'.$followeruserpost->user->images) }}" width="50" height="50" class="user_icon"></a>
    @endif
    </div>
    <div class="post_content">
        <div class="post_top">
            <p class="post_username">{{ $followeruserpost->user->username}}</p><br>
            <p class="post_updated_at">{{ $followeruserpost->updated_at }}</p><br>
        </div>
        <p class="post_post">{{ $followeruserpost->post }}</p><br>
    </div>
</div>
@endforeach


@endsection