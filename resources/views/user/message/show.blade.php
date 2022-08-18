@extends('layouts.user.app')

@section('content')

	<div class="row justify-content-center">
		<div class="col-lg-8">
			{{ Form::open(['route' => ['user.message.store', 'id' => $message->id]]) }}
				<div class="row">
					<div class="col-lg-10">
						{{ Form::text('content', $message->content, ['class' => 'form-control']) }}
					</div>
					<div class="col-lg-2 d-grid gap-2">
						{{ Form::submit('編集', ['class' => 'btn btn-success']) }}
					</div>
				</div>
			{{ Form::close() }}
		</div>
	</div>

@endsection