@extends('layouts.master')
@section('content')
	<h1>Kontakt</h1>

    <form method="post" action="">
    <div class="row">
        <div class="input-field col s6">
            <input id="username" type="text">
            <label for="username">Dein Name</label>
        </div>
        <div class="input-field col s6">
            <input id="email" type="text">
            <label for="email">Deine Email</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
        <select>
            <option value="1">Berlin</option>
            <option value="2">Hamburg</option>
            <option value="3">Ozzora</option>
            <option value="3">Meeresrausch</option>
            <option value="3">Fusion</option>
            <option value="3">Bucht der Träumer</option>
        </select>
        <label>Woher kennen wir uns?</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <textarea id="textarea1" class="materialize-textarea"></textarea>
            <label for="textarea1">Dein Text</label>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <button class="btn floatRight">Abschicken</button>
        </div>
    </div>
    <form/>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
@endsection
