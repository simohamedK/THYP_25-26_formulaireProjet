<?php
$fichier = 'projets.json';
$id = $_GET['id'];
$projets = json_decode(file_get_contents($fichier), true);
$projet = $projets[$id];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $projets[$id] = [
    'titre' => $_POST['titre'],
    'auteur' => $_POST['auteur'],
    'description' => nl2br($_POST['description']),
    'technos' => $_POST['technos'],
    'lien' => $_POST['lien']
  ];
  file_put_contents($fichier, json_encode($projets, JSON_PRETTY_PRINT));
  header("Location: liste.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Modifier le projet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h1 class="mb-4 text-warning">✏️ Modifier le projet</h1>

    <form method="POST" class="bg-white p-4 rounded shadow-sm">
      <div class="mb-3">
        <label class="form-label">Titre</label>
        <input type="text" name="titre" class="form-control" value="<?= $projet['titre'] ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Auteur</label>
        <input type="text" name="auteur" class="form-control" value="<?= $projet['auteur'] ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="5"><?= strip_tags($projet['description']) ?></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Technologies</label>
        <input type="text" name="technos" class="form-control" value="<?= $projet['technos'] ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Lien</label>
        <input type="url" name="lien" class="form-control" value="<?= $projet['lien'] ?>">
      </div>

      <button type="submit" class="btn btn-warning">💾 Enregistrer</button>
      <a href="liste.php" class="btn btn-secondary ms-2">↩️ Retour</a>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>