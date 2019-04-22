@extends('layouts.admin')

@section('content')
@component('components.navadmin', ['active' => 'wg'])
@endcomponent
<div class="containerContent">

@if (isset($msg))
<div class="row">
    <div class="col s12">
        <div class="card {{ $modalclass }}">
            <div class="card-content white-text">
                <p>{!! $msg !!}</p>
            </div>
        </div>
    </div>
</div>
@endif

<ul class="collapsible">
    <li>
        <div class="collapsible-header">neu</div>
        <div class="collapsible-body">
        <form action="{{ url('/admin/wg/insert') }}" method="POST" class="col s12">
            <div class="row">
                <div class="input-field col s3">
                    <input id="title" name="title" type="text">
                    <label for="title">Title</label>
                </div>
                <div class="input-field col s3">
                    <input id="url" name="url" type="text" value="{{ $newurl }}">
                    <label for="url">Url</label>
                </div>
                <div class="input-field col s3">
                    <input id="email" name="email" type="text">
                    <label for="url">Email</label>
                </div>
                <div class="switch col s3">
                    <b>Aktiv</b><br>
                    <label>
                    Off
                    <input name="active" type="checkbox" checked>
                    <span class="lever"></span>
                    On
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <textarea id="content" name="content" class="materialize-textarea" data-length="120"></textarea>
                <label for="content"></label>
                </div>
            </row>
            <input type="submit" value="Abschicken" class="btnSubmit btn">
            {{ csrf_field() }}
        </form>
        </div>
    </li>
    @foreach ($items as $item)
    <li>
    <div class="collapsible-header">{{ $item->title }}</div>
    <div class="collapsible-body">
    <form action="{{ url('/admin/wg') }}" method="POST" class="col s12">
        <div class="row">
            <div class="input-field col s3">
                <input id="title" name="title" value="{{ $item->title }}" type="text">
                <label for="title">Title</label>
            </div>
            <div class="input-field col s3">
                <input id="url" name="url" value="{{ $item->url }}" type="text">
                <label for="url">Title</label>
            </div>
            <div class="input-field col s3">
                <input id="email" name="email" value="{{ $item->email }}" type="text">
                <label for="email">Email</label>
            </div>
            <div class="switch col s3">
                <b>Aktiv</b><br>
                <label>
                Off
                @if ($item->active == 1)
                    @php
                        $checked = ' checked';
                    @endphp
                @else
                    @php
                        $checked = '';
                    @endphp
                @endif
                <input name="active" type="checkbox"{{ $checked }}>
                <span class="lever"></span>
                On
                </label>
            </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea id="content" name="content" class="materialize-textarea" data-length="120">{{ $item->content }}</textarea>
            <label for="content"></label>
          </div>
        </div>
        <input type="hidden" name="id" value="{{ $item->id }}">
        <input type="submit" value="Abschicken" class="btnSubmit btn">
        <a href="{{ url('/admin/wg/delete/'.$item->id) }}"><div class="btnDelete btn modal-trigger right">Löschen</div></a>
        {{ csrf_field() }}
    </form>
    </div>
    </li>
    @endforeach
</ul>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems);
});
</script>

</div>
@endsection
@section('nav')
    @component('components.navadminbottom', ['user' => $user, 'responsive' => 'desk'])
    @endcomponent
@endsection
