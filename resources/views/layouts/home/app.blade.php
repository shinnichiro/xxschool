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
        <script src="js/"></script>

        <title>XX塾</title>
    </head>
    <body>
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg mb-4">
				<a class="navbar-brand" href="/"><img src="./images/logo_blue.png"></a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav">
					<span><i class="fa-solid fa-bars"></i></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ms-auto">
						<li class="nav-item"><a href="#" class="nav-link disabled">教室長挨拶</a></li>
						<li class="nav-item"><a href="#" class="nav-link disabled">講師紹介</a></li>
						<li class="nav-item"><a href="#" class="nav-link disabled">教室紹介</a></li>
						<li class="nav-item"><a href="#" class="nav-link disabled">合格実績</a></li>
						<li class="nav-item">{{ link_to_route('inquiry.index', 'お問い合わせ', [], ['class' => 'nav-link']) }}</li>
						<li class="nav-item">{{ link_to_route('login', '保護者様ログイン', [], ['class' => 'nav-link']) }}</li>
					</ul>
				</div>
			</nav>

			@yield('content');

		</div>
		<footer><p>© 2022 XX塾</p></footer>
    </body>
</html>