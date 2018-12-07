@extends('layouts.master')
@section('content')
<div class="containerContent">
<h1>Admin</h1>

  <ul class="collapsible">
  @foreach ($pages as $page)
    <li>
    <div class="collapsible-header">{{ $page->title }}</div>
    <div class="collapsible-body">
    <form action="{{ url('/admin/update') }}" method="POST" class="col s12">
        <div class="row">
            <div class="input-field col s12">
                <input id="title" name="title" value="{{ $page->title }}" type="text">
                <label for="title">Title</label>
            </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea id="textarea2" name="text" class="materialize-textarea" data-length="120">{{ $page->body }}</textarea>
            <label for="textarea2"></label>
          </div>
        </div>
        <input type="hidden" name="id" value="{{ $page->id }}">
        <input type="submit" value="Abschicken" class="btnSubmit btn">
        {{ csrf_field() }}
    </form>
    </div>
    </li>
@endforeach
  </ul>
  <pre>

</pre>
<script>


/*
$('.btnSubmit').on('click', function(e){
console.log(e)
$("form").submit(function(){
        alert("Submitted");
    });
});
*/

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems);
  });
</script>

</div>
@endsection
