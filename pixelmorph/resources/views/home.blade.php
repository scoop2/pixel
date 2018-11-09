@extends('layouts.master')
@section('content')
<div class="containerContent">
	<h1>{{ $items->title }} {{ $items->username }}</h1>
	{!! $items->body !!}
</div>
@endsection
