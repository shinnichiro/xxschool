@extends ('layouts.user.app')

@section ('content')

	<div class="row justify-content-center">
		<div class="col-sm-8">
			<table class="table table-boardered table-striped">
				<thead>
					<tr>
						<th>お名前</th>
						<th>メールアドレス</th>
						<th>内容</th>
						<th>対応済み</th>
					</tr>
				</thead>
				<tbody>
					@foreach($inquiries as $inquiry)
						<tr>
							<td>{{ $inquiry->name }}</td>
							<td>{{ $inquiry->email }}</td>
							<td>{{ $inquiry->content }}</td>
							<td>
								@if($inquiry->closed == true)
									済
								@else
									未
									{{ Form::open(['route' => ['user.inquiry.store', 'id' => $inquiry->id]]) }}
										{{ Form::submit('対応済み', ['class' => 'btn btn-primary']) }}
									{{ Form::close() }}
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>




@endsection