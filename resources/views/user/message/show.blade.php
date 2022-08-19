@extends('layouts.user.app')

@section('content')

	<div class="row justify-content-center">
		<div class="col-lg-8">
			@if (\Auth::user()->id == $message->user_id)
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
			@else
				{{ Form::open(['route' => ['user.message.create', 'to_id' => $message->user_id, 'notice' => $message->notice]]) }}
					<div class="row">
						<p>{{ $message->user->name }}さんより：{{ $message->content }}</p>
						<div class="col-lg-10">
							{{ Form::text('content', '', ['class' => 'form-control']) }}
						</div>
						<div class="col-lg-2 d-grid gap-2">
							{{ Form::submit('返信', ['class' => 'btn btn-success']) }}
						</div>
					</div>
				{{ Form::close() }}
			@endif
			@if (\Auth::user()->auth != 'User' && $message->closed == false)
				{{ Form::open(['route' => ['user.message.store', 'id' => $message->id, 'closed' => 1, 'content' => $message->content]]) }}
					<div class="col-lg-2">
						{{ Form::submit('対応済み', ['class' => 'btn btn-primary']) }}
					</div>
				{{ Form::close() }}
			@endif
		</div>
	</div>

@endsection