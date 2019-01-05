@extends('layouts.master') @section('content')
@component('components.navskills', ['active' => 'vita'])
@endcomponent

<div class="containerContent">
<ul>
@foreach ($items as $item)
    <li>
        <h5><b>{{ $item['start'] }} - {{ $item['end'] }}</b></h5>
        <p>
        <b>{{ $item['title'] }}</b>
        <br>
        {!! $item['desc'] !!}
        </p>
        <hr>
    </li>
@endforeach
</ul>
</div>

@endsection
@section('nav')
    @component('components.nav', ['responsive' => $responsive, 'user' => $user])
    @endcomponent
@endsection
