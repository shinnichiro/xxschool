@extends('layouts.user.app')

@section('content')

<div class="row justify-content-center">
	<div class="col-lg-6">
		<h3>ユーザー情報閲覧/変更</h3>
		@if (\Auth::user()->auth == 'Admin')
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
		@else
		<table class="table table-striped align-middle">
			<thead></thead>
			<tbody>
				<tr>
					<td>氏名</td>
					<td>{{ \Auth::user()->name }}</td>
					<td></td>
				</tr>
				<tr>
					<td>メールアドレス</td>
					<td>
						{{ Form::open(['route' => ['user.auth.store', 'id' => \Auth::id()]]) }}
							<input type="email" class="form-control" name="email" value="{{ \Auth::user()->email }}" required>
					</td>
					<td>
							<div class="d-grid gap-2">
								{{ Form::submit('変更', ['class' => 'btn btn-primary']) }}
							</div>
						{{ Form::close() }}
					</td>
				</tr>
				<tr>
					<td>パスワード</td>
					<td>
						{{ Form::open(['route' => ['user.auth.store', 'id' => \Auth::id()]]) }}
							<input type="password" class="form-control" name="password" maxlength="191" required>
					</td>
					<td>
							<div class="d-grid gap-2">
								{{ Form::submit('変更', ['class' => 'btn btn-primary']) }}
							</div>
						{{ Form::close() }}
					</td>
				</tr>
			</tbody>
		</table>
		@endif
	</div>
</div>

@endsection