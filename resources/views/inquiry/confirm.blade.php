@extends ('layouts.home.app')

@section ('content')
	<div class="row justify-content-center">
		<div class="col-lg-6">
			<div class="card mb-2">
				<div class="card-header">
					メッセージ送信完了
				</div>
				<div class="card-body">
					<table class="table table-striped">
						<thead></thead>
						<tbody>
							<tr>
								<td>お名前</td>
								<td>{{ $inquiry->name }}</td>
							</tr>
							<tr>
								<td>メールアドレス</td>
								<td>{{ $inquiry->email }}</td>
							</tr>
							<tr>
								<td>お問い合わせ内容</td>
								<td>{{ $inquiry->content }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="d-grid gap-2">
				{{ link_to_route('index', '戻る', [], ['class' => 'btn btn-success']) }}
			</div>
		</div>
	</div>
@endsection