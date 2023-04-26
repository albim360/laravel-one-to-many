@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Elimina progetto</h1>

        <p>Sei sicuro di voler eliminare il progetto "{{ $project->title }}"?</p>

        <form action="{{ route('projects.destroy', $project) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
        </form>
    </div>
@endsection
