@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $project->title }}</h1>

        <div class="mb-3">
            <strong>Cliente:</strong> {{ $project->customer }}
        </div>
        <div class="mb-3">
            <strong>Descrizione:</strong> {{ $project->description }}
        </div>

        <div class="mb-3">
            <strong>URL:</strong> {{ $project->url }}
        </div>

        <div class="mb-3">
            <strong> Stato del progetto:</strong> {{ $project->status }}
        </div>

        <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">Modifica</a>

        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
        </form>

        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Torna alla lista dei progetti</a> 
    </div>
@endsection
