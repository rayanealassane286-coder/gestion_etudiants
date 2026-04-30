<?php
require 'connexion.php';

// Récupérer les filières
$filieres = $pdo->query("SELECT * FROM filieres")->fetchAll();

// Récupérer les étudiants avec leur filière
$etudiants = $pdo->query("SELECT etudiants.*, filieres.nom AS filiere FROM etudiants JOIN filieres ON etudiants.filiere_id = filieres.id")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion des étudiants</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <h1>Gestion des étudiants</h1>

    <form action="traitement.php" method="POST" id="formAjout">
        <h2>Ajouter un étudiant</h2>

        <label>Nom</label>
        <input type="text" name="nom" placeholder="Entrez le nom">
        <span class="erreur" id="errNom"></span>

        <label>Prénom</label>
        <input type="text" name="prenom" placeholder="Entrez le prénom">
        <span class="erreur" id="errPrenom"></span>

        <label>Filière</label>
        <select name="filiere_id">
            <option value="">-- Choisir une filière --</option>
            <?php foreach ($filieres as $filiere): ?>
                <option value="<?= $filiere['id'] ?>"><?= $filiere['nom'] ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Ajouter</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Filière</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etudiants as $etudiant): ?>
            <tr>
                <td><?= $etudiant['nom'] ?></td>
                <td><?= $etudiant['prenom'] ?></td>
                <td><?= $etudiant['filiere'] ?></td>
                <td>
                    <a href="update.php?id=<?= $etudiant['id'] ?>" class="btn-modifier">Modifier</a>
                    <a href="delete.php?id=<?= $etudiant['id'] ?>" class="btn-supprimer">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="assets/js/script.js"></script>
</body>
</html>