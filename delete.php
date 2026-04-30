<?php
require 'connexion.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM etudiants WHERE id = :id");
$stmt->execute([':id' => $id]);

header('Location: index.php');
exit;