@extends('layouts.login')

@section('content')

<div class="content_top follow_list">
    <p>Follow List</p>
    <div class="follow_list_icon">
        @foreach($followuserimages as $followuserimage)
        @if($followuserimage->images == 'Atlas.png')
                    <a href="/{{$followuserimage->id}}/userProfile"><img src="{{ asset('images/'.$followuserimage->images)}}" alt="ユーザーアイコン" width="50" height="50" class="user_icon"></a>
                @else
                    <a href="/{{$followuserimage->id}}/userProfile"><img src="{{ asset('storage/images/'.$followuserimage->images) }}" width="50" height="50" class="user_icon"></a>
                @endif
        @endforeach
    </div>
</div>

@foreach($followuserposts as $followuserpost)
<div class="post">
    <div class="post_img">
    @if($followuserpost->user->images == 'Atlas.png')
        <a href="/{{$followuserpost->user->id}}/userProfile"><img src="{{ asset('images/'.$followuserpost->user->images)}}" alt="ユーザーアイコン" width="50" height="50" class="user_icon"></a>
    @else
        <a href="/{{$followuserpost->user->id}}/userProfile"><img src="{{ asset('storage/images/'.$followuserpost->user->images) }}" width="50" height="50" class="user_icon"></a>
    @endif
    </div>
    <div class="post_content">
        <div class="post_top">
            <p class="post_username">{{ $followuserpost->user->username}}</p><br>
            <p class="post_updated_at">{{ $followuserpost->updated_at }}</p><br>
        </div>
        <p class="post_post">{{ $followuserpost->post }}</p><br>
    </div>
</div>
@endforeach


@endsection