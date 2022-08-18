@extends('layouts.user.app')

@section('content')

	<div class="row justify-content-center">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header">
					テスト得点
				</div>
				<div class="card-body">
					{{ Form::open(['route' => 'user.score.show']) }}
						{{ Form::label('name', '生徒名') }}
						<select class="form-control mt-2 mb-2" name="id">
							@foreach($users as $user)
								@if ($user->auth == 'User')
									<option value="{{ $user->id }}">{{ $user->name }}</option>
								@endif
							@endforeach
						</select>
						<div class="d-grid gap-2">
							{{ Form::submit('編集', ['class' => 'btn btn-success']) }}
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

@endsection