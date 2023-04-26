@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crea nuovo progetto</h1>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary my-1">Torna alla lista dei progetti</a>

        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="customer">Cliente</label>
                <input type="text" class="form-control" id="customer" name="customer" required>
            </div>
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" class="form-control" id="url" name="url">
            </div>
            <div class="form-group">
                <label for="status">Stato</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="0">In attesa</option>
                    <option value="1">In corso</option>
                    <option value="2">Completato</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary my-2 w-100 ">Crea</button>
            <button type="reset" class="btn btn-secondary my-2 w-100">Reset</button>
        </form>
    </div>
@endsection
