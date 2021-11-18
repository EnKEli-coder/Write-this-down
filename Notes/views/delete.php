<?php
include './model/db.php';
        $id = $_GET['id'];
        
        $query = $connection->prepare("DELETE FROM nota WHERE id=:id");
        $query->bindParam("id", $id, PDO::PARAM_INT);
        $query->execute();
        header('Location:?menu=notes');
?>