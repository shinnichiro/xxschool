@extends ('layouts.user.app')

@section ('content')

	<div class="row justify-content-center">
		<div class="col-8">
			@if (Auth::user()->auth == 'Admin')
				<div class="card">
					<div class="card-header">
						トピックス編集
					</div>
					<div class="card-body">
						<table class="table table-bordered align-middle">
							<thead>
								<tr>
									<th>作成日</th>
									<th>内容</th>
									<th>編集/削除</th>
								</tr>
							</thead>
							@foreach($topics as $key => $topic)
								<tbody>
									<tr>
										@if ($key >= count($topics) - 10 * $page && $key < count($topics) - 10 * ($page - 1))
										<td>{{ $topic->created_at }}</td>
										<td>{{ $topic->content }}</td>
										<td>
											{{ link_to_route('user.topics.edit', '編集する', ['id' => $topic->id], ['class' => 'btn btn-primary mb-2']) }}
											{{ Form::open(['route' => ['user.topics.destroy', 'id' => $topic->id], 'method' => 'delete']) }}
												{{ Form::submit('削除する', ['class' => 'btn btn-danger']) }}
											{{ Form::close() }}
										</td>
										@endif
										@if ($key == count($topics) - 10 * $page)
											@break
										@endif
									</tr>
								</tbody>
							@endforeach
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
									<a class="page-link" href="{{ route('user.topics.show', ['page' => $page - 1]) }}" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
								</li>
								@endif
								@for($i=1; $i<=count($topics)/10+1; $i++)
									@if ($i == $page)
									<li class="page-item active" aria-current="page"><a class="page-link" href="{{ route('user.topics.show', ['page' => $i]) }}">{{$i}}</a></li>
									@else
									<li class="page-item"><a class="page-link" href="{{ route('user.topics.show', ['page' => $i]) }}">{{$i}}</a></li>
									@endif
								@endfor
								@if ($page == ((int)(count($topics) / 10)) + 1)
								<li class="page-item disabled">
									<a class="page-link" href="#" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a>
								</li>
								@else
								<li class="page-item">
									<a class="page-link" href="{{ route('user.topics.show', ['page' => $page + 1]) }}" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a>
								</li>
								@endif
							</ul>
						</nav>
						{{ Form::open(['route' => 'user.topics.create']) }}
							{{ Form::label('content', '新規作成：') }}
							{{ Form::text('content', null, ['class' => 'form-control', 'required']) }}
							<div class="d-grid gap-2">
								{{ Form::submit('作成', ['class' => 'btn btn-success']) }}
							</div>
						{{ Form::close() }}
					</div>
				</div>
			@else
				<div class="alert alert-warning"><i class="fa-solid fa-triangle-exclamation"></i>権限がありません</div>
				{{ link_to_route('user.index', 'ユーザーページへ', [], ['class' => 'ms-3']) }}
			@endif
		</div>
	</div>

@endsection