@extends('layouts.master')
@section('content')

<div class="setsWrap containerContent">
<div class="filterWrap z-depth-3">
	<div class="filterSwitchWrap">
		@foreach ($tags as $key => $tag)
			<div class="tagBoxWrap">
				<div class="tagTitle">{{ $tag->title }}</div>
				<div id="tagBox{{ $tag->id }}" class="tagBox" data-id="{{ $tag->id }}"></div>
			</div>
		@endforeach
		<div class="tagBoxWrap"></div>
	</div>
    <div class="filterNav">
        <div class="fiterBtnWrap tooltipped" data-position="left" data-tooltip="Starte eine Suche nach Sets mit diesen Moods">
            <i class="fas fa-arrow-circle-right fa-3x icon-blue"></i>
        </div>
        <div class="fiterBackBtnWrap tooltipped" data-position="left" data-tooltip="Versteck mich wieder">
            <i class="fas fa-arrow-circle-up fa-3x icon-blue"></i>
        </div>
        <div class="fiterResetBtnWrap tooltipped" data-position="left" data-tooltip="Alle Moods auf Null zurück stellen">
            <i class="fas fa-arrow-circle-down fa-3x icon-blue"></i>
        </div>
    </div>
</div>


<div class="center-align">
    <button class="btn btnSearch"><i class="fas fa-headphones"></i> LOOK FOR MORE MUSIC <i class="fas fa-headphones"></i></button>
</div>
<!--
<div>{!! html_entity_decode($desc->body) !!}</div>
-->
<div class="playerWrapOuter">
	<div id="player" class="playerWrap">
		<div class="titleWrap">
			<div id="track" class="playerTitle floatLeft">{{ $items[0]->title }}</div>
			<div class="playerDate floatRight">
                <div class="playerInfoWrap">
                    <div class="playerDataLength">{{ $items[0]->setlength }}</div>
                    <div class="playerDateSmall">min&nbsp;</div>
                    <div class="playerDataBpm"> {{ $items[0]->bpm }}</div>
                    <div class="playerDateSmall">BPM (&Oslash;)}&nbsp;</div>
                    <div class="playerDataReleased">{{ $items[0]->released }}</div>
                </div>
				<div class="playerSocialIcons">
                    <div class="playlists">
                        <i id="openPlaylist" class="fas fa-list-ol"></i>
                        <div class="playlist z-depth-2" id="playlistid">
                            <div class="close"><i id="closePlaylist" class="fas fa-times fa-lg"></i></div>
                            <ul id="playlistUl">
                                @foreach ($items[0]->playlist as $playlist)
                                    <li><b>{{ $playlist->title }}</b> - {{ $playlist->artist }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <a href="{{ url('/') }}/enjoy/{{ $items[0]->filename }}" download><i class="fas fa-download"></i></a>
					<a href="https://www.facebook.com/sharer/sharer.php?u=https://pixelmorph.de/sound/filter/{{ $items[0]->id }}" target="_blank"><i class="fab fa-facebook-square fa-fw playerSocialIconsPadding"></i></a>
					<a href="https://twitter.com/home?status=https://pixelmorph.de/sound/filter/{{ $items[0]->id }}" target="_blank"><i class="fab fa-twitter-square fa-fw playerSocialIconsPadding"></i></a>
					<a href="https://plus.google.com/share?url=https://pixelmorph.de/sound/filter/{{ $items[0]->id }}" target="_blank"><i class="fab fa-google-plus-square fa-fw playerSocialIconsPadding"></i></a>
                </div>
			</div>
		</div>
		<div class="playerWaveWrap">
            <div class="playerPlayerWrap">
                <audio crossorigin playsinline>
                    <source src="{{ url('/') }}/enjoy/{{ $items[0]->filename }}" type="audio/mp3">
                </audio>
            </div>
		</div>
        <div class="playerMetaWrap">
            <div class="playerMetaCover">
                <img id="playerCover" src="{{ url('/') }}/images/covers/{{ $items[0]->cover }}">
            </div>
            <div class="playerMetaChart">
                <canvas id="moods"></canvas>
            </div>
            <div class="playerMetaDesc">
                <div>
                    {{ $items[0]->description }}
                </div>
                <div class="playerMetaLegend">
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($items[0]->label as $chartlabel)
                        <div class="playerMetaLegendItem" id="label{{ $i }}" style="background-color: ">{{ $chartlabel }}</div>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </div>
            </div>
        </div>
	</div>
		<div class="timelineWrap">
			<div id="timelineNow{{ $items[0]->id }}" class="playerTimeText floatLeft"></div>
			<div id="timelineAll{{ $items[0]->id }}" class="playerTimeText floatRight"></div>
		</div>
	</div>

<div class="setsListWrap">
@foreach ($items as $item)
    <div data-itemid="{{ $item->id }}" class="setsListItem btn waves-effect waves-light">{{ $item->title }}</div>
@endforeach
</div>
</div>

<script>
var tagBox = $('.tagBox');
var slider = [];
var sliderValues = [];
var count = 0;
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

var sets = {
@foreach ($items as $item)
    {{ $item->id }}: [
        {
            "id": "{{ $item->id }}",
            "title": "{{ $item->title }}",
            "setlength": "{{ $item->setlength }}",
            "bpm": "{{ $item->bpm }}",
            "released": "{{ $item->released }}",
            "filename": "{{ $item->filename }}",
            "filetype": "{{ $item->filetype }}",
            "cover": "{{ $item->cover }}",
            "playlist": [
                @foreach ($item->playlist as $playlist)
                {
                    "title": "{{ $playlist->title }}",
                    "artist": "{{ $playlist->artist }}"
                },
                @endforeach
            ],
            "chartdata": [
            @foreach ($item->chart as $chart)
                {{ $chart }},
            @endforeach
            ],
            "chartlabel": [
            @foreach ($item->label as $label)
                '{{ $label }}',
            @endforeach
            ]
        }
    ],
@endforeach
}

const player = new Plyr('audio', {
    settings: ''
});
window.player = player;

$(document).ready(function() {
    renderChart([
        @foreach ($items[0]->chart as $chart)
            {{ $chart }},
        @endforeach
    ],
    [
        @foreach ($items[0]->label as $chartlabel)
            '{{ $chartlabel }}',
        @endforeach
    ]);
    @php
        $i = 0;
    @endphp
    @foreach ($items[0]->label as $chartlabel)
        $('#label{{ $i }}').css('background-color', ChartBackgroundColor[{{ $i }}])
        @php
            $i++;
        @endphp
    @endforeach

    tagBox.each(function (index, el) {
        var tag = {tagid: $(el).data('id'), tagvalue: parseInt(el.noUiSlider.get())};
        sliderValues.push(tag);
    });
    getJSON(sliderValues);

    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems);
});

