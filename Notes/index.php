<?php
session_start();

require './model/db.php';

if(isset($_SESSION['user_id'])){
  $records= $connection->prepare('SELECT id, Usuario, clave FROM user WHERE id=:id');
  $records->bindParam(':id', $_SESSION['user_id'],PDO::PARAM_INT);
  $records->execute();

  $results= $records->fetch(PDO::FETCH_ASSOC);

  $user = null;

  if(count($results) > 0){
    $user = $results;
  }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./styles/index.css">
    <title>Document</title>
</head>
<body>
    <?php if(!empty($user)): ?>
    <?php include './views/logged_header.php'?>
    <?php else: ?>
    <?php include './views/header.php'?>
    <?php endif; ?>
    <main class="valign-wrapper">
        <?php include './controller/router.php'?>
    </main>
    <?php include './views/footer.php'?>
</body>
</html>