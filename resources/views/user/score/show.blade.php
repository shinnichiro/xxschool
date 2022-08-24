@extends('layouts.user.app')

@section('content')

<div class="row justify-content-center">
	<div class="col-lg-8">
		@include('layouts.error')

		@if (count($errors) == 0)
		<h3>{{ $user->name }}さんの成績</h3>
		@endif

		<table class="table align-middle">
			<thead>
				<tr>
					<th>日付</th>
					<th>教科</th>
					<th>得点</th>
					@if (\Auth::user()->auth != 'User')
						<th>編集</th>
					@endif
				</tr>
			</thead>
			<tbody>
				@foreach ($scores as $key => $score)
					<tr>
						@if ($key >= count($scores) - 10 * $page && $key < count($scores) - 10 * ($page - 1))
						<td>{{ substr($score->created_at, 0, 4) }}{{ substr($score->created_at, 5, 2) }}{{ substr($score->created_at, 8, 2) }}</td>
						<td>{{ $score->subject }}</td>
						<td>{{ $score->score }}</td>
						@if (\Auth::user()->auth != 'User')
						<td>
							{{ Form::open(['route' => ['user.score.edit', 'id' => $score->id]]) }}
								{{ Form::submit('編集', ['class' => 'btn btn-primary']) }}
							{{ Form::close() }}
							{{ Form::open(['route' => ['user.score.destroy', 'id' => $score->id], 'method' => 'delete']) }}
								{{ Form::submit('削除', ['class' => 'btn btn-danger']) }}
							{{ Form::close() }}
						</td>
						@endif
						@endif
						@if ($key == count($scores) - 10 * $page)
							@break
						@endif
					</tr>
				@endforeach
			</tbody>
		</table>
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
					<a class="page-link" href="{{ route('user.score.show', ['page' => $page - 1, 'id' => $id]) }}" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					</a>
				</li>
				@endif
				@for($i=1; $i<=count($scores)/10+1; $i++)
					@if ($i == $page)
					<li class="page-item active" aria-current="page"><a class="page-link" href="{{ route('user.score.show', ['page' => $i, 'id' => $id]) }}">{{$i}}</a></li>
					@else
					<li class="page-item"><a class="page-link" href="{{ route('user.score.show', ['page' => $i, 'id' => $id]) }}">{{$i}}</a></li>
					@endif
				@endfor
				@if ($page == ((int)(count($scores) / 10)) + 1)
				<li class="page-item disabled">
					<a class="page-link" href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
				@else
				<li class="page-item">
					<a class="page-link" href="{{ route('user.score.show', ['page' => $page + 1, 'id' => $id]) }}" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
				@endif
			</ul>
		</nav>

		@if (\Auth::user()->auth == 'User')
		@else
			{{ Form::open(['route' => ['user.score.create', 'id' => $id]]) }}
				<div class="row mb-1">
					<div class="col-lg-2">{{ Form::label('subject', '教科：') }}</div>
					<div class="col-lg-10">{{ Form::select('subject', ['国語' => '国語', '数学' => '数学', '理科' => '理科', '社会' => '社会', '英語' => '英語', 'その他' => 'その他']) }}</div>
				</div>
				<div class="row mb-1">
					<div class="col-lg-2">{{ Form::label('score', '得点：') }}</div>
					<div class="col-lg-10">{{ Form::text('score', null, ['class' => 'form-control']) }}</div>
				</div>
				<div class="d-grid gap-2">
					{{ Form::submit('追加', ['class' => 'btn btn-success']) }}
				</div>
			{{ Form::close() }}
		@endif
	</div>
</div>

@endsection