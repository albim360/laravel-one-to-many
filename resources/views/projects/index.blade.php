@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista dei progetti</h1>
            <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Nuovo Progetto</a>
            <a href="{{ route('deleted-projects.index') }}" class="btn btn-danger mb-3 mx-2">Progetti Eliminati</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Titolo</th>
                    <th>Descrizione</th>
                    <th>URL</th>
                    <th>Stato</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->customer }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->url }}</td>
                        <td>{{ $project->status }}</td>
                        <td>
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-primary m-2 w-100">Visualizza</a>
                            <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning m-2 w-100">Modifica</a>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger m-2 w-100">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('projects.create') }}" class="btn btn-success">Crea nuovo progetto</a>
    </div>
@endsection
