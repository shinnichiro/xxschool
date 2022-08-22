@if (count($errors) > 0)
	@foreach ($errors->all() as $error)
		@if ($error == 'The content must not be greater than 191 characters.')
			<div class="alert alert-warning" role="alert"><i class="fa-solid fa-triangle-exclamation"></i>文字数が多すぎます</div>
		@elseif ($error == 'The score format is invalid.')
			<div class="alert alert-warning" role="alert"><i class="fa-solid fa-triangle-exclamation"></i>点数が不正です。</div>
		@else
			<div class="alert alert-warning" role="alert"><i class="fa-solid fa-triangle-exclamation"></i>エラーが発生しました。もう一度最初からやり直してください。</div>
		@endif
	@endforeach
@endif