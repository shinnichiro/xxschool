@extends ('layouts.user.app')

@section ('content')

	<div class="row justify-content-center">
		<div class="col-8">
			{{ Form::open(['route' => ['user.topics.store', 'id' => $topic->id]]) }}
				{{ Form::label('content', 'メッセージ編集：') }}
				{{ Form::text('content', $topic->content, ['class' => 'form-control']) }}
				<div class="d-grid gap-2">
					{{ Form::submit('更新', ['class' => 'btn btn-success']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>

@endsection