@extends('layouts.master') @section('content')
@component('components.navskills', ['active' => 'person'])
@endcomponent

<div class="containerContent">
<div class="hoverPDFIcon"><i class="fas fa-3x fa-file-pdf"></i></div>

<div class="personWrap">

</div>

<table class="person">
    <tr>
        <td class="icon"><i class="far fa-address-card fa-2x"></i></td>
        <td class="person">{!! $items[0]->name !!}<br>{!! $items[0]->adress !!}</td>
        <td class="person">{!! $items[0]->geb !!}<br>{!! $items[0]->state !!}<br>{!! $items[0]->family !!}</td>
    </tr>
    <tr>
        <td class="icon"><i class="fas fa-phone fa-2x"></i></td>
        <td class="person" colspan="2">{!! $items[0]->tele !!}</td>
    </tr>
    <tr>
        <td class="icon"><i class="far fa-envelope fa-2x"></i></td>
        <td class="person" colspan="2"><a href="mailto:{!! $items[0]->email !!}">{!! $items[0]->email !!}</a></td>
    </tr>
    <tr><td colspan="3" class="divide"></td></tr>
    <tr>
        <td class="icon"><i class="fas fa-car fa-2x"></i></td>
        <td class="person" colspan="2">{!! $items[0]->driver !!}</td>
    </tr>
    <tr>
        <td class="icon"><i class="fas fa-language fa-2x"></i></td>
        <td class="person" colspan="2">{!! $items[0]->lang !!}</td>
    </tr>
    <tr>
        <td class="icon"><i class="fas fa-key fa-2x"></i></td>
        <td class="person" colspan="2"><a class="waves-effect btn modal-trigger" href="#modalpgp">PGP public key</a></td>
    </tr>


</table>
  <div id="modalpgp" class="modal">
    <div class="modal-content pgp">
      <pre>{!! $items[0]->pgp !!}</pre>
      <textarea id="pgpkey">{!! $items[0]->pgp !!}</textarea>
    </div>
    <div class="modal-footer">
        <a href="#!" onclick="copyText()" data-clipboard-target=".pgpkey" class="modal-close btn waves-effect">Kopieren</a>
        <a href="#!" class="modal-close waves-effect btn">Schliessen</a>
    </div>
  </div>

</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('#modalpgp');
    var instances = M.Modal.init(elems, {'startingTop':'0', 'endingTop':'1%'});
  });

  function copyText() {
      $('#pgpkey').focus();
      $('#pgpkey').select();
      document.execCommand('copy');
  }
</script>

@endsection
@section('nav')
    @component('components.nav', ['user' => $user])
    @endcomponent
@endsection
