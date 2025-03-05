<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Classes</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
<h1>Liste des Classes</h1>

<!-- Affichage des messages de succes ou d'erreur -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!-- Bouton pour ajouter une nouveau prof -->
<button><a href="{{ route('etudiants.create') }}" class="btn btn-primary">Ajouter une Classe</a></button>
<br>
<br>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Matricule</th>
        <th>Classe</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($etudiants as $etudiant)
        <tr>
            <td>{{ $etudiant->id }}</td>
            <td>{{ $etudiant->nom }}</td>
            <td>{{ $etudiant->prenom }}</td>
            <td>{{ $etudiant->email }}</td>
            <td>{{ $etudiant->matricule }}</td>
            <td>{{ $etudiant->classe }}</td>
            <td>
                <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-warning">Modifier</a>

                <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Etes-vous sur de vouloir supprimer cet etudiant ?')">Supprimer</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>

</html>
