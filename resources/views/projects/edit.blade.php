@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Modifier le projet</h1>
        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Titre :</label>
                <input type="text" name="title" id="title" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ $project->title }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description :</label>
                <textarea name="description" id="description" class="w-full border-gray-300 rounded-md shadow-sm" required>{{ $project->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="url" class="block text-gray-700">URL :</label>
                <input type="url" name="url" id="url" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ $project->url }}">
            </div>
            <div class="mb-4">
                <label for="github_url" class="block text-gray-700">URL GitHub :</label>
                <input type="url" name="github_url" id="github_url" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ $project->github_url }}">
            </div>
            <div class="mb-4">
                <label for="images" class="block text-gray-700">Images :</label>
                <input type="file" name="images[]" id="images" class="w-full border-gray-300 rounded-md shadow-sm" multiple>
                <div class="mt-2">
                    @foreach ($project->images as $image)
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image" class="w-24 h-24 object-cover inline-block mr-2">
                    @endforeach
                </div>
            </div>
            <div class="mb-4">
                <label for="stacks" class="block text-gray-700">Stacks :</label>
                <select name="stacks[]" id="stacks" class="w-full border-gray-300 rounded-md shadow-sm" multiple>
                    @foreach ($stacks as $stack)
                        <option value="{{ $stack->id }}" @if($project->stacks->contains($stack->id)) selected @endif>{{ $stack->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
            </div>
        </form>
    </div>
@endsection
