@extends('layouts.login')

@section('content')

<div>
    @foreach($followeruserimages as $followeruserimage)
    @if($followeruserimage->images == 'Atlas.png')
                <th><img src="{{ asset('images/'.$followeruserimage->images)}}" alt="ユーザーアイコン" width="50" height="50"></th>
            @else
                <th><img src="{{ asset('storage/images/'.$followeruserimage->images) }}" width="50" height="50"></th>
            @endif
    @endforeach
</div>
<div>
    @foreach($followeruserposts as $followeruserpost)
    @if($followeruserpost->user->images == 'Atlas.png')
                <th><a href="/userProfile"><img src="{{ asset('images/'.$followeruserpost->user->images)}}" alt="ユーザーアイコン" width="50" height="50"></a></th>
            @else
                <th><a href="/userProfile"><img src="{{ asset('storage/images/'.$followeruserpost->user->images) }}" width="50" height="50"></a></th>
            @endif
            <th>{{ $followeruserpost->user->username}}</th><br>
            <th>{{ $followeruserpost->post }}</th><br>
            <th>{{ $followeruserpost->updated_at }}</th><br>
    @endforeach
</div>

@endsection