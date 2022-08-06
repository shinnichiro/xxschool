@extends ('layouts.home.app')

@section ('content')

<div class="row">
	<div class="offset-md-3 col-md-6" id="topics">
		<h3>NEWS一覧</h3>
		<ul>
			@if ($topics == null) {
				<li>トピックスはありません</li>
			@else
				@foreach($topics as $topic)
					<li>{{ substr($topic->created_at, 0, 4) }}{{ substr($topic->created_at, 5, 2) }}{{ substr($topic->created_at, 8, 2) }} {{ $topic->content }}</li>
				@endforeach
			@endif
			<li>{{ link_to_route('index', '戻る') }}</li>
		</ul>
	</div>
</div>

@endsection