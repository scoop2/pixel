@extends('layouts.master') @section('content')
@component('components.navskills', ['active' => 'skills'])
@endcomponent

<div class="containerContent">

	{!! $desc->body !!}

	<ul>
		@foreach ($skillcats as $cat)
		<li>
			<div class="skill-cat-head">{{ $cat['title'] }}</div>
			<ul>
				@foreach ($cat['items'] as $item)
				<li>{{ $item }}</li> @endforeach
			</ul>
		</li> @endforeach
	</ul>

</div>

@endsection
