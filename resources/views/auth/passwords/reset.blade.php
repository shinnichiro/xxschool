@extends('layouts.user.app')

@section('content')

<div class="row justify-content-center">
	<div class="col-lg-8">
		<div class="alert alert-warning">
			<i class="fa-solid fa-triangle-exclamation"></i>許可されていません。{{ link_to_route('index', 'トップページへ', [], []) }}
		</div>
	</div>
</div>

@endsection
