@extends('layouts.login')

@section('content')

<div class="content-top search-wrapper">
    <div class="search-form">
        <form action="/search" class="search-content">
            <input type="search" name="keyword"  placeholder="ユーザー名" class="search-input">
            <button type="submit" class="search-button">
                <i class="fa-sharp fa-solid fa-magnifying-glass" color="white"></i>
            </button>
            <!-- <input type="image" src="images/search.jpg" width="30px" height="30px"> -->
        </form>
    </div>
    @if(!empty($keyword))
    <div class="search-word-form">
        <p class="search-word">検索ワード：{{ $keyword }}</p>
    </div>
    @endif
</div>

<div class="user-wrapper">
    @foreach($users as $user )
    <dl class="user-content">
        @if($user->images == 'Atlas.png')
            <dt><a href="/{{$user->id}}/userProfile"><img src="{{ asset('images/'.$user->images)}}" alt="ユーザーアイコン" width="40" height="40" class="user-icon"></a></dt>
        @else
            <dt><a href="/{{$user->id}}/userProfile"><img src="{{ asset('storage/images/'.$user->images) }}" width="40" height="40" class="user-icon"></a></dt>
        @endif
            <dt class="follow-username">{{ $user->username }}</dt>
        @if (auth()->user()->isFollowing($user->id))<!-- 相手をフォローしているかどうかで条件分岐 -->
        <form action="{{ route('unfollow', $user->id ) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <dd><button type="submit" class="btn btn-danger follow-btn">フォロー解除</button></dd>
        </form>
        @else
        <form action="{{ route('follow', $user->id ) }}" method="POST">
            {{ csrf_field() }}
            <dd><button type="submit" class="btn btn-primary follow-btn">フォローする</button></dd>
        </form>
        @endif
    </dl>
    @endforeach
</div>


@endsection