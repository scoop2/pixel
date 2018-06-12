@extends('layouts.master') @section('content')

<div class="containerContent">
	@foreach ($profiles as $key => $profile) {{ $profile->title }} // {{
	$profile->content }}
	<hr>
	@endforeach
</div>

@endsection
