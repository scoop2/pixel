@extends('layouts.master') 
@section('content')

<div class="containerContent festivalContent">
    {!! $item[0]->body !!}
    <a href="{{ url('/') }}/kontakt"><button class="btn waves centered">I want to get in touch!</button></a>
</div>

@endsection
@section('nav')
    @component('components.nav', ['user' => $user])
    @endcomponent
@endsection
