@extends('layouts.master')
@section('content')
	<h1>Sets Admin</h1>
    <div class="">
    <form action="" method="POST">
        <select>
		@foreach ($menu as $tag)
                <option value="{{ $tag->id }}">{{ $tag->title }}</option>

		@endforeach
        </select>

    </form>
    </div>

<script>
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
</script>
@endsection
