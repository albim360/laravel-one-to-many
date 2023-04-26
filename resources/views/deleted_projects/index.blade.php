@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Progetti Eliminati</h1>
        <a href="{{ route('projects.index') }}" class="btn btn-primary mb-3">Torna alla lista dei progetti</a>
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
            @foreach ($deletedProjects as $project)
                <tr>
                    <td>{{ $project->customer }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->url }}</td>
                    <td>{{ $project->status }}</td>
                    <td>
                        <form action="{{ route('projects.restore', $project->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-primary my-2 w-100">Ripristina</button>
                        </form>
                        <form action="{{ route('projects.force-delete', $project->id) }}" method="POST">
                            @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger my-2 w-100">Elimina definitivamente</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
