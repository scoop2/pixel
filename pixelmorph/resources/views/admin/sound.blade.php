@extends('layouts.master')

@section('content')
@component('components.navadmin', ['active' => 'sound'])
@endcomponent
<div class="containerContent">

<pre>
<?php
  // echo var_dump($sets);
    //exit;
?>
</pre>
  <ul class="collapsible">
  @foreach ($sets as $set)
    <li>
    <div class="collapsible-header">{{ $set->title }}</div>
    <div class="collapsible-body">
    <form action="{{ url('/admin/sound') }}" method="POST" class="col s12">
        <div class="row">
            <div class="input-field col s8">
                <input id="title" name="title" value="{{ $set->title }}" type="text">
                <label for="title">Title</label>
            </div>
            <div class="input-field col s2">
                <input id="setlength" name="setlength" value="{{ $set->setlength }}" type="text">
                <label for="setlength">Länge</label>
            </div>
            <div class="input-field col s2">
                <input id="bpm" name="icon" value="{{ $set->bpm }}" type="text">
                <label for="icon">BPM</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s10">
                <input id="filename" name="filename" value="{{ $set->filename }}" type="text">
                <label for="icon">Filename</label>
            </div>
            <div class="input-field col s2">
                <input id="filetype" name="filetype" value="{{ $set->filetype }}" type="text">
                <label for="filetype">Filetype</label>
            </div>
        </div>
        <div>
            <div class="input-field col s6">
                <textarea id="textarea" name="description" class="materialize-textarea" data-length="120">{{ $set->description }}</textarea>
                <label for="textarea">Beschreibung</label>
            </div>
        </div>
        <div class="row tagstore">
        @foreach ($set->tagbag as $tagbag)
        <div class="input-field col s3">
            <select name="skillscat">
                @foreach ($alltags as $settag)
                    @if ($tagbag->tagid == $settag->id)
                        @php
                            $selected = ' selected';
                        @endphp
                    @else
                        @php
                            $selected = '';
                        @endphp
                    @endif
                <option value="{{ $settag->id }}"{{ $selected }}>{{ $settag->title }}</option>
                @endforeach
            </select>
        </div>
        @endforeach
        <div class="input-field col s3">
            <select name="newtag">
                <option value"nonewtag">neu</option>
                @foreach ($alltags as $settag)
                <option value="{{ $settag->id }}"{{ $selected }}>{{ $settag->title }}</option>
                @endforeach
            </select>
        </div>
        </div>
        <input type="hidden" name="id" value="{{ $set->id }}">
        <input type="submit" value="Abschicken" class="btnSubmit btn">
        {{ csrf_field() }}
    </form>
    </div>
    </li>
@endforeach
  </ul>
<script>



$('#addTag').on('click', function(e){
    var html = '<select>' +
    <?php
    foreach ($alltags[0] as $settag) {
        echo '\'<option value="">'.$settag.'</option>\' +';
    }
    echo '\'</select>\';';
    ?>

$('.tagstore').html(html);
});


  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems);
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });
</script>

</div>
@endsection
@section('nav')
    @component('components.nav', ['user' => $user])
    @endcomponent
@endsection
