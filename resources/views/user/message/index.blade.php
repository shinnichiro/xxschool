@extends('layouts.user.app')

@section('content')


	<div class="row justify-content-center">
		<div class="col-lg-8">
			@include('layouts.error')

			@foreach($messages as $message)
				<div class="row align-middle mb-1">
					<div class="col-lg-8">
						<p>
							@if ($message->closed == false && \Auth::user()->auth != 'User')
								<i class="fa-solid fa-circle-exclamation"></i>
							@endif
							{{ $message->user->name }}さんより：{{ $message->content }}
						</p>
					</div>
					<div class="col-lg-2 d-grid gap-2">
						{{ link_to_route('user.message.show', '詳細', ['id' => $message->id], ['class' => 'btn btn-primary']) }}
					</div>
					@if (\Auth::user()->id == $message->user_id)
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
						{{ Form::text('content', null, ['class' => 'form-control', 'placeholder' => 'メッセージ、お問い合わせなど', 'required']) }}
					</div>
					<div class="col-lg-2 d-grid gap-2">
					{{ Form::submit('送信', ['class' => 'btn btn-success']) }}
					</div>
				</div>
				{{ Form::checkbox('notice', 1, false, ['class' => 'form-check-input']) }}
				{{ Form::label('notice', 'ほかの保護者様にも共有', ['class' => 'form-check-label']) }}
			{{ Form::close() }}
		</div>
	</div>

@endsection