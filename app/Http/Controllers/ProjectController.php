<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Stack;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Afficher la liste des projets
    public function index()
    {
        // Récupérer tous les projets avec leurs images et leurs stacks
        $projetcs = Project::with('images', 'stacks')->get();
        return view('projects.index', compact('projects'));

    }

    // Afficher le formulaire de création d'un projet
    public function create()
    {
        // Récupérer tous les stacks
        $stacks = Stack::all();
        return view('projects.create', compact('stacks'));
    }

    // Enregistrer un projet
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'url' => 'required|url',
            'github_url' => 'required|url',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Créer un nouveau projet
        $project = Project::create($request->all());

        // Enregistrer les images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $project->images()->create(['image_path' => $path]);
            }
        }

        // Associer les stacks
        $project->stacks()->attach($request->input('stacks'));

        return redirect()->route('projects.index')->with('success', 'Projet créé avec succès');
    }

    // Afficher le formulaire de modification d'un projet
    public function edit(Project $project)
    {
        // Récupère toutes les stacks pour les afficher dans le formulaire
        $stacks = Stack::all();
        return view('projects.edit', compact('project', 'stacks'));
    }

    // Mettre à jour un projet existant
    public function update(Request $request, Project $project)
    {
        // Valider les données du formulaire
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'images.*' => 'nullable|image',
        ]);

        // Mettre à jour le projet avec les nouvelles données
        $project->update($request->all());

        // Enregistrer les nouvelles images du projet
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $project->images()->create(['image_path' => $path]);
            }
        }

        // Mettre à jour les stacks associées au projet
        $project->stacks()->sync($request->input('stacks'));

        // Rediriger vers la liste des projets avec un message de succès
        return redirect()->route('projects.index')->with('success', 'Projet mis à jour avec succès.');
    }

    // Supprimer un projet
    public function destroy(Project $project)
    {
        // Supprimer le projet
        $project->delete();

        // Rediriger vers la liste des projets avec un message de succès
        return redirect()->route('projects.index')->with('success', 'Projet supprimé avec succès.');
    }
}
