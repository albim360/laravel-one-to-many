@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3 d-flex align-items-center justify-center">
    <div class="container py-5">
        <h1 class="display-5 text-center fw-bold">
            Il Mio Portafoglio
        </h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4 text-center">
                Alberto Zappalà
            </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Contattami</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Scarica il CV</button>
                <a href="{{ route('projects.index') }}" class="btn btn-success my-1 btn-lg px-4 gap-3">Guarda i miei Progetti</a>
            </div>
        </div>
    </div>
</main>
@endsection