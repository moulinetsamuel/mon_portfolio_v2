@extends('layouts.app')

@section('content')
    <!-- Section d'introduction -->
    <section id="introduction" class="my-16 text-center">
        <h1 class="text-5xl font-bold mb-4">Bonjour, je suis Samuel Moulinet</h1>
        <p class="text-lg">Développeur Web spécialisé en back-end</p>
    </section>

    <!-- Section des projets -->
    <section id="projects" class="my-16">
        <h2 class="text-3xl font-bold mb-4">Projets</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($projects as $project)
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-xl font-bold">{{ $project->title }}</h3>
                    <p>{{ $project->description }}</p>
                    @if ($project->images->count() > 0)
                        <img src="{{ asset($project->images->first()->image_path) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover mt-2">
                    @endif
                    <div class="mt-2 flex flex-wrap">
                        @foreach ($project->stacks as $stack)
                            <img src="{{ asset($stack->icon_path) }}" alt="{{ $stack->name }}" class="w-8 h-8 mr-2">
                        @endforeach
                    </div>
                    <a href="{{ $project->url }}" class="text-blue-500" target="_blank">Voir le projet</a>
                    <a href="{{ $project->github_url }}" class="text-blue-500 ml-2" target="_blank">Voir sur GitHub</a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Section des compétences -->
    <section id="skills" class="my-16">
        <h2 class="text-3xl font-bold mb-4">Compétences</h2>
        <p>Liste de compétences ici...</p>
    </section>

    <!-- Section de contact (commentée pour l'instant) -->
    <section id="contact" class="my-16">
        <h2 class="text-3xl font-bold mb-4">Contact</h2>
        <form action=# method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nom :</label>
                <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email :</label>
                <input type="email" name="email" id="email" class="w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-700">Message :</label>
                <textarea name="message" id="message" class="w-full border-gray-300 rounded-md shadow-sm" required></textarea>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Envoyer</button>
            </div>
        </form>
    </section>

@endsection
