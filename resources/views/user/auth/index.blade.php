@extends('layouts.user.app')

@section('content')

<div class="row justify-content-center">
	<div class="col-lg-6">
		<h3>ユーザー情報閲覧/変更</h3>
		{{ Form::open(['route' => 'user.auth.show']) }}
			<div class="row">
				<div class="col-lg-8">
					<select class="form-control" name="id">
						@foreach($users as $user)
						<option value="{{ $user->id }}">{{ $user->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-lg-4">
					<div class="d-grid gap-2">
						{{ Form::submit('閲覧', ['class' => 'btn btn-primary']) }}
					</div>
				</div>
			</div>
		{{ Form::close() }}
	</div>
</div>

@endsection