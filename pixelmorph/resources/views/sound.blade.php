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


<div>{!! html_entity_decode($desc->body) !!}</div>
<div class="playerWrapOuter">
    <div class="playlist z-depth-2" id="playlistid">
        <div class="close" data-id=""><i class="fas fa-times fa-lg"></i></div>
    </div>
	<div id="player" data-id="" class="playerWrap">
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
                    <div class="playlists" data-id="{{ $items[0]->id }}"><i class="fas fa-list-ol"></i></div>
					<a href="https://www.facebook.com/sharer/sharer.php?u=https://pixelmorph.de/sets/filter/{{ $items[0]->id }}" target="_blank"><i class="fab fa-facebook-square fa-fw playerSocialIconsPadding"></i></a>
					<a href="https://twitter.com/home?status=https://pixelmorph.de/sets/filter/{{ $items[0]->id }}" target="_blank"><i class="fab fa-twitter-square fa-fw playerSocialIconsPadding"></i></a>
					<a href="https://plus.google.com/share?url=https://pixelmorph.de/sets/filter/{{ $items[0]->id }}" target="_blank"><i class="fab fa-google-plus-square fa-fw playerSocialIconsPadding"></i></a>
				</div>
			</div>
		</div>
		<div class="playerBtnWrap">
            <div class="playerWaveformWrap">
			    <div id="waveform{{ $items[0]->id }}" class="playerWaveform" data-wave="{{ $items[0]->id }}"></div>
            </div>
			<div id="playerBtn{{ $items[0]->id }}" class="playerBtn" data-id="{{ $items[0]->id }}" data-job="stop" data-track="{{ $items[0]->filename }}" data-title="{{ $items[0]->title }}">
				<svg class="playerSVG icon60 icon-textcolor floatRight">
					<use xlink:href="#player-play"></use>
				</svg>
			</div>
		</div>
	</div>
		<div class="timelineWrap">
			<div id="timelineNow{{ $items[0]->id }}" class="playerTimeText floatLeft"></div>
			<div id="timelineAll{{ $items[0]->id }}" class="playerTimeText floatRight"></div>
		</div>
		<div class="clear"></div>
		<div class="tagWrapper">{!! $items[0]->tags !!}</div>
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
var id, dir, easing, count = 0;
var playBtn = '<svg class="playerSVG icon60 icon-textcolor floatRight"><use xlink:href="#player-play"></use></svg>';
var playBtnAction = '<svg class="playerSVG icon60 icon-textcolor floatRight"><use xlink:href="#player-playaction"></use></svg>';
var pauseBtn = '<svg class="playerSVG icon60 icon-textcolor floatRight"><use xlink:href="#player-pause"></use></svg>';
var sound = new Howl({
    buffer: true,
    src: ['enjoy/{{ $items[0]->filename }}'],
    html5: true,
});


sound.on('play', function(){
    $('.overlay').css('display', 'hidden');
    setInterval(function(){
        var perc = (sound.seek() / sound._duration) * 100;
        $('.playerWaveform').css('width', perc + '%' );
    }, 500);
});
sound.on('stop', function(){
  //  $('.playerBtn').html(playBtn);
});
sound.on('pause', function(){
  //  $('.playerBtn').html(pauseBtn);
});
sound.on('load', function(){
  //  $('.overlay').css('display', 'block');
    $('.overlay').css('display', 'none');
});


$('.playerBtn').on('click', function(){
    if (sound.playing() === false) {
    $('.playerBtn').html(pauseBtn);
      //     $('.overlay').css('display', 'block');

        sound.play();
        $('.playerBtn').html(pauseBtn);
    } else {
        $('.overlay').css('display', 'hidden');
        sound.pause();
        $('.playerBtn').html(playBtn);
    }


});
$('.playerWaveformWrap').on('click', function(e) {
    var tmp, posX, perc, step;
    tmp = $(this).offset().left;
    posX = (e.pageX - tmp);
    //perc = 100 - (posX / $(this).width()) * 100;
    perc = (posX / $(this).width()) * 100;
    step = (sound._duration / 100) * perc;
    sound.seek(step)
    $('.playerWaveform').css('width', perc + '%');
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

$('.setsListItem').on('click', function () {
    id = $(this).data('itemid');
    sound.stop();
    sound.unload();
    sound._src = ['enjoy/' + sets[id][0].filename];
    sound.load();





   // sound.urls = 'enjoy/' + sets[id][0].filename;
    $('.playerTitle').html(sets[id][0].title);
    $('.playerDataLength').html(sets[id][0].setlength);
    $('.playerDataBpm').html(sets[id][0].bpm);
    $('.playerDataReleased').html(sets[id][0].released);
    $('.playerBtn').trigger('click');
    /*
    var div = $('.playerWrapOuter');
    var dir = div.data('pos');
    var animate = anime({
        targets: '.playerWrapOuter',
        top: dir,
        duration: 700,
        elasticity: 600
    });
    */
});

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

var sets = {
@foreach ($items as $item)
    {{ $item->id }}: [
        {
            "id": "{{ $item->id }}",
            "title": "{{ $item->title }}",
            "setlength": "{{ $item->setlength }}",
            "bpm": "{{ $item->bpm }}",
            "released": "{{ $item->released }}",
            "tags": "{{ $item->tags }}",
            "filename": "{{ $item->filename }}"
        }
    ],
@endforeach
}

</script>

@endsection
