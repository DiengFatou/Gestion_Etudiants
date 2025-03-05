<form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nom">Nom </label>
    <input type="text" name="nom" id="nom" value="{{ $etudiant->nom }}" required>
<br>
    <label for="prenom">Prenom</label>
    <input type="text" name="prenom" id="prenom" value="{{ $etudiant->prenom }}" required>
    <br>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="{{ $etudiant->email }}" required>
    <br>
    <label for="matricule">Matricule</label>
    <input type="text" name="matricule" id="matricule" value="{{ $etudiant->matricule }}" required>
    <br>
    <label for="classe">Specialite</label>
    <input type="text" name="classe" id="classe" value="{{ $etudiant->classe }}" required>
    <br>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>
