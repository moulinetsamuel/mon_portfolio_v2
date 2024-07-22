@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Modifier le Projet</h1>

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
                <input type="text" name="url" id="url" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ $project->url }}">
            </div>
            <div class="mb-4">
                <label for="github_url" class="block text-gray-700">URL GitHub :</label>
                <input type="text" name="github_url" id="github_url" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ $project->github_url }}">
            </div>
            <div class="mb-4">
                <label for="images" class="block text-gray-700">Images :</label>
                <div id="current-images">
                    @foreach($project->images as $image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $project->title }}" class="w-32 h-32 object-cover inline">
                            <button type="button" class="bg-red-500 text-white px-2 py-1 rounded remove-image" data-id="{{ $image->id }}">Supprimer</button>
                        </div>
                    @endforeach
                </div>
                <div id="image-inputs">
                    <input type="file" name="images[]" class="w-full border-gray-300 rounded-md shadow-sm mb-2">
                </div>
                <button type="button" id="add-image" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter une image</button>
            </div>
            <div class="mb-4">
                <label for="stacks" class="block text-gray-700">Stacks :</label>
                <div id="stack-inputs">
                    @foreach($stacks as $stack)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="stacks[]" value="{{ $stack->id }}" class="form-checkbox" {{ $project->stacks->contains($stack->id) ? 'checked' : '' }}>
                            <span class="ml-2">{{ $stack->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Modifier</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('add-image').addEventListener('click', function() {
            const imageInputs = document.getElementById('image-inputs');
            const input = document.createElement('input');
            input.type = 'file';
            input.name = 'images[]';
            input.classList.add('w-full', 'border-gray-300', 'rounded-md', 'shadow-sm', 'mb-2');
            imageInputs.appendChild(input);
        });

        document.querySelectorAll('.remove-image').forEach(button => {
            button.addEventListener('click', function() {
                const imageId = this.getAttribute('data-id');
                const parentDiv = this.parentElement;
                fetch(`/images/${imageId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(response => {
                    if (response.ok) {
                        parentDiv.remove();
                    }
                });
            });
        });
    </script>
@endsection
