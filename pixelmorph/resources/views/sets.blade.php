@extends('layouts.master')
@section('content')

<div class="setsWrap">
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
</div>
<div class="filterNav">
	<div class="fiterBtnWrap tooltipped" data-position="left" data-tooltip="Starte Suche nach Sets mit diesen Moods">
		<svg class="icon30 icon-textcolor"><use xlink:href="#lense"></use></svg>
	</div>
	<div class="fiterBackBtnWrap tooltipped" data-position="left" data-tooltip="Versteck mich wieder">
		<i class="fas fa-arrow-circle-up fa-3x icon-blue"></i>
	</div>
	<div class="fiterResetBtnWrap tooltipped" data-position="left" data-tooltip="Alle Moods auf Null zurück stellen">
		<i class="fas fa-arrow-circle-down fa-3x icon-blue"></i>
	</div>
</div>

<div class="setsWrap">
	<div>{!! html_entity_decode($desc->body) !!}</div>
	<div id="setsWrapList">
<ul>
@foreach ($items as $key => $item)
<li>
	<div class="playerWrapOuter">
    <div class="playlist z-depth-2" id="playlistid{{ $item->id }}">
        <div class="close" data-id="{{ $item->id }}"><i class="fas fa-times fa-lg"></i></div>
        {!! html_entity_decode($item->playlist) !!}
    </div>
	<div id="player{{ $item->id }}" data-id="{{ $item->id }}" class="playerWrap">
		<div class="titleWrap">
			<div id="setTitleInner{{ $item->id }}" class="playerTitle floatLeft">{{ $item->title }}</div>
			<div class="playerDate floatRight">
				{{ $item->setlength }}<span class="playerDateSmall">min</span> {{ $item->bpm }}<span class="playerDateSmall">BPM (&Oslash;)</span> {{ $item->released }}
				<div class="playerSocialIcons">
                    <div class="playlists" data-id="{{ $item->id }}"><i class="fas fa-list-ol"></i></div>
					<a href="https://www.facebook.com/sharer/sharer.php?u=https://pixelmorph.de/sets/filter/{{ $item->id }}" target="_blank"><i class="fab fa-facebook-square fa-fw playerSocialIconsPadding"></i></a>
					<a href="https://twitter.com/home?status=https://pixelmorph.de/sets/filter/{{ $item->id }}" target="_blank"><i class="fab fa-twitter-square fa-fw playerSocialIconsPadding"></i></a>
					<a href="https://plus.google.com/share?url=https://pixelmorph.de/sets/filter/{{ $item->id }}" target="_blank"><i class="fab fa-google-plus-square fa-fw playerSocialIconsPadding"></i></a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="playerBtnWrap">
			<div id="waveform{{ $item->id }}" class="waveform" data-wave="{{ $item->id }}"></div>
			<div id="playerBtn{{ $item->id }}" class="playerBtn" data-id="{{ $item->id }}" data-job="stop" data-track="{{ $item->filename }}" data-title="{{ $item->title }}">
				<svg class="playerSVG icon60 icon-textcolor floatRight">
					<use xlink:href="#player-play"></use>
				</svg>
			</div>
		</div>
	</div>
		<div class="timelineWrap">
			<div id="timelineNow{{ $item->id }}" class="playerTimeText floatLeft"></div>
			<div id="timelineAll{{ $item->id }}" class="playerTimeText floatRight"></div>
		</div>
		<div class="clear"></div>
		<div class="tagWrapper">{!! $item->tags !!}</div>
	</div>
</li>
@endforeach
</ul>
</div>
</div>
</div>

<script>
var openplayers = [];
var tagBox = $('.tagBox');
var slider = [];
var id, dir, easing, count = 0;

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