$('.setsListWrap').on('click', '.setsListItem', function () {
    var id = $(this).data('itemid');

    player.source = {
        type: 'audio',
        sources: [
            {
                src: '{{ url('/') }}/enjoy/'+ sets[id][0].filename,
                type: 'audio/' + sets[id][0].filetype
            }]
    }
    player.autoplay = true;
    $('#playerCover').attr('src', '{{ url('/') }}/images/covers/' + sets[id][0].cover)
    $('.playerTitle').html(sets[id][0].title);
    $('.playerDataLength').html(sets[id][0].setlength);
    $('.playerDataBpm').html(sets[id][0].bpm);
    $('.playerDataReleased').html(sets[id][0].released);
    var html = '';
    for (var i=0; i<sets[id][0].playlist.length; i++) {
        html += '<li><b>' + sets[id][0].playlist[i].title + '</b> - ' + sets[id][0].playlist[i].artist + '</li>';
    }
    $('#playlistUl').html(html);
    renderChart(sets[id][0].chartdata, sets[id][0].chartlabel);
    var div = $('.playerMetaLegend');
    $(div).html('');
    for (var i = 0; i < sets[id][0].chartlabel.length; i++) {
        html = '<div class="playerMetaLegendItem" style="background-color: ' + ChartBackgroundColor[i] + '">' + sets[id][0].chartlabel[i] + '</div>';
        $(div).append(html);
    }
});

player.on('ready', event => {
    $('.overlay').css('display', 'none');
});


