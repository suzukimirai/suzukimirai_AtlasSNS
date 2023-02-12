<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title>Laravel SNS</title>
    <script src="https://kit.fontawesome.com/543fdce9ba.js" crossorigin="anonymous"></script>    <!-- <link rel="stylesheet" href="https://kit.fontawesome.com/543fdce9ba.css" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id="header_left">
            <a href="/top"><img class="header_logo" src="{{ asset('images/logo.png')}}" alt="Atlas"></a>
        </div>
        <div id="header_right">
            <p class="header_username">{{ Auth::user()->username }}      さん</p>
            <span class="slide_button"></span>
            @if(Auth::user()->images === 'Atlas.png')
                <img class="header_user_img" src="{{ asset('images/'.Auth::user()->images)}}" alt="ユーザーアイコン" width="50" height="50" class="user-icon">
            @else
                <img class="header_user_img" src="{{ asset('storage/images/'.Auth::user()->images) }}" alt="ユーザーアイコン" width="50" height="50" class="user-icon">
            @endif
        </div>
    </header>
    <div class="main">
        <div id="row">
            <div id="container">
                @yield('content')
            </div >
            <div id="side-bar">
                <div id="confirm">
                    <p>{{ Auth::user()->username }}   さんの</p>
                    <div class="side-bar follow">
                        <p>フォロー数</p>
                        <p>{{ Auth::user()->following()->count() }}人</p>
                    </div>
                    <div class="side-bar-btn">
                        <button type="button" class="btn btn-primary"><a href="/follow-list">フォローリスト</a></button>
                    </div>
                    <div class="side-bar follower">
                        <p>フォロワー数</p>
                        <p>{{ Auth::user()->followed()->count() }}人</p>
                    </div>
                    <div class="side-bar-btn">
                        <button type="button" class="btn btn-primary"><a href="/follower-list">フォロワーリスト</a></button>
                    </div>
                </div>
                <div class="side-bar-btn search">
                    <button type="button" class="btn btn-primary"><a href="/search">ユーザー検索</a></button>
                </div>

                <div class="menu">
                    <nav class="accordion_menu">
                        <ul>
                            <li class="menu_list"><a href="/top" class="menu_a">ホーム</a></li>
                            <li class="menu_list"><a href="/profile" class="menu_a">プロフィール編集</a></li>
                            <li class="menu_list"><a href="/logout" class="menu_a">ログアウト</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div><!-- row -->
    </div><!-- main -->
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="{{ asset('/js/script.js') }}"></script>

</body>
</html>
