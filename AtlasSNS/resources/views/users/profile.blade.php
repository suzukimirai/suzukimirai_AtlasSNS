@extends('layouts.login')

@section('content')

<!-- 自分のプロフィールここから -->

@if(Request::is('profile'))

<div class="profile_wrapper">
    <div class="profile_image">
    @if(Auth::user()->images == 'Atlas.png')
            <img src="{{ asset('images/'.Auth::user()->images)}}" alt="ユーザーアイコン" width="50" height="50" class="user_icon">
        @else
            <img src="{{ asset('storage/images/'.Auth::user()->images) }}" alt="ユーザーアイコン" width="50" height="50" class="user_icon">
        @endif
    </div>

    <form action="/profile/edit" method="post" enctype="multipart/form-data" class="profile_form">
        @csrf
        <div class="profile_form_list">
            <div class="profile_header">
                <label for="username" class="profile_label">user name</label>
                <label for="mail" class="profile_label">mail adress</label>
                <label for="password" class="profile_label">password:</label>
                <label for="password_confirmation" class="profile_label">password_confirm</label>
                <label for="bio" class="profile_label">bio</label>
                <label for="images" class="profile_label">icon image</label>
            </div>
            <div class="profile_data">
                <input type="text" name="username" id="username" value="{{ Auth::user()->username }}" class="profile_input" required>
                <div class="error_box">
                    @if($errors->has('username'))
                    @foreach($errors->get('username') as $message)
                        <p class="errormessage">{{ $message }}</p>
                    @endforeach
                    @endif 
                </div>
                <input type="mail" name="mail" id="mail" value="{{ Auth::user()->mail }}" class="profile_input" required>
                <div class="error_box">
                    @if($errors->has('mail'))
                    @foreach($errors->get('mail') as $message)
                        <p class="errormessage">{{ $message }}</p>
                    @endforeach
                    @endif 
                </div>
                <input type="password" name="password" id="password" value="" class="profile_input" required>
                <input type="password" name="password_confirmation" id="password_confirmation" value="" class="profile_input" required>
                <div class="error_box">
                    @if($errors->has('password'))
                    @foreach($errors->get('password') as $message)
                        <p class="errormessage">{{ $message }}</p>
                    @endforeach
                    @endif 
                </div>
                <textarea name="bio" id="bio" rows="2" class="profile_input">{{ Auth::user()->bio }}</textarea>
                <div class="error_box">
                    @if($errors->has('bio'))
                    @foreach($errors->get('bio') as $message)
                        <p class="errormessage">{{ $message }}</p>
                    @endforeach
                    @endif 
                </div>
                <input type="file" name="images">
                <div class="error_box">
                    @if($errors->has('images'))
                    @foreach($errors->get('images') as $message)
                        <p class="errormessage">{{ $message }}</p>
                    @endforeach
                    @endif 
                </div>
            </div>
        </div>

        <input type="submit" value="更新" class="profile_btn">
    </form>
</div>

@else

<!-- ユーザープロフィールページここから -->

<div class="content_top user_profile_wrapper">
    @if($user->images == 'Atlas.png')
        <img src="{{ asset('images/'.$user->images)}}" alt="ユーザーアイコン" width="50" height="50" class="user_icon">
    @else
        <img src="{{ asset('storage/images/'.$user->images) }}" alt="ユーザーアイコン" width="50" height="50" class="user_icon">
    @endif
    <div class="user_profile_detail">
        <div class="user_profile_header">
            <p>NAME</p>
            <p>BIO</p>
        </div>
        <div class="user_profile_data">
            <p>{{ $user->username }}</p>
            <p>{{ $user->bio }}</p>
        </div>
    </div>
    @if (auth()->user()->isFollowing($user->id))<!-- 相手をフォローしているかどうかで条件分岐 -->
        <form action="/profile/{{$user->id}}/profileUnFollow" method="POST" class="user_profile_btn">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">フォロー解除</button>
        </form>
        @else
        <form action="/profile/{{$user->id}}/profileFollow" method="POST" class="user_profile_btn">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">フォローする</button>
        </form>
        @endif
</div>
<!-- ユーザー投稿 -->

@foreach($posts as $post)
<div class="post">
    <div class="post_img">
    @if($user->images == 'Atlas.png')
        <img src="{{ asset('images/'.$user->images)}}" alt="ユーザーアイコン" width="50" height="50">
    @else
        <img src="{{ asset('storage/images/'.$user->images) }}" alt="ユーザーアイコン" width="50" height="50">
    @endif
    </div>
    <div class="post_content">
        <div class="post_top">
            <p class="post_username">{{ $user->username }}</p><br>
            <p class="post_updated_at">{{ $post->updated_at }}</p><br>
        </div>
        <p class="post_post">{{ $post->post }}</p><br>
    </div>
</div>
@endforeach

@endif

@endsection