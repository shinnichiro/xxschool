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
						<li class="nav-item"><a href="#" class="nav-link">お問い合わせ</a></li>
						<li class="nav-item"><a href="#" class="nav-link">保護者様ログイン</a></li>
					</ul>
				</div>
			</nav>
			<div class="row">
				<div class="col-md-4 mb-4" id="topics">
					<h3>NEWS</h3>
					<ul>
						<li>xx.xx.xx hoge</li>
						<li>xx.xx.xx hoge</li>
						<li>xx.xx.xx hoge</li>
						<li>22.08.05 トップページ完成</li>
						<li>22.08.05 作成開始</li>
						<li><a href="#">...more</a></li>
					</ul>
				</div>
				<div class="col-md-4 mb-4">
					<a href="#" id="cardlink">
						<div class="card">
							<img src="./images/mainimage.png" class="card-img-top">
							<div class="card-body">
								<h5>子どものやる気を育てる環境</h5>
								<p>最高の学習環境を提供</p>
								<p class="text-end">教室紹介を見る</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-4 mb-4">
					<a href="#" id="cardlink">
						<div class="card">
							<img src="./images/result.png" class="card-img-top">
							<div class="card-body">
								<h5>積み上げてきた実績</h5>
								<p>難関大学・有名私立小学校の合格者多数</p>
								<p class="text-end">合格実績を見る</p>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<footer><p>© 2022 XX塾</p></footer>
    </body>
</html>