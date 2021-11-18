<?php
include './model/db.php';

$id = $_SESSION['user_id'];

$query = $connection->prepare("SELECT * FROM nota WHERE idUsuario=:userid");
$query->bindParam("userid", $id, PDO::PARAM_INT);
$query->execute();

while($note = $query->fetch(PDO::FETCH_BOTH)){

    if(isset($_GET['id'])){
        if($note['id'] == $_GET['id']){
            echo '<div class="col l4">';
                echo '<div class="card small yellow lighten-3">';
                    echo '<div class="card-content brown-text text-darken-4">';
                        echo '<form id="cambiar" action="./controller/update.php" method="post">';
                            echo '<input class="card-title" type="text" id="title" name="title" value="'.$note['titulo'].'"></input>';
                            echo '<textarea name="area" id="area" class="materialize-textarea brown-text text-darken-4" style="height: 100px;">'.$note['texto'].'</textarea>';
                            echo '<input type="hidden" name="id" value="'.$note['id'].'">';
                        echo '</form>';
                    echo '</div>';
                    echo '<div class="card-action">';
                        echo '<button class="btn-flat" type="submit" form="cambiar"><i class="material-icons md-36">done</i></button>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }else{
            echo '<div class="col l4">';
            echo '<div class="card small yellow lighten-3">';
                echo '<div class="card-content brown-text text-darken-4">';
                    echo '<span class="card-title">'.$note['titulo'].'</span>';
                    echo '<p>'.$note['texto'].'</p>';
                echo '</div>';
                echo '<div class="card-action">';
                    echo '<a class="btn-flat" href="?menu=delete&id='.$note['id'].'"><i class="material-icons md-36">delete</i></a>';
                    echo '<a class="btn-flat" href="?menu=notes&id='.$note['id'].'" role="button"><i class="material-icons md-36">edit</i></a>';
                echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    }else{
        echo '<div class="col l4">';
            echo '<div class="card small yellow lighten-3">';
                echo '<div class="card-content brown-text text-darken-4">';
                    echo '<span class="card-title">'.$note['titulo'].'</span>';
                    echo '<p>'.$note['texto'].'</p>';
                echo '</div>';
                echo '<div class="card-action">';
                    echo '<a class="btn-flat" href="?menu=delete&id='.$note['id'].'"><i class="material-icons md-36">delete</i></a>';
                    echo '<a class="btn-flat" href="?menu=notes&id='.$note['id'].'" role="button"><i class="material-icons md-36">edit</i></a>';
                echo '</div>';
                echo '</div>';
            echo '</div>';
    }

    
}
?>