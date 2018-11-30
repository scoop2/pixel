@extends('layouts.master')
@section('content')
	<h1>{{ $items->title }} {{ $items->username }}</h1>
	{!! $items->body !!}
@endsection
