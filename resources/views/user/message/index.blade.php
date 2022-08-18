@extends('layouts.user.app')

@section('content')

	<div class="row justify-content-center">
		<div class="col-lg-8">
			@foreach($messages as $message)
				<div class="row align-middle mb-1">
					<div class="col-lg-8">
						<p>{{ $message->user->name }}さんより：{{ $message->content }}</p>
					</div>
					@if (\Auth::user()->id == $message->user_id)
					<div class="col-lg-2 d-grid gap-2">
						{{ link_to_route('user.message.show', '編集', ['id' => $message->id], ['class' => 'btn btn-primary']) }}
					</div>
					<div class="col-lg-2">
						{{ Form::open(['route' => ['user.message.destroy', 'id' => $message->id], 'method' => 'delete']) }}
							<div class="d-grid gap-2">
								{{ Form::submit('削除', ['class' => 'btn btn-danger']) }}
							</div>
						{{ Form::close() }}
					</div>
					@endif
				</div>
			@endforeach

			{{ Form::open(['route' => 'user.message.create']) }}
				<div class="row">
					<div class="col-lg-10">
						{{ Form::text('content', null, ['class' => 'form-control', 'placeholder' => 'メッセージ、お問い合わせなど']) }}
					</div>
					<div class="col-lg-2 d-grid gap-2">
					{{ Form::submit('送信', ['class' => 'btn btn-success']) }}
					</div>
				</div>
			{{ Form::close() }}
		</div>
	</div>

@endsection