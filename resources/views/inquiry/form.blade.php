@extends ('layouts.home.app')

@section ('content')
	<div class="row justify-content-center">
		<div class="col-lg-6">
			@include('layouts.error')
			<h3>お問い合わせフォーム</h3>
			{{ Form::open(['route' => 'inquiry.create']) }}
				<div class="form-group mt-2">
					{{ Form::label('name', 'お名前：') }}
					{{ Form::text('name', null, ['class' => 'form-control mb-2', 'required']) }}
					{{ Form::label('email', 'メールアドレス：') }}
					{{ Form::text('email', null, ['class' => 'form-control mb-2', 'required']) }}
					{{ Form::label('content', 'お問い合わせ内容（190文字以内でお願いいたします）：') }}
					{{ Form::textarea('content', null, ['class' => 'form-control mb-2', 'required']) }}
					<div class="d-grid gap-2">
						{{ Form::submit('送信', ['class' => 'btn btn-success']) }}
					</div>
				</div>
			{{ Form::close() }}
		</div>
	</div>

@endsection