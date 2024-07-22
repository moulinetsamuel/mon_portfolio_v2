@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Messages de Contact</h1>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Nom</th>
                    <th class="py-2">Email</th>
                    <th class="py-2">Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td class="border px-4 py-2">{{ $contact->name }}</td>
                        <td class="border px-4 py-2">{{ $contact->email }}</td>
                        <td class="border px-4 py-2">{{ $contact->message }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
