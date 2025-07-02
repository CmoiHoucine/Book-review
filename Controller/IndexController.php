<?php
require_once '../model/database.php'; // ou ajuste le chemin selon ton arborescence
$bdd = getDatabaseConnection();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$stmtBooks = $bdd->prepare("SELECT * FROM livres ORDER BY id DESC LIMIT 5");
$stmtBooks->execute();
$RequiredBooks = $stmtBooks->fetchAll(PDO::FETCH_ASSOC);
include '../Includes/nav.php';
include '../View/index.php';