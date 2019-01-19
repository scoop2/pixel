@extends('layouts.master')
@section('content')
@if ($user)
    @component('components.navskills', ['responsive' => $responsive, 'active' => 'skills'])
    @endcomponent
@endif

<div class="containerContent">
	<p>{!! $desc->body !!}</p>
    {{--
    @if ($user)
    <p>
    Der Quellcode dieser Seite läßt sich hier einsehen:<br><a href="https://github.com/scoop2/pixel" target="_blank">https://github.com/scoop2/pixel</a>
    </p>
    @endif
    --}}
	<ul>
		@foreach ($skillcats as $cat)
        @isset ($cat['items'])
		<li>
			<div class="skill-cat-head">{{ $cat['title'] }}</div>
			@foreach ($cat['items'] as $item)
                <div class="skillItemWrap">
                <div class="skillItemIcon">{!! $item['icon'] !!}</div>
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
		</li>
        @endisset
        @endforeach
	</ul>
</div>
<script>
$(document).ready(function(){
    $('.circle').css('animation', 'progress 1s ease-out forwards');

    $(".skillItemText").mouseenter(function(e) {
        e.stopPropagation();
        var el = $(this).prev();
        var html = $(this).prev().html();
        el.html('');
        el.html(html);
    });
});
</script>
@endsection

@section('nav')
    @component('components.nav', ['responsive' => $responsive, 'user' => $user])
    @endcomponent
@endsection
