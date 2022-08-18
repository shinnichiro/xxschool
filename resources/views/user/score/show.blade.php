@extends('layouts.user.app')

@section('content')

<div class="row justify-content-center">
	<div class="col-lg-8">
		<table class="table align-middle">
			<thead>
				<tr>
					<th>日付</th>
					<th>教科</th>
					<th>得点</th>
					<th>編集</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($scores as $score)
					<tr>
						<td>{{ substr($score->created_at, 0, 4) }}{{ substr($score->created_at, 5, 2) }}{{ substr($score->created_at, 8, 2) }}</td>
						<td>{{ $score->subject }}</td>
						<td>{{ $score->score }}</td>
						<td>
							{{ Form::open(['route' => ['user.score.edit', 'id' => $score->id]]) }}
								{{ Form::submit('編集', ['class' => 'btn btn-primary']) }}
							{{ Form::close() }}
							{{ Form::open(['route' => ['user.score.destroy', 'id' => $score->id], 'method' => 'delete']) }}
								{{ Form::submit('削除', ['class' => 'btn btn-danger']) }}
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		@if (\Auth::user()->auth == 'User')
		@else
			{{ Form::open(['route' => ['user.score.create', 'id' => $score->user_id]]) }}
				{{ Form::select('subject', ['国語' => '国語', '数学' => '数学', '理科' => '理科', '社会' => '社会', '英語' => '英語', 'その他' => 'その他']) }}
				{{ Form::label('score', '得点') }}
				{{ Form::text('score', null, ['class' => 'form-control']) }}
				<div class="d-grid gap-2">
					{{ Form::submit('追加', ['class' => 'btn btn-success']) }}
				</div>
			{{ Form::close() }}
		@endif
	</div>
</div>

@endsection