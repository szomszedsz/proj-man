@extends('layouts.app')

@section('title','Projekt létrehozás / szerkesztés')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-5">
           <form method="POST" action="/projects">
            @csrf
                <div class="form-group mb-3">
                    <label for="titleInput">Cím</label>
                    <input type="text" class="form-control" id="titleInput" placeholder="">
                </div>
                <div class="form-group mb-3">
                    <label for="descriptionInput">Leírás</label>
                    <input type="text" class="form-control" id="descriptionInput" placeholder="">
                </div>
                <div class="form-group mb-3">
                    <label for="statusSelect">Státusz</label>
                    <select type="text" class="form-select" id="statusSelect" placeholder="">
                    <option value="">Fejlesztésre vár</option>
                    <option value="">Kész</option>
                    <option value="">Folyamatban</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="contactNameInput">Kapcsolattartó neve</label>
                    <input type="text" class="form-control" id="contactNameInput" placeholder="">
                </div>
                <div class="form-group mb-3">
                    <label for="contactEmailInput">Kapcsolattartó e-mail címe</label>
                    <input type="text" class="form-control" id="contactEmailInput" placeholder="">
                </div>
                <button type="submit" class="btn btn-primary">Mentés</button>
            </form>
        </div>
    </div>
</div>
@endsection