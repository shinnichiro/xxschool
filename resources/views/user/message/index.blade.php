@extends('layouts.user.app')

@section('content')

<div class="row justify-content-center">
	<div class="col-lg-8">
		@include('layouts.error')

		@foreach($messages as $key => $message)
			<div class="row align-middle mb-1">
				@if ($key >= count($messages) - 10 * $page && $key < count($messages) - 10 * ($page - 1))
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
				@endif
				@if ($key == count($messages) - 10 * $page)
					@break
				@endif
			</div>
		@endforeach

		<nav aria-label="messagesPage">
			<ul class="pagination">
				@if ($page == 1)
				<li class="page-item disabled">
					<a class="page-link" href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					</a>
				</li>
				@else
				<li class="page-item">
					<a class="page-link" href="{{ route('user.message.index', ['page' => $page - 1]) }}" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					</a>
				</li>
				@endif
				@for($i=1; $i<=count($messages)/10+1; $i++)
					@if ($i == $page)
					<li class="page-item active" aria-current="page"><a class="page-link" href="{{ route('user.message.index', ['page' => $i]) }}">{{$i}}</a></li>
					@else
					<li class="page-item"><a class="page-link" href="{{ route('user.message.index', ['page' => $i]) }}">{{$i}}</a></li>
					@endif
				@endfor
				@if ($page == ((int)(count($messages) / 10)) + 1)
				<li class="page-item disabled">
					<a class="page-link" href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
				@else
				<li class="page-item">
					<a class="page-link" href="{{ route('user.message.index', ['page' => $page + 1]) }}" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
				@endif
			</ul>
		</nav>

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