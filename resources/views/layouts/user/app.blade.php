<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!--load all Font Awesome styles -->
        <link href="{{ asset('/fontawesome/css/all.css') }}" rel="stylesheet">

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/user.css') }}">
        <script src="js/"></script>

        <title>タイトルを入れよう！</title>
    </head>
    <body>
    	<div class="container-fluid">
    		<nav class="navbar navbar-expand-lg mb-4">
    			@if (Auth::check())
	    			<a href="{{ route('user.index') }}" class="navbar-brand ms-3">{{ Auth::user()->name }}さん</a>
	    			<ul class="navbar-nav ms-auto">
	    				@if (Auth::user()->auth == 'Admin')
	    					<li class="nav-item">{{ link_to_route('register', 'ユーザー追加', [], ['class' => 'nav-link']) }}</li>
	    					<li class="nav-item">{{ link_to_route('user.score.index', 'テスト得点入力', [], ['class' => 'nav-link']) }}</li>
	    					<li class="nav-item">{{ link_to_route('user.topics.show', 'トピックス編集', [], ['class' => 'nav-link']) }}</li>
	    					<li class="nav-item">{{ link_to_route('user.inquiry.show', 'お問い合わせ閲覧', [], ['class' => 'nav-link']) }}</li>
	    				@elseif (Auth::user()->auth == 'Teacher')
	    					<li class="nav-item">{{ link_to_route('user.score.index', 'テスト得点入力', [], ['class' => 'nav-link']) }}</li>
	    				@else
	    					<li class="nav-item">{{ link_to_route('user.score.show', 'テスト得点閲覧', ['id' => Auth::user()->id], ['class' => 'nav-link']) }}</li>
	    				@endif
    					<li class="nav-item">{{ link_to_route('user.message.index', 'メッセージを送る', [], ['class' => 'nav-link']) }}</li>
		    			<li class="nav-item">{{ link_to_route('logout', 'ログアウト', [], ['class' => 'nav-link']) }}</li>
		    		</ul>
    			@else
    				{{ link_to_route('index', 'トップへ戻る', [], ['class' => 'navbar-brand ms-2']) }}
    			@endif
	    	</nav>
    	</div>

        @yield('content')

    </body>
</html>