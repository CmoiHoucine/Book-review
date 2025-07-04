<?php
require_once '../model/database.php'; 
$bdd = getDatabaseConnection();

$id = $_GET['id'] ?? null;

if ($id) {
    $id = intval($id);
    $stmt = $bdd->prepare("SELECT * FROM livres WHERE id = ?");
    $stmt->execute([$id]);
    $livre = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$livre) {
        echo "Livre introuvable.";
        exit;
    }

    require_once '../View/livre.php';
    exit;

} else {
    echo "Aucun livre sélectionné.";
    exit;
}