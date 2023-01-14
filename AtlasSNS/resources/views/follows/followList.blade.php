@extends('layouts.login')

@section('content')

<div>
    @foreach($followuserimages as $followuserimage)
    @if($followuserimage->images == 'Atlas.png')
                <th><img src="{{ asset('images/'.$followuserimage->images)}}" alt="ユーザーアイコン" width="50" height="50"></th>
            @else
                <th><img src="{{ asset('storage/images/'.$followuserimage->images) }}" width="50" height="50"></th>
            @endif
    @endforeach
</div>
<div>
    @foreach($followuserposts as $followuserpost)
    @if($followuserpost->user->images == 'Atlas.png')
                <th><a href="/userProfile"><img src="{{ asset('images/'.$followuserpost->user->images)}}" alt="ユーザーアイコン" width="50" height="50"></a></th>
            @else
                <th><a href="/userProfile"><img src="{{ asset('storage/images/'.$followuserpost->user->images) }}" width="50" height="50"></a></th>
            @endif
            <th>{{ $followuserpost->user->username}}</th><br>
            <th>{{ $followuserpost->post }}</th><br>
            <th>{{ $followuserpost->updated_at }}</th><br>
    @endforeach
</div>

@endsection