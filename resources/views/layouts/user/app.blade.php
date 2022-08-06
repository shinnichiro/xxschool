<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!--load all Font Awesome styles -->
        <link href="./fontawesome/css/all.css" rel="stylesheet">

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="./css/index.css">
        <link rel="stylesheet" href="./css/user.css">
        <script src="js/"></script>

        <title>タイトルを入れよう！</title>
    </head>
    <body>
    	<div class="container-fluid">
    		<nav class="navbar navbar-expand-lg mb-4">
    			@if (Auth::check())
	    			<a href="#" class="navbar-brand"><?php //{{ $user->name() }} ?>さん</a>
	    			<ul class="navbar-nav ms-auto">
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