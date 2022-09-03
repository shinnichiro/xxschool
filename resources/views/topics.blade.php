@extends ('layouts.home.app')

@section ('content')

<div class="row justify-content-center">
	<div class="col-lg-6">
		<h3>NEWS一覧</h3>
		<ul id="topicsAll">
			@if ($topics == null) {
				<li>トピックスはありません</li>
			@else
				@foreach($topics as $key => $topic)
				@if ($key >= count($topics) - 10 * $page && $key < count($topics) - 10 * ($page - 1))
				<li>{{ substr($topic->created_at, 0, 4) }}{{ substr($topic->created_at, 5, 2) }}{{ substr($topic->created_at, 8, 2) }} {{ $topic->content }}</li>
				@endif
				@if ($key == count($topics) - 10 * $page)
					@break
				@endif
				@endforeach
			@endif
		</ul>
		<nav aria-label="topicsPage">
			<ul class="pagination justify-content-center">
				@if ($page == 1)
				<li class="page-item disabled">
					<a class="page-link" href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					</a>
				</li>
				@else
				<li class="page-item">
					<a class="page-link" href="{{ route('topics', ['page' => $page - 1]) }}" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					</a>
				</li>
				@endif
				@for($i=1; $i<=(count($topics)-1)/10+1; $i++)
					@if ($i == $page)
					<li class="page-item active" aria-current="page"><a class="page-link" href="{{ route('topics', ['page' => $i]) }}">{{$i}}</a></li>
					@else
					<li class="page-item"><a class="page-link" href="{{ route('topics', ['page' => $i]) }}">{{$i}}</a></li>
					@endif
				@endfor
				@if ($page == ((int)((count($topics) - 1) / 10)) + 1)
				<li class="page-item disabled">
					<a class="page-link" href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
				@else
				<li class="page-item">
					<a class="page-link" href="{{ route('topics', ['page' => $page + 1]) }}" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
				@endif
			</ul>
		</nav>
		<div class="d-grid gap-2">
			{{ link_to_route('index', '戻る', [], ['class' => 'btn btn-primary']) }}
		</div>
	</div>
</div>

@endsection