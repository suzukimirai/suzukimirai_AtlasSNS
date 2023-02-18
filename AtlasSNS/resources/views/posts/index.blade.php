@extends('layouts.login')

@section('content')

@foreach ($errors->all() as $error)
    {{ $error }}
@endforeach

<div class="content_top post_form_input">
    <form action="/newPost" method="post" class="post_form">
        @csrf
        @if(Auth::user()->images === 'Atlas.png')
                <img class="post_form_user_img user_icon" src="{{ asset('images/'.Auth::user()->images)}}" alt="ユーザーアイコン" width="50" height="50" >
            @else
                <img class="post_form_user_img user_icon" src="{{ asset('storage/images/'.Auth::user()->images) }}" alt="ユーザーアイコン" width="50" height="50" >
            @endif
        <textarea class="post_form_textarea" name="newPost" id="" cols="100" rows="6" placeholder="投稿内容を入力してください" required></textarea>
        <button class="post_form_img fa-regular fa-paper-plane" type="submit">
    </form>
</div>


@foreach($posts as $post)
<div class="post">
    <div class="post_img">
        @if($post->user->images == 'Atlas.png')
            <img src="{{ asset('images/'.$post->user->images)}}" alt="ユーザーアイコン" width="50" height="50" class="user_icon">
        @else
            <img src="{{ asset('storage/images/'.$post->user->images) }}" alt="ユーザーアイコン" width="50" height="50" class="user_icon">
        @endif
    </div>
    <div class="post_content">
        <div class="post_top">
            <p class="post_username">{{ $post->user->username }}</p>
            <p class="post_updated_at">{{ $post->updated_at }}</p>
        </div>
        <p class="post_post">{{ $post->post }}</p>

        @if($post->user_id === Auth::id())
        <div class="post_btn">
            <a class="js-modal-open " href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="images/edit.png" alt="編集" width="35" height="35" ></a><!-- aタグで遷移する場合、通信方法は基本GET。DBのidをURLのパラメータに入れる -->
            <div class="btn-delete-box">
                <a class="btn-delete" href="top/{{ $post->id }}/postDelete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><i class="fa-sharp fa-regular fa-trash-can font_size"></i></a>
            </div>
        </div>
        @endif
    </div>

</div>
@endforeach
   <!-- モーダルの中身 -->
   <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="top/postEdit" method="post" class="modal_form">
                <textarea name="post" class="modal_post"></textarea>
                <input type="hidden" name="post_id" class="modal_id" value="">
                <input type="image" src="images/edit.png" width="40" height="40" class="modal_form_edit">
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>

@endsection