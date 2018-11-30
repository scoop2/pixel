<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">
<meta name="description" content="Pixelmorph"/>
<meta name="keywords" content="Pixelmorph"/>
<link rel="icon" type="image/png" sizes="32x32" href="{{ url('/') }}/images/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="{{ url('/') }}/images/favicon/favicon-16x16.png">
<link rel="stylesheet" href="{{ url('/') }}/css/styles.css">
<title>Pixelmorph</title>
</head>

<body>
<script type="text/javascript" src="{{ url('/') }}/js/build.js"></script>

<div class="containerContent">

<div class="z-depth-3">
	<div class="">
		@foreach ($tags as $key => $tag)
			<div class="">
				<div class="">{{ $tag->title }}</div>
				<div id="tagBox{{ $tag->id }}" class="tagBox" data-id="{{ $tag->id }}"></div>
			</div>
		@endforeach
		<div class=""></div>
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
			'max': 200
		}
	});
	count++;
});
</script>
</body>

