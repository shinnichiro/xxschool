@extends('layouts.user.app')

@section('content')

	<div class="row justify-content-center">
		<div class="col-lg-8">
			<table class="table">
				<tbody>
					<tr>
						<td>日時</td>
						<td>{{ substr($score->created_at, 0, 4) }}{{ substr($score->created_at, 5, 2) }}{{ substr($score->created_at, 8, 2) }}</td>
					</tr>
					<tr>
						<td>教科</td>
						<td>{{ $score->subject }}</td>
					</tr>
					<tr>
						<td>得点</td>
						<td>{{ $score->score }}</td>
					</tr>
				</tbody>
			</table>
			{{ Form::open(['route' => ['user.score.store', 'id' => $score->id]]) }}
				{{ Form::select('subject', ['国語' => '国語', '数学' => '数学', '理科' => '理科', '社会' => '社会', '英語' => '英語', 'その他' => 'その他']) }}
				{{ Form::label('score', '得点') }}
				{{ Form::text('score', null, ['class' => 'form-control']) }}
				<div class="d-grid gap-2">
					{{ Form::submit('編集', ['class' => 'btn btn-success']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>

@endsection