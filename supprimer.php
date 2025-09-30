<?php
$fichier = 'projets.json';
$id = $_GET['id'];

// Charger les projets existants
$projets = json_decode(file_get_contents($fichier), true);

// Supprimer le projet à l'index donné
unset($projets[$id]);

// Réindexer le tableau pour éviter les trous
$projets = array_values($projets);

// Sauvegarder le fichier mis à jour
file_put_contents($fichier, json_encode($projets, JSON_PRETTY_PRINT));

// Rediriger vers la liste
header("Location: liste.php");
exit;