$('.fiterBackBtnWrap').on('click', function() {
    var div = $('.filterWrap');
    var dir = div.data('pos');
    var animate = anime({
        targets: '.filterWrap',
        top: dir,
        duration: 700,
        elasticity: 600
    });
    div.html('<svg class="icon30 icon-textcolor"><use xlink:href="#lense"></use></svg>');
});
$('.fiterResetBtnWrap').on('click', function() {
    tagBox.each(function (index, el) {
        el.noUiSlider.set(0);
    });
});
$('#openPlaylist').on('click', function() {
    var div = $('.playlist');
    div.css('display', 'block');
    var animate = anime({
        targets: '.playlist',
        width: '100%',
        height: '100%',
        duration: 1800,
        complete: function() {
            div.css('overflow', 'auto');
        }
    });
});
$('#closePlaylist').on('click', function() {
    var div = $('.playlist');
    div.css('overflow', 'hidden');
    var animate = anime({
        targets: '.playlist',
        width: '0%',
        height: '0%',
        duration: 1200,
        complete: function() {
            div.css('display', 'none');
        }
    });
});

$('.btnSearch').on('click', function(){
    var sliderValues = [];


    var animate = anime({
        targets: '.filterWrap',
        top: 0,
        duration: 700,
        elasticity: 600
    });
});

$('.fiterBtnWrap').on('click', function() {
    var sliderValues = [];
    var div = $('.filterWrap');
    if (div.visible(true) === true) {
         console.log('click')
        $(this).html('<svg class="icon30 icon-textcolor"><use xlink:href="#lense"></use></svg>');
        dir = div.data('pos');
        tagBox.each(function (index, el) {
            var tag = {tagid: $(el).data('id'), tagvalue: parseInt(el.noUiSlider.get())};
            sliderValues.push(tag);
        });
        $('.overlay').css('display','block');
        $('.fiterBackBtnWrap').css('display', 'none');
        $('.fiterResetBtnWrap').css('display', 'none');
        getJSON(sliderValues);
    } else {
        console.log('clack')
        $(this).html('<i class="fas fa-arrow-circle-right fa-3x icon-blue"></i>');
        $('.fiterBackBtnWrap').css('display', 'block');
        $('.fiterResetBtnWrap').css('display', 'block');
        div.data('pos', div.position().top);
        dir = 0;
    }
    var animate = anime({
        targets: '.filterWrap',
        top: dir,
        duration: 700,
        elasticity: 600
    });
});
$('.setFilter').on('click', function () {
    tagBox.each(function (index, el) {});
});

tagBox.each(function (index, el) {
	id = $(el).data('id');
	slider[count] = document.getElementById('tagBox' + id);
	noUiSlider.create(slider[count], {
		start: 0,
		connect: [true, false],
		orientation: 'vertical',
		direction: 'rtl',
		step: 1,
		tooltips: [false],
		range: {
			'min': 0,
			'max': 10
		}
	});
	count++;
});

function doFilter(values) {
	var i, html = '';
	console.log('values: ', values)
	if (typeof values === 'undefined' || values.length === 0) {
    	html = '<div><div class="icon-red floatLeft marginDefault"><i class="fas fa-frown fa-5x"></i></div><h3>Sorry, nix gefunden :(<br>Versuch es noch mal oder fordere mich heraus ein Set mit diesen Moods zu schaffen.</h3></div>'
	} else {
        for (i=0; i < values.length; i++) {
            html += '<div data-itemid="' + values[i][0].id + '" class="setsListItem btn waves-effect waves-light">' + values[i][0].title + '</div>';
        }
	}
	$('.setsListWrap').html(html);
}

function getJSON(values) {
	var url, apidata;
	url = 'http:{{ url('/') }}/api/sets/filter/';
	for (var i=0; i<values.length; i++) {
		url += values[i].tagid + ':' + values[i].tagvalue;
		if (values.length - 1 > i) url += '-';
	}
	console.log(url);
    $.ajax({
        type: 'GET',
        url: url,
        crossDomain: true,
        dataType: 'json',
        timeout: 10000,
        cache: true,
        async: true,
        success: function (data) {
			doFilter(data);
			$('.overlay').css('display','none');
        },
        error: function (errorThrown) {
        	console.warn('Ajax Request failed!', errorThrown);
        },
        complete: function () {
        }
    });
}


function renderChart(data, labels) {
    var ctx = document.getElementById("moods").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                label: '# of Votes',
                data: data,
                responsive: true,
                devicePixelRatio: 0.5,
                maintainAspectRatio: true,
                aspectRatio: 0.5,
                backgroundColor: ChartBackgroundColor,
                borderColor: ChartBorderColor,
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: false,
                fullWidth: false
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
            }
        }
    });
}

function renderLegend() {

}
</script>

@endsection

@section('nav')
    @component('components.nav', ['active' => '1', 'user' => $user])
    @endcomponent
@endsection
