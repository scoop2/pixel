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
        <div class="close"><i class="fas fa-times fa-lg"></i></div>
    </div>
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
                    <div class="playlists"><i class="fas fa-list-ol"></i></div>
					<a href="https://www.facebook.com/sharer/sharer.php?u=https://pixelmorph.de/sound/filter/{{ $items[0]->id }}" target="_blank"><i class="fab fa-facebook-square fa-fw playerSocialIconsPadding"></i></a>
					<a href="https://twitter.com/home?status=https://pixelmorph.de/sound/filter/{{ $items[0]->id }}" target="_blank"><i class="fab fa-twitter-square fa-fw playerSocialIconsPadding"></i></a>
					<a href="https://plus.google.com/share?url=https://pixelmorph.de/sound/filter/{{ $items[0]->id }}" target="_blank"><i class="fab fa-google-plus-square fa-fw playerSocialIconsPadding"></i></a>
				</div>
			</div>
		</div>
		<div class="playerWaveWrap">
            <audio crossorigin playsinline>
                <source src="enjoy/{{ $items[0]->filename }}" type="audio/mp3">
            </audio>
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
var sets = {};
var refreshIntervalId, easing, count = 0;
var playBtn = '<svg class="playerSVG icon60 icon-textcolor floatRight"><use xlink:href="#player-play"></use></svg>';
var playBtnAction = '<svg class="playerSVG icon60 icon-textcolor floatRight"><use xlink:href="#player-playaction"></use></svg>';
var pauseBtn = '<svg class="playerSVG icon60 icon-textcolor floatRight"><use xlink:href="#player-pause"></use></svg>';


const player = new Plyr('audio', {
    settings: ''
});
window.player = player;


$('.setsListWrap').on('click', '.setsListItem', function () {
    $('.overlay').css('display', 'block');
    var id = $(this).data('itemid');
    player.source = {
        type: 'audio',
        sources: [
            {
                src: 'enjoy/'+ sets[id][0].filename,
                type: 'audio/' + sets[id][0].filetype
            }]
    }
    player.autoplay = true;
    $('.playerTitle').html(sets[id][0].title);
    $('.playerDataLength').html(sets[id][0].setlength);
    $('.playerDataBpm').html(sets[id][0].bpm);
    $('.playerDataReleased').html(sets[id][0].released);
});

player.on('progress', event => {
   // const instance = event.detail.plyr;
   //console.log(player.buffered)
  // if (player.buffered === 1) {
    //   $('.overlay').css('display', 'none');
  // }
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
//$('.tooltipped').tooltip({enterDelay: 9000, exitDelay: 9000});

$('.fiterBtnWrap').on('click', function () {
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

sets = {
@foreach ($items as $item)
    {{ $item->id }}: [
        {
            "id": "{{ $item->id }}",
            "title": "{{ $item->title }}",
            "setlength": "{{ $item->setlength }}",
            "bpm": "{{ $item->bpm }}",
            "released": "{{ $item->released }}",
            "tags": "{{ $item->tags }}",
            "filename": "{{ $item->filename }}",
            "filetype": "{{ $item->filetype }}",
        }
    ],
@endforeach
}

</script>

@endsection