$(document).ready(function () {
	$('.playerBtn').on('click', function () {
		doPlayers(this);
	});

	$('.playlists').on('click', function() {
		var div = $(this);
        var id = div.data('id');
        $('#playlistid' + id).css('display', 'block');
        console.log(div.data('id'))
               // console.log(div.css())
        var animate = anime({
			targets: '#playlistid' + id,
			'max-width': '100%',
			duration: 300,
            easing: 'easeInOutQuad'
		});
	});

	$('.close').on('click', function() {
		var div = $(this);
        var id = div.data('id');
      //  $('#playlistid' + id).css('display', 'block');
        console.log(div.data('id'))
               // console.log(div.css())
        var animate = anime({
			targets: '#playlistid' + id,
			'max-width': '0%',
			duration: 290,
            easing: 'easeInOutQuad'
		});
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
		$('.fiterBtnWrap').html('<svg class="icon30 icon-textcolor"><use xlink:href="#lense"></use></svg>');
	});

	$('.fiterResetBtnWrap').on('click', function() {
		tagBox.each(function (index, el) {
			el.noUiSlider.set(0);
		});
	});
	//$('.tooltipped').tooltip({enterDelay: 9000, exitDelay: 9000});

	$('.fiterBtnWrap').on('click', function () {
		var sliderValues = [];
		var div = $('.filterWrap');
		if (div.visible() === true) {
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
});

function doPlayers(el) {
	$('.playerBtn').off('click');
	var id = parseInt($(el).data('id'));
	var track = $(el).data('track');
	var title = $(el).data('title');
	var waveform = $('#waveform' + id);
	var allplayers = []
	var tmp, div, time, hours, minutes, seconds;
	var duration = 0;
	var self = false;
	var plyBtnSvg = '<svg class="playerSVG icon60 icon-textcolor floatRight"><use xlink:href="#player-play"></use></svg>';
	var stpBtnSvg = '<svg class="playerSVG icon60 icon-textcolor floatRight"><use xlink:href="#player-pause"></use></svg>';
	var ldgBtnSvg = '<svg class="playerSVG icon60 icon-textcolor floatRight xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130 130" preserveAspectRatio="xMidYMid" class="lds-ripple" style="background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%;"><circle cx="50" cy="50" r="0" fill="none" ng-attr-stroke="@{{config.c1}}" ng-attr-stroke-width="@{{config.width}}" stroke="#e15b64" stroke-width="6"><animate attributeName="r" calcMode="spline" values="0;48" keyTimes="0;1" dur="1.5" keySplines="0 0.2 0.8 1" begin="-0.75s" repeatCount="indefinite"></animate><animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="1.5" keySplines="0.2 0 0.8 1" begin="-0.75s" repeatCount="indefinite"></animate></circle><circle cx="50" cy="50" r="0" fill="none" ng-attr-stroke="@{{config.c2}}" ng-attr-stroke-width="@{{config.width}}" stroke="#f47e60" stroke-width="6"><animate attributeName="r" calcMode="spline" values="0;48" keyTimes="0;1" dur="1.5" keySplines="0 0.2 0.8 1" begin="0s" repeatCount="indefinite"></animate><animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="1.5" keySplines="0.2 0 0.8 1" begin="0s" repeatCount="indefinite"></animate></circle></svg><div class="ldgMsg">Preparing the set <i>' + title + '</i> ...</div>';

	//$('#playerBtn' + id).html(ldgBtnSvg);
	$('.overlay').css('display','block');

	openplayers.forEach(function (el) {
		tmp = parseInt(el.container.getAttribute("data-wave"));
		if (tmp === id) self = true;
		el.stop();
		$('#waveform' + tmp).html('');
		$('#timelineAll' + tmp).html('');
		$('#timelineNow' + tmp).html('');

		var easeInOutValues = ['easeInOutQuad', 'easeInOutCubic', 'easeInOutQuart', 'easeInOutQuint', 'easeInOutSine', 'easeInOutExpo', 'easeInOutCirc', 'easeInOutBack', 'easeInOutElastic'];
		var animate = anime({
			targets: '#playerBtn' + tmp,
			width: 8,
			duration: 650,
			//elasticity: 620,
			easing: function(target, index) {
    			return easeInOutValues[index];
  			},
			offset: 0
		});

		$('#playerBtn' + tmp).html(plyBtnSvg);
	});
	openplayers = [];

	if (self === false) {
		allplayers = $('.playerWrap');
		allplayers.each(function (index, el) {
			div = $(el);
			tmp = div.data('id');
			if (tmp != id) {
				div.find('.playerSVG').css({
					'opacity': '0.4',
					'cursor': 'not-allowed'
				})
			}
		});

		var animate = anime({
			targets: '#playerBtn' + id,
			width: $(el).closest('.playerWrap').width(),
			duration: 850,
			elasticity: 290
		});
		var wavesurfer = WaveSurfer.create({
			container: '#waveform' + id,
		//	backend: 'MediaElement',
            backend: 'WebAudio',
			height: 120,
            partialRender: true,
		//	responsive: true,
		//	hideScrollbar: false,
			cursorWidth: 0,
			waveColor: '#c9923d',
			progressColor: '#bd4f23',
		});
		wavesurfer.load('./enjoy/' + track);
		wavesurfer.on('ready', function () {
			wavesurfer.play();
			openplayers.push(wavesurfer);
			allplayers.each(function (index, el) {
				div = $(el);
				tmp = div.data('id');
				if (tmp != id) {
					div.find('.playerSVG').css({
						'opacity': '1',
						'cursor': 'pointer'
					})
				}
			});
			$('.overlay').css('display','none');
			$('#playerBtn' + id).html(stpBtnSvg);
			$('.playerBtn').bind('click', function () {
				doPlayers(this);
			});
			time = wavesurfer.getDuration();
			minutes = Math.floor(time / 60);
			seconds = parseInt(time - minutes * 60);
			$('#timelineAll' + id).html(minutes + ':' + seconds);
		});

wavesurfer.on('ready', function () {
var peak;
console.log(wavesurfer.backend.getPeaks(960));
});


		wavesurfer.on('audioprocess', function () {

			time = parseInt(wavesurfer.getCurrentTime());
			hours = Math.floor(time / 3600);
			minutes = Math.floor((time - (hours * 3600)) / 60);
			seconds = time - (hours * 3600) - (minutes * 60);
			if (hours < 10) hours = "0" + hours;
			if (minutes < 10) minutes = "0" + minutes;
			if (seconds < 10) seconds = "0" + seconds;
			$('#timelineNow' + id).html(hours + ':' + minutes + ':' + seconds);
		});

		/*
				var responsiveWave = wavesurfer.util.debounce(function () {
					wavesurfer.drawBuffer();
				}, 300);
				window.addEventListener('resize', responsiveWave);
		*/

	} else {
		$('.playerBtn').bind('click', function () {
			doPlayers(this);
		});
	}
}

function doFilter(values) {
	var i, html;
	console.log(values)
	if (typeof values === 'undefined' || values.length === 0) {
    	html = '<div><div class="icon-red floatLeft marginDefault"><i class="fas fa-frown fa-5x"></i></div><h3>Sorry, nix gefunden :(<br>Versuch es noch mal oder fordere mich heraus ein Set mit diesen Moods zu schaffen.</h3></div>'
	} else {

	html = '<ul>';
	for (i=0; i < values.length; i++) {
		html += '<li>' +
		'<div class="playerWrapOuter">' +
		'<div id="player' + values[i][0].id + '" data-id="' + values[i][0].id + '" class="playerWrap">' +
			'<div class="titleWrap">' +
				'<div id="setTitleInner' + values[i][0].id + '" class="playerTitle floatLeft">' + values[i][0].title + '</div>' +
				'<div class="playerDate floatRight">' +
				values[i][0].setlength + '<span class="playerDateSmall">min</span> ' + values[i][0].bpm + '<span class="playerDateSmall">BPM (&Oslash;)</span> ' + values[i][0].released +
					'<div class="playerSocialIcons">' +
						'<a href="https://www.facebook.com/sharer/sharer.php?u=https://pixelmorph.de/sets/filter/' + values[i][0].id + '" target="_blank"><i class="fab fa-facebook-square fa-fw playerSocialIconsPadding"></i></a>' +
						'<a href="https://twitter.com/home?status=https://pixelmorph.de/sets/filter/' + values[i][0].id + '" target="_blank"><i class="fab fa-twitter-square fa-fw playerSocialIconsPadding"></i></a>' +
						'<a href="https://plus.google.com/share?url=https://pixelmorph.de/sets/filter/' + values[i][0].id + '" target="_blank"><i class="fab fa-google-plus-square fa-fw playerSocialIconsPadding"></i></a>' +
					'</div>' +
				'</div>' +
			'</div>' +
			'<div class="clear"></div>' +
			'<div class="playerBtnWrap">' +
				'<div id="waveform' + values[i][0].id + '" class="waveform" data-wave="' + values[i][0].id + '"></div>' +
				'<div id="playerBtn' + values[i][0].id + '" class="playerBtn" data-id="' + values[i][0].id + '" data-job="stop" data-track="' + values[i][0].filename + '" data-title="' + values[i][0].title + '">' +
					'<svg class="playerSVG icon60 icon-textcolor floatRight">' +
						'<use xlink:href="#player-play"></use>' +
					'</svg>' +
				'</div>' +
			'</div>' +
		'</div>' +
			'<div class="timelineWrap">' +
				'<div id="timelineNow' + values[i][0].id + '" class="playerTimeText floatLeft"></div>' +
				'<div id="timelineAll' + values[i][0].id + '" class="playerTimeText floatRight"></div>' +
			'</div>' +
			'<div class="clear"></div>' +
			'<div class="tagWrapper">tags</div>' +
		'</div>' +
	'</li>';
	}
	html += '</ul>';
	}
	$('#setsWrapList').html(html);
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

</script>

@endsection
