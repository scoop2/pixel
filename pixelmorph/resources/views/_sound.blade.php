@extends('layouts.master')
@section('content')

<div class="setsWrap">
<div class="audio-player">
  <div id="play-btn"></div>
  <div class="audio-wrapper" id="player-container" href="javascript:;">
    <audio id="player" ontimeupdate="initProgressBar()">
      <source src="enjoy/abc.ogg" type="audio/ogg">
    </audio>
  </div>
  <div class="player-controls scrubber">
    <p>Oslo <small>by</small> Holy Esque</p>
    <span id="seek-obj-container">
      <progress id="seek-obj" value="0" max="1"></progress>
    </span>
    <small style="float: left; position: relative; left: 15px;" id="start-time"></small>
    <small style="float: right; position: relative; right: 20px;" id="end-time"></small>
  </div>
  <div class="album-image" style="background-image: url(https://artistxite.ie/imgcache/album/005/161/005161476_500.jpg)"></div>
</div>
</div>
<hr>




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

//$(document).ready(function() {

function initProgressBar() {
  var player = document.getElementById('player');
  var length = player.duration
  var current_time = player.currentTime;

  // calculate total length of value
  var totalLength = calculateTotalValue(length)
  document.getElementById("end-time").innerHTML = totalLength;

  // calculate current value time
  var currentTime = calculateCurrentValue(current_time);
  document.getElementById("start-time").innerHTML = currentTime;

  var progressbar = document.getElementById('seek-obj');
  progressbar.value = (player.currentTime / player.duration);
  progressbar.addEventListener("click", seek);

  if (player.currentTime == player.duration) {
    document.getElementById('play-btn').className = "";
  }

  function seek(event) {
    var percent = event.offsetX / this.offsetWidth;
    player.currentTime = percent * player.duration;
    progressbar.value = percent / 100;
  }
};

function initPlayers(num) {
  // pass num in if there are multiple audio players e.g 'player' + i

  for (var i = 0; i < num; i++) {
    (function() {

      // Variables
      // ----------------------------------------------------------
      // audio embed object
      var playerContainer = document.getElementById('player-container'),
        player = document.getElementById('player'),
        isPlaying = false,
        playBtn = document.getElementById('play-btn');

      // Controls Listeners
      // ----------------------------------------------------------
      if (playBtn != null) {
        playBtn.addEventListener('click', function() {
          togglePlay()
        });
      }

      // Controls & Sounds Methods
      // ----------------------------------------------------------
      function togglePlay() {
        if (player.paused === false) {
          player.pause();
          isPlaying = false;
          document.getElementById('play-btn').className = "";

        } else {
          player.play();
          document.getElementById('play-btn').className = "pause";
          isPlaying = true;
        }
      }
    }());
  }
}

function calculateTotalValue(length) {
  var minutes = Math.floor(length / 60),
    seconds_int = length - minutes * 60,
    seconds_str = seconds_int.toString(),
    seconds = seconds_str.substr(0, 2),
    time = minutes + ':' + seconds

  return time;
}

function calculateCurrentValue(currentTime) {
  var current_hour = parseInt(currentTime / 3600) % 24,
    current_minute = parseInt(currentTime / 60) % 60,
    current_seconds_long = currentTime % 60,
    current_seconds = current_seconds_long.toFixed(),
    current_time = (current_minute < 10 ? "0" + current_minute : current_minute) + ":" + (current_seconds < 10 ? "0" + current_seconds : current_seconds);

  return current_time;
}

initPlayers($('#player-container').length);



//		});
</script>

@endsection
