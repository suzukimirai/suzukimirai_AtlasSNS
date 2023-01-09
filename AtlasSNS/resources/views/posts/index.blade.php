@extends('layouts.login')

@section('content')

@foreach ($errors->all() as $error)
    {{ $error }}
@endforeach

<form action="/newPost" method="post">
    @csrf
    @if(Auth::user()->images === 'Atlas.png')
            <th><img src="{{ asset('images/'.Auth::user()->images)}}" alt="ユーザーアイコン" width="50" height="50"></th>
        @else
            <th><img src="{{ asset('storage/images/'.Auth::user()->images) }}" width="50" height="50"></th>
        @endif
    <input type="textarea" name="newPost" placeholder="投稿内容を入力してください" required>
    <input type="image" src="images/post.png" width="50" height="50">
</form>


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
        <td><a class="btn btn-primary" href=""><img src="images/edit.png" alt="編集" width="50" height="50"></a></td><!-- aタグで遷移する場合、通信方法は基本GET。DBのidをURLのパラメータに入れる -->
        <td><a class="btn btn-danger" href="top/{{ $post->id }}/postDelete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="images/trash-h.png" alt="ゴミ箱" width="50" height="50"></a></td>
        @endif

    </tr>
</table>
@endforeach

@endsection