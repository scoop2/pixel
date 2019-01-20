@extends('layouts.master')

@section('content')
<div class="homeText">
    <div class="visionWrap">
        <div class="valign-wrapper">
            <a class="vision" href="{{ url('/') }}/{{ $responsive }}/festival"><button class="btn btnVision">vision of a festival</button></a>
        </div>
    </div>
    <div style="max-width: 95%">
    <div class="homeTeaserWrap">
        <div class="homeRow">
            <div class="homeTeaserTag homeCell">Neu {{ $promo->released }}</div>
            <div class="homeTeaserTag homeCell">Beliebt</div>
        </div>
        <div class="homeRow">
            <div class="homeCell">{{ $promo->description }}</div>
            <div class="homeCell">{{ $teaser->description }}</div>
        </div>
        <div class="homeRow">
            <div class="homeTeaserHead homeCell"><a href="{{ url('/') }}/{{ $responsive }}/sound/filter/{{ $promo->id }}">{{ $promo->title }}</a></div>
            <div class="homeTeaserHead homeCell"><a href="{{ url('/') }}/{{ $responsive }}/sound/filter/{{ $teaser->id }}">{{ $teaser->title }}</a></div>
        </div>
        <div class="homeRow">
            <div class="homeCell">
                <div class="homeChartWrap">
                    <div class="chartbox1"></div>
                </div>
            </div>
            <div class="homeCell">
                <div class="homeChartWrap">
                    <div class="chartbox2"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<script>
var ChartBackgroundColor = [
    'rgba(198, 122, 85, 1)',
    'rgba(228, 143, 84, 1)',
    'rgba(245, 185, 72, 1)',
    'rgba(224, 232, 124, 1)',
    'rgba(195, 244, 130, 1)',
    'rgba(193, 213, 95, 1)',
    'rgba(151, 216, 86, 1)',
    'rgba(73, 244, 84, 1)'
];
var ChartBorderColor = [
    'rgba(54, 16, 8, 1)',
    'rgba(54, 16, 8, 1)',
    'rgba(54, 16, 8, 1)',
    'rgba(54, 16, 8, 1)',
    'rgba(54, 16, 8, 1)',
    'rgba(54, 16, 8, 1)',
    'rgba(54, 16, 8, 1)',
    'rgba(54, 16, 8, 1)'
];

var charts = [
[
    @foreach ($teaser->chart as $chart)
        {{ $chart }},
    @endforeach
],
[
    @foreach ($promo->chart as $chart)
        {{ $chart }},
    @endforeach
],
];
var labels = [
    [
    @foreach ($teaser->label as $label)
        '{{ $label }}',
    @endforeach
    ],
    [
    @foreach ($promo->label as $label)
        '{{ $label }}',
    @endforeach
    ],
];

$(document).ready(function(){
@if (!empty($teaser->id))
    renderChart('.chartbox1', '#canvas1', charts[1], labels[1], 'right');
    $('.teaserA').on('click', function(){
        window.location = "{{ url('/') }}/{{ $responsive }}/sound/filter/{{ $teaser->id }}";
    })
@endif
@if (!empty($promo->id))
    renderChart('.chartbox2', '#canvas2', charts[0], labels[0], 'left');
    $('.teaserB').on('click', function(){
        window.location = "{{ url('/') }}/{{ $responsive }}/sound/filter/{{ $promo->id }}";
    })
@endif
});

function spreadIt() {
    var animate = anime({
        targets: '.visionWrap',
        height: '150px',
        duration: 2000
    });
}

function renderChart(chartdiv, canvas, data, labels, position) {
    $('#moods').remove();
    $(chartdiv).append('<canvas id="' + canvas + '"></canvas>');
    ctx = document.getElementById(canvas).getContext('2d');
    myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                responsive: false,
                devicePixelRatio: 0.5,
                maintainAspectRatio: false,
                aspectRatio: 0.5,
                backgroundColor: ChartBackgroundColor,
                borderColor: ChartBorderColor,
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                yAxes: [
                    {
                        ticks: {
                            beginAtZero: true
                        }
                    }
                ]
            },
            legend: {
                display: false,
                fullWidth: false,
                position: position
            },
            title: {
                display: false
            },
            layout: {
                padding: 0
            },
            tooltips: {
                enabled: false,
                intersects: false
            },
            animation: {
                duration: 2900,
                onComplete: spreadIt()
            }
        }
    });
}
</script>
@endsection

@section('nav')
    @component('components.nav', ['responsive' => $responsive, 'active' => '1', 'user' => $user])
    @endcomponent
@endsection
