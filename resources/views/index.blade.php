@extends ('layouts.home.app')

@section ('content')

<div class="row">
	<div class="col-md-4 mb-4" id="topics">
		<h3>NEWS</h3>
		<ul>
			@if ($topics == null) {
				<li>トピックスはありません</li>
			@else
				@foreach ($topics as $key => $topic)
					<li>{{ substr($topic->created_at, 0, 4) }}{{ substr($topic->created_at, 5, 2) }}{{ substr($topic->created_at, 8, 2) }} {{ $topic->content }}</li>
					@if ($key == count($topics)-5)
						@break
					@endif
				@endforeach
			@endif
			<li>{{ link_to_route('topics', '...more', []) }}</li>
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

@endsection