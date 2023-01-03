@extends('layouts.login')

@section('content')

@foreach ($errors->all() as $error)
    {{ $error }}
@endforeach

<form action="/newPost" method="post">
    @csrf
    <img src="images/{{ $user->images }}"  width="50" height="50">
    <input type="textarea" name="newPost" placeholder="投稿内容を入力してください" required>
    <input type="image" src="images/post.png" width="50" height="50">
</form>


@foreach($posts as $post)
<table>
    <tr>
        <th><img src="images/{{ $post->user->images }}" alt="ユーザーアイコン"></th>
        <td>投稿者：{{ $post->user->username }}</td>
        <td>内容：{{ $post->post }}</td>
        <td>投稿日時：{{ $post->updated_at }}</td>
        @if($post->user_id === Auth::id())
        <td><a class="btn btn-primary" href=""><img src="images/edit.png" alt="編集" width="50" height="50"></a></td><!-- aタグで遷移する場合、通信方法は基本GET。DBのidをURLのパラメータに入れる -->
        <td><a class="btn btn-danger" href="" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash-h.png" alt="ゴミ箱" width="50" height="50"></a></td>
        @endif

    </tr>
</table>
@endforeach


@endsection