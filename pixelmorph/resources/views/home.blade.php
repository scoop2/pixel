@extends('layouts.master')

@section('content')
<div class="containerHome homeText">
    <div class="visionWrap">
        <div class="valign-wrapper">
            <a class="vision" href="{{ url('/') }}/festival"><button class="btn btnVision">vision of a festival</button></a>
        </div>
    </div>
    <div id="teaserA" class="homeBox">
        <div class="homeTeaserHead">{{ $teaser[0]->title }}</div>
        <div class="chartbox1"></div>
    </div>
    <div id="teaserB" class="homeBox">
        <div class="homeTeaserHead">{{ $teaser[1]->title }}</div>
        <div class="chartbox2"></div>
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
@foreach ($teaser as $charts)
[
    @foreach ($charts->chart as $chart)
        {{ $chart }},
    @endforeach
],
@endforeach
];
var labels = [
@foreach ($teaser as $labels)
    [
    @foreach ($labels->label as $label)
        '{{ $label }}',
    @endforeach
    ],
@endforeach
];

$(document).ready(function(){
@if (!empty($teaser[0]->id))
    renderChart('.chartbox1', '#canvas1', charts[0], labels[0], 'right');
    $('#teaserA').on('click', function(){
        window.location = "{{ url('/') }}/sound/filter/{{ $teaser[0]->id }}";
    })
@endif
@if (!empty($teaser[1]->id))
    renderChart('.chartbox2', '#canvas2', charts[1], labels[1], 'left');
    $('#teaserB').on('click', function(){
        window.location = "{{ url('/') }}/sound/filter/{{ $teaser[1]->id }}";
    })
@endif
});

function spreadIt() {
    var animate = anime({
        targets: '.visionWrap',
        height: '190px',
        duration: 800
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
                responsive: true,
                devicePixelRatio: 0.5,
                maintainAspectRatio: true,
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
                enabled: true,
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
    @component('components.nav', ['active' => '1', 'user' => $user])
    @endcomponent
@endsection
