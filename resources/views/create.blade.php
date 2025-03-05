<form action="{{ route('etudiants.store') }}" method="POST">
    @csrf
    <label for="nom">Nom de la classe</label>
    <input type="text" name="nom" id="nom" required>

    <label for="prenom">Prenom</label>
    <input type="text" name="prenom" id="prenom" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>

    <label for="matricule">Matricule</label>
    <input type="text" name="matricule" id="matricule" required>

    <label for="classe">Classe</label>
    <input type="text" name="classe" id="classe" required>

    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
