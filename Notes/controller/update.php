<?php
include '../model/db.php';
session_start();
        
        $id = $_POST['id'];
        $title = $_POST['title'];
        $texto= $_POST['area'];
        
        $query = $connection->prepare("UPDATE nota SET titulo=:title, texto=:texto WHERE id=:id");
        $query->bindParam("id", $id, PDO::PARAM_INT);
        $query->bindParam("title", $title, PDO::PARAM_STR);
        $query->bindParam("texto", $texto, PDO::PARAM_STR);
        $query->execute();
        header('Location:../?menu=notes');
        
?>