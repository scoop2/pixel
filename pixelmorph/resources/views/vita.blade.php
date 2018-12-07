@extends('layouts.master') @section('content')
@component('components.navskills', ['active' => 'vita'])
@endcomponent

<div class="containerContent">
<div class="hoverPDFIcon"><i class="fas fa-3x fa-file-pdf"></i></div>
<ul>
@foreach ($items as $item)
    <li>
        <h6><b>{{ $item['start'] }} - {{ $item['end'] }}</b> {{ $item['title'] }}</h6>
        <p>{{ $item['desc'] }}</p>
    </li>
@endforeach
</ul>

</div>

@endsection
@section('nav')
    @component('components.nav', ['user' => $user])
    @endcomponent
@endsection
