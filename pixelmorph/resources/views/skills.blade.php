@extends('layouts.master') @section('content')

@component('components.navskills', ['active' => 'skills', 'user' => $user])

@endcomponent

<div class="containerContent">
	{!! $desc->body !!}
	<ul>
		@foreach ($skillcats as $cat)
		<li>
			<div class="skill-cat-head">{{ $cat['title'] }}</div>

				@foreach ($cat['items'] as $item)
<div class="skillItemWrap">
<div class="skillItemIcon"><i class="{!! $item['icon'] !!} fa-3x"></i></div>
<div class="skillItemCircle">
    <svg viewBox="0 0 37 37" class="circular-chart">
      <path class="circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
      <path class="circle" stroke-dasharray="{!! $item['perc'] !!}, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
      <text x="18" y="20.35" class="percentage">{!! $item['perc'] !!}%</text>
    </svg>
</div>
<div class="skillItemText">
    <b>{!! $item['title'] !!}</b><br>
    {!! $item['description'] !!}
</div>
</diV>
                @endforeach

		</li> @endforeach
	</ul>

</div>

@endsection
