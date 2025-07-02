<?php
require_once __DIR__ . '/../model/database.php';
$bdd = getDatabaseConnection();

$motsCles = ["science", "fantasy", "philosophy", "poetry", "manga", "romance", "education", "art", "psychology", "history"];

$motCle = $motsCles[array_rand($motsCles)];
$startIndex = rand(0, 500);

$url = "https://www.googleapis.com/books/v1/volumes?q=" . urlencode($motCle) . "&maxResults=40&startIndex=$startIndex";

$response = file_get_contents($url);
$data = json_decode($response, true);

if (!isset($data['items'])) {
    echo " Aucun livre trouvé pour le mot-clé '$motCle'\n";
    exit;
}

$ajoutes = 0;
$doublons = 0;
$ignores = 0;

foreach ($data['items'] as $item) {
    $info = $item['volumeInfo'];

    $isbn = '';
    if (isset($info['industryIdentifiers'])) {
        foreach ($info['industryIdentifiers'] as $id) {
            if ($id['type'] === 'ISBN_13') {
                $isbn = $id['identifier'];
                break;
            }
        }
    }

    if (empty($isbn)) {
        $ignores++;
        continue;
    }

    $check = $bdd->prepare("SELECT COUNT(*) FROM livres WHERE isbn = ?");
    $check->execute([$isbn]);
    if ($check->fetchColumn() > 0) {
        echo " Doublon ignoré : " . ($info['title'] ?? 'Titre inconnu') . " ($isbn)\n";
        $doublons++;
        continue;
    }

    $titre = $info['title'] ?? '';
    $auteur = isset($info['authors']) ? implode(', ', $info['authors']) : '';
    $anne = $info['publishedDate'] ?? '';
    $genre = isset($info['categories']) ? implode(', ', $info['categories']) : '';
    $couverture = $info['imageLinks']['thumbnail'] ?? '';
    $resumer = $info['description'] ?? '';

    $stmt = $bdd->prepare("INSERT INTO livres (titre, auteur, anne, genre, couverture, resumer, isbn) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$titre, $auteur, $anne, $genre, $couverture, $resumer, $isbn]);

    echo " Livre ajouté : $titre ($isbn)\n";
    $ajoutes++;
}

echo "\n--- Résumé de l'import ---\n";
echo "Mot-clé utilisé : $motCle\n";
echo "Livres ajoutés : $ajoutes\n";
echo "Doublons ignorés : $doublons\n";
echo "Livres sans ISBN : $ignores\n";
