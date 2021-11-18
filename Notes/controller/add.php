<?php
include '../model/db.php';
session_start();
        $title = $_POST['title'];
        $texto = $_POST['area'];
        $user= $_SESSION['user_id'];
        
        $query = $connection->prepare("INSERT INTO nota (idUsuario, titulo, texto) VALUES (:user,:title,:texto)");
        $query->bindParam("user", $user, PDO::PARAM_INT);
        $query->bindParam("title", $title, PDO::PARAM_STR);
        $query->bindParam("texto", $texto, PDO::PARAM_STR);
        $query->execute();
        header('Location:../?menu=notes');
?>