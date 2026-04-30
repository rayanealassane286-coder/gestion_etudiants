<?php
require 'connexion.php';

$id = $_GET['id'];

// Récupérer l'étudiant
$stmt = $pdo->prepare("SELECT * FROM etudiants WHERE id = :id");
$stmt->execute([':id' => $id]);
$etudiant = $stmt->fetch();

// Récupérer les filières
$filieres = $pdo->query("SELECT * FROM filieres")->fetchAll();

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $filiere_id = $_POST['filiere_id'];

    $stmt = $pdo->prepare("UPDATE etudiants SET nom=:nom, prenom=:prenom, filiere_id=:filiere_id WHERE id=:id");
    $stmt->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':filiere_id' => $filiere_id,
        ':id' => $id
    ]);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier étudiant</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <h2>Modifier un étudiant</h2>

    <form method="POST" id="formUpdate">
        <label>Nom</label>
        <input type="text" name="nom" value="<?= $etudiant['nom'] ?>">
        <span class="erreur" id="errNom"></span>

        <label>Prénom</label>
        <input type="text" name="prenom" value="<?= $etudiant['prenom'] ?>">
        <span class="erreur" id="errPrenom"></span>

        <label>Filière</label>
        <select name="filiere_id">
            <?php foreach ($filieres as $f): ?>
                <option value="<?= $f['id'] ?>" <?= $f['id'] == $etudiant['filiere_id'] ? 'selected' : '' ?>>
                    <?= $f['nom'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Mettre à jour</button>
    </form>
</div>
<script src="assets/js/script.js"></script>
</body>
</html>