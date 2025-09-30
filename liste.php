<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Liste des projets</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h1 class="mb-4 text-primary">📋 Liste des projets soumis</h1>
    <a href="formulaire.html" class="btn btn-success mb-4">➕ Ajouter un nouveau projet</a>

    <?php
    $fichier = 'projets.json';
    $projets = []
    
    if (file_exists($fichier)) {
      $projets = json_decode(file_get_contents($fichier), true);
      foreach ($projets as $index => $projet) {
        echo "<div class='card mb-3'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $projet['titre'] . "</h5>";
        echo "<p class='card-text'><strong>Auteur(s):</strong> " . $projet['auteur'] . "</p>";
        echo "<p class='card-text'><strong>Description:</strong><br>" . $projet['description'] . "</p>";
        echo "<p class='card-text'><strong>Technologies:</strong> " . $projet['technos'] . "</p>";
        echo "<p class='card-text'><strong>Lien:</strong> <a href='" . $projet['lien'] . "' target='_blank'>" . $projet['lien'] . "</a></p>";
        echo "<a href='modifier.php?id=$index' class='btn btn-warning me-2'>✏️ Modifier</a>";
        echo "<a href='supprimer.php?id=$index' class='btn btn-danger' onclick=\"return confirm('Supprimer ce projet ?');\">🗑️ Supprimer</a>";
        echo "</div></div>";
      }
    } else {
      echo "<div class='alert alert-info'>Aucun projet enregistré.</div>";
    }
    ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>