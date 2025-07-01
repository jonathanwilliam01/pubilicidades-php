<?php
include_once 'conexao.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Publicidades</title>
</head>
<body>
    <main>
        <?php
        include_once 'components/header.php';
        ?>

        <?php
        include_once 'components/content.php';
        ?> 

        <?php
        include_once 'actions/nova-publicidade.php';
        ?>

        <?php
        include_once 'actions/editar-publicidade.php';
        ?>
    </main>

        <!-- <?php
        include_once 'components/footer.php';
        ?> -->

    
  <style>
  .material-symbols-outlined {
    font-variation-settings:
    'FILL' 0,
    'wght' 400,
    'GRAD' 0,
    'opsz' 24
  }
  </style>

  <script src="js/overlay.js"></script>
</body>
</html>