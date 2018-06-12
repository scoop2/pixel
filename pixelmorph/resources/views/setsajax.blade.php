@extends('layouts.master') 
@section('content')

<div class="filterWrap">
	<div class="filterSwitchWrap">
		@foreach ($tags as $key => $tag)
			<div class="tagBoxWrap">
				<div class="tagTitle">{{ $tag->title }}</div>
				<div id="tagBox{{ $tag->id }}" class="tagBox" data-id="{{ $tag->id }}"></div>
			</div>
		@endforeach
	</div>
</div>
<div class="fiterBtnWrap">
	<svg class="icon40 icon-textcolor"><use xlink:href="#lense"></use></svg>
</div>

<div class="setsWrap">
<ul>
@foreach ($items as $key => $item)
<li>
	<div class="playerWrapOuter">
	<div id="player{{ $item->id }}" data-id="{{ $item->id }}" class="playerWrap">
		<div class="titleWrap">
			<div id="setTitleInner{{ $item->id }}" class="playerTitle floatLeft">{{ $item->title }}</div>
			<div class="playerDate floatRight">{{ $item->setlength }}<span class="playerDateSmall">min</span> {{ $item->bpm }}<span class="playerDateSmall">BPM (&Oslash;)</span> {{ $item->released }}</div>
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
			<div id="timelineNow{{ $item->id }}" class="floatLeft"></div>
			<div id="timelineAll{{ $item->id }}" class="floatRight"></div>
		</div>
		<div class="clear"></div>
		<div class="tagWrapper">{!! $item->tags !!}</div>
	</div>
</li>
@endforeach
</ul>
</div>

<script>
//var peaks = [0.11818811506032943,0.10820856153964996,0.1608224755525589,0.13585833668708802,0.14040558993816377,0.1290221905708313,0.12185033619403839,0.16021210908889771,0.08992797344923019,0.061240578293800356,0.11708945244550704,0.046286506801843645,0.05321420937776566,0.07506546586751937,0.25930571019649507,0.12294900625944137,0.16048676729202271,0.11467848926782608,0.12691641062498094,0.09780175447463989,0.15065980911254884,0.09932767808437347,0.1374758130311966,0.14898129761219026,0.17248054802417756,0.15731284976005555,0.33880643010139466,0.11760826617479324,0.12517685651779176,0.16387432277202607,0.24249000310897828,0.1689404046535492,0.13308114767074586,0.12792352050542832,0.20531846046447755,0.11458692908287048,0.186458016037941,0.1846879518032074,0.138543958067894,0.03960295416414738,0.038229622170329096,0.11138248652219772,0.15111758768558503,0.15099551737308503,0.12734367161989213,0.104576857984066,0.06096591264009476,0.054892728328704836,0.08300027459859848,0.0500402843952179,0.2089501565694809,0.13936796247959138,0.13552262842655183,0.18401653528213502,0.15999847114086152,0.08666249573230743,0.09532975614070892,0.06288857594132423,0.046286506801843645,0.15731284976005555,0.12743522435426713,0.13369152158498765,0.14806574046611787,0.10891048818826675,0.0381075481325388,0.1621958112716675,0.09023316413164138,0.15825892448425294,0.2820114886760712,0.07634724140167236,0.11467848926782608,0.120812708735466,0.03807702869176865,0.03133243903517723,0.16717032551765443,0.06645924434065818,0.11092470794916152,0.1779738759994507,0.12352885514497756,0.07912442296743392,0.16045624971389771,0.15636677503585816,0.23074037790298463,0.2322968190908432,0.7969808077812195,0.1771498715877533,0.16439313650131226,0.15007996022701264,0.11757774859666824,0.05681539535522461,0.14260293006896974,0.12737418919801713,0.1468755102157593,0.04256325051188469,0.03703939937055111,0.03633747458457947,0.04024384379386902,0.09944974839687347,0.13875759601593018,0.0727155378460884,0.1290527081489563,0.14306070864200593,0.19100528419017793,0.1940266138315201,0.13228766828775407,0.0970998278260231,0.17870632767677308,0.24752555251121522,0.20519639015197755,0.1306396669149399,0.13393566966056825,0.09429212123155593,0.11415967553853988,0.07064027920365333,0.1544746255874634,0.153375962972641,0.11956145077943801,0.04906369209289551,0.03175969816744328,0.0733564293384552,0.06240027979016304,0.10772026538848876,0.10994811564683914,0.13567521631717683,0.11074160248041152,0.11162663459777832,0.18368084192276002,0.09603167533874511,0.10772026538848876,0.1295410043001175];
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
});

$('.fiterBtnWrap').on('click', function () {
	var sliderValues = [];
	var div = $('.filterWrap');
	if (div.visible() === true) {
		dir = div.data('pos');
		tagBox.each(function (index, el) {
			var tag = {tagid: $(el).data('id'), tagvalue: parseInt(el.noUiSlider.get())};
			sliderValues.push(tag);
		});
		getJSON(sliderValues);
	} else {
		div.data('pos', div.position().top);
		dir = 0;
	}
	var animate = anime({
		targets: '.filterWrap',
		top: dir,
		duration: 700,
		elasticity: 600
	});


//console.log(sliderValues)

});

