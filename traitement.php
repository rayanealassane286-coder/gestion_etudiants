<?php
require 'connexion.php';

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$filiere_id = $_POST['filiere_id'];

$stmt = $pdo->prepare("INSERT INTO etudiants (nom, prenom, filiere_id) VALUES (:nom, :prenom, :filiere_id)");
$stmt->execute([
    ':nom' => $nom,
    ':prenom' => $prenom,
    ':filiere_id' => $filiere_id
]);

header('Location: index.php');
