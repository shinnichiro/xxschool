@extends ('layouts.user.app')

@section ('content')

<div class="row justify-content-center">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-header">
				メニューリスト
			</div>
			<div class="card-body">
				<ul id="indexList">
					@if (\Auth::user()->auth == 'Admin')
					<div class="row">
						<div class="col-4">
							<li>{{ link_to_route('register', 'ユーザー追加') }}</li>
							<li>{{ link_to_route('user.auth', 'ユーザー情報閲覧') }}</li>
							<li>{{ link_to_route('user.score.index', 'テスト得点入力') }}</li>
							<li>{{ link_to_route('user.topics.show', 'トピックス編集') }}</li>
							<li>{{ link_to_route('user.inquiry.show', 'お問い合わせ閲覧') }}</li>
							<li>{{ link_to_route('user.message.index', 'メッセージを送る') }}</li>
						</div>
						<div class="col-8">
							<li>新しい講師、生徒を登録します。</li>
							<li>ユーザー情報の閲覧、権限の変更を行います。</li>
							<li>テストの得点を登録、閲覧します。</li>
							<li>トップページのトピックス欄を編集します。</li>
							<li>お問い合わせフォームから送られたメッセージを閲覧します。</li>
							<li>掲示板へ移動します。</li>
						</div>
					</div>
					@elseif (\Auth::user()->auth == 'Teacher')
					<div class="row">
						<div class="col-4">
							<li>{{ link_to_route('user.score.index', 'テスト得点入力') }}</li>
							<li>{{ link_to_route('user.message.index', 'メッセージを送る') }}</li>
						</div>
						<div class="col-8">
							<li>テストの得点を登録、閲覧します。</li>
							<li>掲示板へ移動します。</li>
						</div>
					</div>
					@else
					<div class="row">
						<div class="col-4">
							<li>{{ link_to_route('user.score.show', 'テスト得点閲覧', ['id' => \Auth::id()]) }}</li>
							<li>{{ link_to_route('user.message.index', 'メッセージを送る') }}</li>
						</div>
						<div class="col-8">
							<li>テストの得点を閲覧します。</li>
							<li>掲示板へ移動します。</li>
						</div>
					</div>
					@endif
				</ul>
			</div>
		</div>
	</div>
</div>

@endsection