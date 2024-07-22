@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Créer un Projet</h1>

        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Titre :</label>
                <input type="text" name="title" id="title" class="w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description :</label>
                <textarea name="description" id="description" class="w-full border-gray-300 rounded-md shadow-sm" required></textarea>
            </div>
            <div class="mb-4">
                <label for="url" class="block text-gray-700">URL :</label>
                <input type="text" name="url" id="url" class="w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="github_url" class="block text-gray-700">URL GitHub :</label>
                <input type="text" name="github_url" id="github_url" class="w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="images" class="block text-gray-700">Images :</label>
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
                            <input type="checkbox" name="stacks[]" value="{{ $stack->id }}" class="form-checkbox">
                            <span class="ml-2">{{ $stack->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Créer</button>
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
    </script>
@endsection
