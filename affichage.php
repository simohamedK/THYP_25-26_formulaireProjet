<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Affichage du projet</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Projet soumis</h1>
  <div class="projet">
    <p><strong>Titre :</strong> <?php echo htmlspecialchars($_POST['titre']); ?></p>
    <p><strong>Auteur(s) :</strong> <?php echo htmlspecialchars($_POST['auteur']); ?></p>
    <p><strong>Description :</strong><br><?php echo nl2br(htmlspecialchars($_POST['description'])); ?></p>
    <p><strong>Technologies :</strong> <?php echo htmlspecialchars($_POST['technos']); ?></p>
    <p><strong>Lien :</strong> <a href="<?php echo htmlspecialchars($_POST['lien']); ?>" target="_blank"><?php echo htmlspecialchars($_POST['lien']); ?></a></p>
  </div>
</body>
</html>