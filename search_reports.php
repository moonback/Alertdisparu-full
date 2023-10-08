<?php
include 'config.php';

if (isset($_GET['searchQuery'])) {
  // Échappez la requête de recherche pour éviter les injections SQL
  $searchQuery = mysqli_real_escape_string($conn, $_GET['searchQuery']);

  // Récupérez les noms de toutes les colonnes de votre table
  $columnsQuery = "SHOW COLUMNS FROM posted";
  $columnsResult = mysqli_query($conn, $columnsQuery);

  if (!$columnsResult) {
    echo json_encode([]);
  } else {
    $columns = [];

    while ($column = mysqli_fetch_assoc($columnsResult)) {
      $columns[] = $column['Field'];
    }

    // Créez la requête SQL dynamique en utilisant tous les champs disponibles
    $sql = "SELECT * FROM posted WHERE ";
    foreach ($columns as $column) {
      $sql .= "$column LIKE '%$searchQuery%' OR ";
    }
    // Supprimez la dernière occurrence de ' OR ' pour la requête finale
    $sql = rtrim($sql, ' OR ');

    $result = mysqli_query($conn, $sql);

    if (!$result) {
      echo json_encode([]);
    } else {
      $reports = [];

      while ($row = mysqli_fetch_assoc($result)) {
        $reports[] = $row;
      }

      echo json_encode($reports);
    }
  }
} else {
  echo json_encode([]);
}

mysqli_close($conn);
?>
