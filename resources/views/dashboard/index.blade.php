@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Tableau de Bord</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <a href="{{ route('projects.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded text-center">
                Gérer les Projets
            </a>
            <a href="{{ route('stacks.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded text-center">
                Gérer les Stacks
            </a>
            <a href="{{ route('contacts.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded text-center">
                Voir les Contacts
            </a>
        </div>
    </div>
@endsection
