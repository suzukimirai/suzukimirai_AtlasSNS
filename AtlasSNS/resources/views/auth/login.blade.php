@extends('layouts.logout')

@section('content')

{!! Form::open() !!}
@csrf
<p>AtlasSNSへようこそ</p>

{{ Form::label('e-mail') }}
{{ Form::text('mail',old('text'),['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',old('password'),['class' => 'input']) }}

{{ Form::submit('ログイン') }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection