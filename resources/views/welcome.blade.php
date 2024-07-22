@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Bienvenue sur mon Portfolio</h1>
        <p>Voici une présentation de mes projets et compétences.</p>
        <a href="{{ route('projects.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Voir mes projets</a>
    </div>
@endsection
