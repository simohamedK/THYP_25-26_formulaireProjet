<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $data = [
    'titre' => htmlspecialchars($_POST['titre']),
    'auteur' => htmlspecialchars($_POST['auteur']),
    'description' => nl2br(htmlspecialchars($_POST['description'])),
    'technos' => htmlspecialchars($_POST['technos']),
    'lien' => htmlspecialchars($_POST['lien'])
  ];

  $fichier = 'projets.json';
  $projets = file_exists($fichier) ? json_decode(file_get_contents($fichier), true) : [];
  $projets[] = $data;
  file_put_contents($fichier, json_encode($projets, JSON_PRETTY_PRINT));

  // Redirection vers la liste
  header("Location: liste.php");
  exit;
}
?>