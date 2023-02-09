@extends('layouts.login')

@section('content')

<div class="content_top search_wrapper">
    <div class="search_form">
        <form action="/search" class="search_content">
            <input type="search" name="keyword"  placeholder="ユーザー名" class="search_input">
            <button type="submit" class="search_button">
                <i class="fa-sharp fa-solid fa-magnifying-glass" color="white"></i>
            </button>
            <!-- <input type="image" src="images/search.jpg" width="30px" height="30px"> -->
        </form>
    </div>
    @if(!empty($keyword))
    <div class="search_word_form">
        <p class="search_word">検索ワード：{{ $keyword }}</p>
    </div>
    @endif
</div>

<div class="user_wrapper">
    @foreach($users as $user )
    <dl class="user_content">
        @if($user->images == 'Atlas.png')
            <dt><a href="/{{$user->id}}/userProfile"><img src="{{ asset('images/'.$user->images)}}" alt="ユーザーアイコン" width="40" height="40" class="user_icon"></a></dt>
        @else
            <dt><a href="/{{$user->id}}/userProfile"><img src="{{ asset('storage/images/'.$user->images) }}" width="40" height="40" class="user_icon"></a></dt>
        @endif
            <dt class="follow_username">{{ $user->username }}</dt>
        @if (auth()->user()->isFollowing($user->id))<!-- 相手をフォローしているかどうかで条件分岐 -->
        <form action="{{ route('unfollow', $user->id ) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <dd><button type="submit" class="btn btn-danger follow_btn">フォロー解除</button></dd>
        </form>
        @else
        <form action="{{ route('follow', $user->id ) }}" method="POST">
            {{ csrf_field() }}
            <dd><button type="submit" class="btn btn-primary follow_btn">フォローする</button></dd>
        </form>
        @endif
    </dl>
    @endforeach
</div>


@endsection