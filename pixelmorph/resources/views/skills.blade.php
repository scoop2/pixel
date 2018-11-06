@extends('layouts.master') @section('content')
<div class="nav_skills_wrap">
    <div class="nav_skills_item">Skills</div>
    <div class="nav_skills_item">Vita</div>
    <div class="nav_skills_item">Wesensart</div>
</div>

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
