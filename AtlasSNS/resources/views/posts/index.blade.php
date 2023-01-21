@extends('layouts.login')

@section('content')

@foreach ($errors->all() as $error)
    {{ $error }}
@endforeach

<div class="post-form-input">
    <form action="/newPost" method="post" class="post-form">
        @csrf
        @if(Auth::user()->images === 'Atlas.png')
                <th><img class="post-form-user-img" src="{{ asset('images/'.Auth::user()->images)}}" alt="ユーザーアイコン" width="50" height="50"></th>
            @else
                <th><img class="post-form-user-img" src="{{ asset('storage/images/'.Auth::user()->images) }}" width="50" height="50"></th>
            @endif
        <textarea class="post-form-textarea" name="newPost" id="" cols="100" rows="8" placeholder="投稿内容を入力してください" required></textarea>
        <input class="post-form-img" type="image" src="images/post.png" >
    </form>
</div>


@foreach($posts as $post)
<table>
    <tr>
        @if($post->user->images == 'Atlas.png')
            <th><img src="{{ asset('images/'.$post->user->images)}}" alt="ユーザーアイコン" width="50" height="50"></th>
        @else
            <th><img src="{{ asset('storage/images/'.$post->user->images) }}" width="50" height="50"></th>
        @endif
        <td>{{ $post->user->username }}</td>
        <td>{{ $post->post }}</td>
        <td>{{ $post->updated_at }}</td>
        @if($post->user_id === Auth::id())
        <div class="content">
            <td><a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="images/edit.png" alt="編集" width="50" height="50"></a></td><!-- aタグで遷移する場合、通信方法は基本GET。DBのidをURLのパラメータに入れる -->
        </div>
        <td><a class="btn btn-danger" href="top/{{ $post->id }}/postDelete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="images/trash-h.png" alt="ゴミ箱" width="50" height="50"></a></td>
        @endif

    </tr>
</table>
@endforeach
   <!-- モーダルの中身 -->
   <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="top/postEdit" method="post">
                <textarea name="post" class="modal_post"></textarea>
                <input type="hidden" name="post_id" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>

@endsection