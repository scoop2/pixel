@extends('layouts.master')
@section('content')

<!--
<div class="playerWrap">
  <div id="title">
    <span id="track"></span>
    <div id="timer">0:00</div>
    <div id="duration">0:00</div>
  </div>


  <div class="controlsOuter">
    <div class="controlsInner">
      <div id="loading"></div>
      <div class="btn" id="playBtn"></div>
      <div class="btn" id="pauseBtn"></div>
      <div class="btn" id="prevBtn"></div>
      <div class="btn" id="nextBtn"></div>
    </div>
    <div class="btn" id="playlistBtn"></div>
    <div class="btn" id="volumeBtn"></div>
  </div>


  <div id="waveform"></div>
  <div id="bar"></div>
  <div id="progress"></div>


  <div id="playlist">
    <div id="list"></div>
  </div>


  <div id="volume" class="fadeout">
    <div id="barFull" class="bar"></div>
    <div id="barEmpty" class="bar"></div>
    <div id="sliderBtn"></div>
</div>
</div>

<hr>
-->



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

	<div class="playerWrapOuter">
    <div class="playlist z-depth-2" id="playlistid">
        <div class="close" data-id=""><i class="fas fa-times fa-lg"></i></div>
    </div>
	<div id="player" data-id="" class="playerWrap">
		<div class="titleWrap">
			<div id="track" class="playerTitle floatLeft"></div>
			<div class="playerDate floatRight">
				{{ $items[0]->setlength }}<span class="playerDateSmall">min</span> {{ $items[0]->bpm }}<span class="playerDateSmall">BPM (&Oslash;)</span> {{ $items[0]->released }}
				<div class="playerSocialIcons">
                    <div class="playlists" data-id="{{ $items[0]->id }}"><i class="fas fa-list-ol"></i></div>
					<a href="https://www.facebook.com/sharer/sharer.php?u=https://pixelmorph.de/sets/filter/{{ $items[0]->id }}" target="_blank"><i class="fab fa-facebook-square fa-fw playerSocialIconsPadding"></i></a>
					<a href="https://twitter.com/home?status=https://pixelmorph.de/sets/filter/{{ $items[0]->id }}" target="_blank"><i class="fab fa-twitter-square fa-fw playerSocialIconsPadding"></i></a>
					<a href="https://plus.google.com/share?url=https://pixelmorph.de/sets/filter/{{ $items[0]->id }}" target="_blank"><i class="fab fa-google-plus-square fa-fw playerSocialIconsPadding"></i></a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="playerBtnWrap">
			<div id="waveform{{ $items[0]->id }}" class="waveform" data-wave="{{ $items[0]->id }}"></div>
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

</div>
</div>
</div>



<script>

var playBtn = '<svg class="playerSVG icon60 icon-textcolor floatRight"><use xlink:href="#player-play"></use></svg>';
var pauseBtn = '<svg class="playerSVG icon60 icon-textcolor floatRight"><use xlink:href="#player-pause"></use></svg>';
var sound = new Howl({
  src: ['enjoy/autopahn.mp3'],
  html5: true,
});



sound.on('play', function(){
    setInterval(function(){
        var perc = (sound.seek() / sound._duration) * 100;
        $('.playerBtn').css('width', perc + '%' );
    }, 500);
});

sound.on('load', function(){
    $('.overlay').css('display', 'none');
});




$('.playerBtn').click(function(){
    if (sound.playing() === false) {
        if (sound._state != 'loaded') {
            $('.overlay').css('display', 'block');
        }
        sound.play();
        $('.playerBtn').html(playBtn);
    } else {
        sound.pause();
        $('.playerBtn').html(pauseBtn);
    }
});

$('.playerBtnWrap').click(function(e) {
    var tmp, posX, perc, step;
    tmp = $(this).offset().left;
    posX = (e.pageX - tmp);
    perc = 100 - (posX / $(this).width()) * 100;
    step = (sound._duration / 100) * perc;
    sound.seek(step)
    $('.playerBtn').css('width', perc + '%');
});

</script>

@endsection
