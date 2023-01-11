@extends('layouts.login')

@section('content')

<div class="search">
    <div class="search-form">
        <form action="/search">
            <input type="search" name="keyword"  placeholder="ユーザー名">
            <input type="submit" value="検索">
        </form>
    </div>
    @if(!empty($keyword))
    <p>検索ワード：{{ $keyword }}</p>
    @endif
</div>
<div>
    <tr>
        @foreach($users as $user )
        @if($user->images == 'Atlas.png')
            <td><img src="{{ asset('images/'.$user->images)}}" alt="ユーザーアイコン" width="50" height="50"></td>
        @else
            <td><img src="{{ asset('storage/images/'.$user->images) }}" width="50" height="50"></td>
        @endif
            <td>{{ $user->username }}</td>
        @if (auth()->user()->isFollowing($user->id))<!-- 相手をフォローしているかどうかで条件分岐 -->
        <form action="{{ route('unfollow', $user->id ) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">フォロー解除</button>
        </form>
        @else
        <form action="{{ route('follow', $user->id ) }}" method="POST">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">フォローする</button>
        </form>
        @endif
        @endforeach
    </tr>
</div>


@endsection