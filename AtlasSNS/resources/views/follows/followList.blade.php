@extends('layouts.login')

@section('content')

<div class="content-top follow-list">
    <p>Follow List</p>
    <div class="follow-list-icon">
        @foreach($followuserimages as $followuserimage)
        @if($followuserimage->images == 'Atlas.png')
                    <a href="/{{$followuserimage->id}}/userProfile"><img src="{{ asset('images/'.$followuserimage->images)}}" alt="ユーザーアイコン" width="50" height="50" class="user-icon"></a>
                @else
                    <a href="/{{$followuserimage->id}}/userProfile"><img src="{{ asset('storage/images/'.$followuserimage->images) }}" width="50" height="50" class="user-icon"></a>
                @endif
        @endforeach
    </div>
</div>

@foreach($followuserposts as $followuserpost)
<div class="post">
    <div class="post-img">
    @if($followuserpost->user->images == 'Atlas.png')
        <a href="/{{$followuserpost->user->id}}/userProfile"><img src="{{ asset('images/'.$followuserpost->user->images)}}" alt="ユーザーアイコン" width="50" height="50" class="user-icon"></a>
    @else
        <a href="/{{$followuserpost->user->id}}/userProfile"><img src="{{ asset('storage/images/'.$followuserpost->user->images) }}" width="50" height="50" class="user-icon"></a>
    @endif
    </div>
    <div class="post-content">
        <div class="post-top">
            <p class="post-username">{{ $followuserpost->user->username}}</p><br>
            <p class="post-updated_at">{{ $followuserpost->updated_at }}</p><br>
        </div>
        <p class="post-post">{{ $followuserpost->post }}</p><br>
    </div>
</div>
@endforeach


@endsection