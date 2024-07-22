<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->route('home')->with('success', 'Votre message a été envoyé avec succès.');
    }

    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }
}
