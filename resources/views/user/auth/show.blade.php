@extends('layouts.user.app')

@section('content')

<div class="row justify-content-center">
	<div class="col-lg-8">
		<table class="table table-striped align-middle">
			<thead></thead>
			<tbody>
				<tr>
					<td>氏名</td>
					<td>{{ $user->name }}</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>メールアドレス</td>
					@if (\Auth::id() == $user->id)
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
					<td></td>
					@else
					<td>{{ $user->email }}</td>
					<td></td>
					<td></td>
					@endif
				</tr>
				<tr>
					<td>権限</td>
					@if ($user->id != \Auth::id())
					<td>
						{{ Form::open(['route' => ['user.auth.store', 'id' => $user->id]]) }}
							<select class="form-control" name="auth">
								<option value="Admin" @if ($user->auth == 'Admin') selected @endif>Admin</option>
								<option value="Teacher" @if ($user->auth == 'Teacher') selected @endif>Teacher</option>
								<option value="User" @if ($user->auth == 'User') selected @endif>User</option>
							</select>
					</td>
					<td>
							<div class="d-grid gap-2">
								{{ Form::submit('権限変更', ['class' => 'btn btn-primary']) }}
							</div>
						{{ Form::close() }}
					</td>
					<td>
						{{ Form::open(['route' => ['user.auth.destroy', 'id' => $user->id], 'method' => 'delete']) }}
							<div class="d-grid gap-2">
								{{ Form::submit('削除', ['class' => 'btn btn-danger']) }}
							</div>
						{{ Form::close() }}
					@else
					<td>{{ $user->auth }}</td>
					<td>自身の権限は変更できません</td>
					<td></td>
					@endif
				</tr>
			</tbody>
		</table>
	</div>
</div>

@endsection