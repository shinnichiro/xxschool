@extends ('layouts.home.app')

@section ('content')

	<div class="row">
		<div class="offset-md-3 col-md-6">
			<h3>お問い合わせフォーム</h3>
			{{ Form::open(['route' => 'inquiry.create']) }}
				{{ Form::token() }}
				<div class="form-group mt-2">
					{{ Form::label('name', 'お名前：') }}
					{{ Form::text('name', null, ['class' => 'form-control mb-2']) }}
					{{ Form::label('email', 'メールアドレス：') }}
					{{ Form::text('email', null, ['class' => 'form-control mb-2']) }}
					{{ Form::label('phone', '電話番号：') }}
					{{ Form::text('phone', null, ['class' => 'form-control mb-2']) }}
					{{ Form::label('content', 'お問い合わせ内容：') }}
					{{ Form::textarea('content', null, ['class' => 'form-control mb-2']) }}
					<div class="d-grid gap-2">
						{{ Form::submit('送信', ['class' => 'btn btn-success']) }}
					</div>
				</div>
			{{ Form::close() }}
		</div>
	</div>

@endsection