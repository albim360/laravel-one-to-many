@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica progetto</h1>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary my-1">Torna alla lista dei progetti</a>

        <form action="{{ route('projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="customer">Cliente</label>
                <input type="text" class="form-control" id="customer" name="customer" value="{{ $project->customer }}" required>
            </div>
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea class="form-control" id="description" name="description" required>{{ $project->description }}</textarea>
            </div>
            <div class="form-group">
    <label for="status">Stato</label>
    <select id="status" name="status" class="form-control" required>
        <option value="0" @if ($project->status == 'In attesa') selected @endif>In attesa</option>
        <option value="1" @if ($project->status == 'In corso') selected @endif>In corso</option>
        <option value="2" @if ($project->status == 'Completato') selected @endif>Completato</option>
    </select>
</div>

            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" class="form-control" id="url" name="url" value="{{ $project->url }}">
            </div>
                </label>
            <button type="submit" class="btn btn-primary my-2 w-100">Salva</button>
            <button type="reset" class="btn btn-secondary my-2 w-100">Annulla modifiche</button>
        </form>
    </div>
@endsection