$('.setFilter').on('click', function () {
	tagBox.each(function (index, el) {});
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
	var ldgBtnSvg = '<svg class="playerSVG icon60 icon-textcolor floatRight xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-ripple" style="background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%;"><circle cx="50" cy="50" r="0" fill="none" ng-attr-stroke="@{{config.c1}}" ng-attr-stroke-width="@{{config.width}}" stroke="#e15b64" stroke-width="6"><animate attributeName="r" calcMode="spline" values="0;48" keyTimes="0;1" dur="1.5" keySplines="0 0.2 0.8 1" begin="-0.75s" repeatCount="indefinite"></animate><animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="1.5" keySplines="0.2 0 0.8 1" begin="-0.75s" repeatCount="indefinite"></animate></circle><circle cx="50" cy="50" r="0" fill="none" ng-attr-stroke="@{{config.c2}}" ng-attr-stroke-width="@{{config.width}}" stroke="#f47e60" stroke-width="6"><animate attributeName="r" calcMode="spline" values="0;48" keyTimes="0;1" dur="1.5" keySplines="0 0.2 0.8 1" begin="0s" repeatCount="indefinite"></animate><animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="1.5" keySplines="0.2 0 0.8 1" begin="0s" repeatCount="indefinite"></animate></circle></svg><div class="ldgMsg">Preparing the set <i>' + title + '</i> ...</div>';

	$('#playerBtn' + id).html(ldgBtnSvg);

	openplayers.forEach(function (el) {
		tmp = parseInt(el.container.getAttribute("data-wave"));
		if (tmp === id) self = true;
		el.stop();
		$('#waveform' + tmp).html('');
		$('#timelineAll' + tmp).html('');
		$('#timelineNow' + tmp).html('');
/*
		var animate = anime({
			loop: false
		});
		animate.add([
			{
				targets: '#playerBtn' + tmp,
				width: 8,
				offset: 0
			}
		]);
	*/
		var animate = anime({
			targets: '#playerBtn' + tmp,
			width: 8,
			duration: 850,
			elasticity: 190,
		//	easing: 'quart',
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
			backend: 'MediaElement',
			height: 60,
			responsive: true,
			waveColor: 'violet',
			progressColor: 'purple',
			hideScrollbar: true,
			cursorWidth: 0
		});
		wavesurfer.load('./music/' + track);
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
			$('#playerBtn' + id).html(stpBtnSvg);
			$('.playerBtn').bind('click', function () {
				doPlayers(this);
			});
			time = wavesurfer.getDuration();
			minutes = Math.floor(time / 60);
			seconds = parseInt(time - minutes * 60);
			$('#timelineAll' + id).html(minutes + ':' + seconds);
		});

		wavesurfer.on('audioprocess', function () {
			time = parseInt(wavesurfer.getCurrentTime());
			hours = Math.floor(time / 3600);
			minutes = Math.floor((time - (hours * 3600)) / 60);
			seconds = time - (hours * 3600) - (minutes * 60);
			if (hours < 10) hours = "0" + hours;
			if (minutes < 10) minutes = "0" + minutes;
			if (seconds < 10) seconds = "0" + seconds;
			$('#timelineNow' + id).html(hours + ':' + minutes + ':' + seconds)
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

function doFilter(data) {
var html;

html = '<ul>';
for (var i=0; i<data.length; i++) {
	html += '<li>' +
	'<div class="playerWrapOuter">' +
	'<div id="player'+ data[i][0].id + '" data-id="'+ data[i][0].id + '" class="playerWrap">' +
		'<div class="titleWrap">' +
			'<div id="setTitleInner'+ data[i][0].id + '" class="playerTitle floatLeft">'+ data[i][0].title + '</div>' +
			'<div class="playerDate floatRight">'+ data[i][0].setlength + '<span class="playerDateSmall">min</span> '+ data[i][0].bpm + '<span class="playerDateSmall">BPM (&Oslash;)</span> '+ data[i][0].released + '</div>' +
		'</div>' +
		'<div class="clear"></div>' +
		'<div class="playerBtnWrap">' +
			'<div id="waveform'+ data[i][0].id + '" class="waveform" data-wave="'+ data[i][0].id + '"></div>' +
			'<div id="playerBtn'+ data[i][0].id + '" class="playerBtn" data-id="'+ data[i][0].id + '" data-job="stop" data-track="'+ data[i][0].filename + '" data-title="'+ data[i][0].title + '">' +
				'<svg class="playerSVG icon60 icon-textcolor floatRight">' +
					'<use xlink:href="#player-play"></use>' +
				'</svg>' +
			'</div>' +
		'</div>' +
	'</div>' +
		'<div class="timelineWrap">' +
			'<div id="timelineNow'+ data[i][0].id + '" class="floatLeft"></div>' +
			'<div id="timelineAll'+ data[i][0].id + '" class="floatRight"></div>' +
		'</div>' +
		'<div class="clear"></div>' +
		'<div class="tagWrapper"></div>' +
	'</div>' +
'</li>'
}
html += '</ul>';
$('.setsWrap').html(html);
}

function getJSON(values) {
	var url, apidata;
	url = 'http:{{ url('/') }}/api/sets/filter/';
	for (var i=0; i<values.length; i++) {
		url += values[i].tagid + ':' + values[i].tagvalue;
		if (values.length - 1 > i) url += '.'; 
	}
	
    $.ajax({
        type: 'GET',
        url: url,
        crossDomain: true,
        dataType: 'json',
        timeout: 10000,
        cache: true,
        async: false,
        success: function (data) {
			doFilter(data);
        },
        error: function (errorThrown) {
        	console.warn(errorThrown);
        },
        complete: function () {
        }
    });
}
	
</script>

@endsection
