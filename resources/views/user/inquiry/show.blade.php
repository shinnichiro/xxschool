@extends ('layouts.user.app')

@section ('content')

<div class="row justify-content-center">
	<div class="col-sm-8">
		<table class="table table-boardered table-striped  align-middle">
			<thead>
				<tr>
					<th>お名前</th>
					<th>メールアドレス</th>
					<th>内容</th>
					<th>対応済み</th>
				</tr>
			</thead>
			<tbody>
				@foreach($inquiries as $key => $inquiry)
					<tr>
						@if ($key >= count($inquiries) - 10 * $page && $key < count($inquiries) - 10 * ($page - 1))
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
						@endif
						@if ($key == count($inquiries) - 10 * $page)
							@break
						@endif
					</tr>
				@endforeach
			</tbody>
		</table>
		<nav aria-label="topicsPage">
			<ul class="pagination">
			@if ($page == 1)
			<li class="page-item disabled">
				<a class="page-link" href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
			@else
			<li class="page-item">
				<a class="page-link" href="{{ route('user.inquiry.show', ['page' => $page - 1]) }}" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
			@endif
			@for($i=1; $i<=count($inquiries)/10+1; $i++)
				@if ($i == $page)
				<li class="page-item active" aria-current="page"><a class="page-link" href="{{ route('user.inquiry.show', ['page' => $i]) }}">{{$i}}</a></li>
				@else
				<li class="page-item"><a class="page-link" href="{{ route('user.inquiry.show', ['page' => $i]) }}">{{$i}}</a></li>
				@endif
			@endfor
			@if ($page == ((int)(count($inquiries) / 10)) + 1)
			<li class="page-item disabled">
				<a class="page-link" href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
			@else
			<li class="page-item">
				<a class="page-link" href="{{ route('user.inquiry.show', ['page' => $page + 1]) }}" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
			@endif
			</ul>
		</nav>
	</div>
</div>

@endsection