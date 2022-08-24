@extends ('layouts.home.app')

@section ('content')
	<div class="row justify-content-center">
		<div class="col-lg-6">
			@include('layouts.error')

			<div class="card">
				<div class="card-header">
					お問い合わせフォーム
				</div>
				<div class="card-body">
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
		</div>
	</div>

@endsection