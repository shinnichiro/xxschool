@extends ('layouts.user.app')

@section ('content')

	<div class="row justify-content-center">
		<div class="col-8">
			<p>メッセージ編集</p>
			<p>{{ $topic->content }}</p>
			{{ Form::open(['route' => ['user.topics.store', 'id' => $topic->id]]) }}
				{{ Form::label('content', 'メッセージ：') }}
				{{ Form::text('content', null, ['class' => 'form-control']) }}
				<div class="d-grid gap-2">
					{{ Form::submit('更新', ['class' => 'btn btn-success']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>

@endsection