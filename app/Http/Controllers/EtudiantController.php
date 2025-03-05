<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditPostRequest;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $etudiants = Etudiant::all();
            return view('index', compact('etudiants'));
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'status_message' => 'Erreur lors de la récupération des etudiants',
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */

    public function create()
    {
        return view('create');
    }

    /**
     * Ajoute une nouveau prof dans la base de donnees.
     */
    public function store(CreatePostRequest $request)
    {
        try {
            $etudiant = Etudiant::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'matricule' => $request->matricule,
                'classe' => $request->classe,
            ]);

            return redirect()->route('etudiants.index')->with('success', 'Prof ajoutee avec succes');
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'status_message' => 'Erreur lors de l\'ajout du prof',
                'error' => $e->getMessage()
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('edit', compact('etudiant'));
    }
    public function update(EditPostRequest $request, $id)
    {
        try {
            $etudiant = Etudiant::findOrFail($id);
            $etudiant->update([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'matricule' => $request->matricule,
                'classe' => $request->classe,
            ]);

            return redirect()->route('etudiants.index')->with('success', 'Etudiant mise a jour avec succes');
        } catch (\Exception $e) {
            return response()->json([
                'status_code' => 500,
                'status_message' => 'Erreur lors de la mise a jour du prof',
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $etudiant = Etudiant::findOrFail($id);
            $etudiant->delete();

            return redirect()->route('etudiants.index')->with('success', 'Etudiant supprimee avec succes');
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'status_message' => 'Erreur lors de la suppression du etudiant',
                'error' => $e->getMessage()
            ]);
        }
    }
}
