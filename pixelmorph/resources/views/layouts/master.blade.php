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

<?php
include (public_path() . '/images/icons.svg');
?>

<div class="wrap">
<!--
		@component('components.nav')
		@endcomponent
-->
		<div class="wrapInner">
			<div class="left allHeight">
				<div id="particles-left"></div>
			</div>

			<div class="main">
				<div class="mid allHeight">
					<div class="content">
					<noscript>
					<div class="noScriptAlert">
						<svg class="icon40 icon-red floatLeft marginDefault"><use xlink:href="#icon-alert"></use></svg>
						<b>Sry, die Seite wird nur mit Javascript nutzbar sein.</b>
						  <br>
						  Es gibt viele gute Gründe ohne Javascript zu surfen. Ein gesundes Bedürfnis nach Sicherheit und Schutz der eigenen Privatspähre dürften wohl die wichtigsten sein. 
						  Doch dies ist lediglich der Spielplatz eines Frontend-Webentwicklers ohne für Dich relavante Inhalte die keiner Barrierefreiheit bedürfen. Eine javascriptfreie Version ist nicht vorgesehen. Deshalb geht es für Dich nun nicht mehr weiter so lange Javascript deaktiviert bleibt.
					</div>
					</noscript>
					@yield('content')
					</div>
					<div class="contentMask"></div>
				</div>
			</div>

			<div class="right allHeight">
				<div id="particles-right"></div>
			</div>
		</div>
	</div>

<script>

</script>

</body>
</html>
