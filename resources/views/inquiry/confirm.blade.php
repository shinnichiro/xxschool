@extends ('layouts.home.app')

@section ('content')
	<div class="row">
		<div class="offset-md-3 col-md-6">
			<h3>メッセージ送信完了</h3>
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
@endsection