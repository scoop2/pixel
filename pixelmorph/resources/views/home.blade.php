@extends('layouts.master')

@section('content')
    <div class="containerContent homeText">
        <h1 class="center textShadow">{{ $items->headline }} {{ $items->username }}</h1>
        <div>
            <img src="{{ url('/') }}/images/shape01.png" class="shaped" />
            <p>{!! $items->body !!}</p>
        </div>
        <div>
        <h2 class="center textShadow">Die neueste Klangwelt</h2>
        </div>
    </div>
@endsection

@section('nav')
    @component('components.nav', ['active' => '1', 'user' => $user])
    @endcomponent
@endsection
