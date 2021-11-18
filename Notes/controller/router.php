<?php
$user=null;
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

$var_getMenu = isset($_GET['menu']) ? $_GET['menu'] : 'home';
echo "<br>";

switch ($var_getMenu){
    case "home":
        if($user){
            require_once('./views/notes.php');
            header('Location:?menu=notes');
        }else{
            require_once('./views/home.php');
        }
        break;
    case "login":
        if($user){
            require_once('./views/notes.php');
            header('Location:?menu=notes');
        }else{
            require_once('./views/login.php');
        }
        break;
    case "register":
        if($user){
            require_once('./views/notes.php');
            header('Location:?menu=notes');
        }else{
            require_once('./views/register.php');
        }
        break;
    case "about":
        require_once('./views/about.php');
        break;
    case "logout":
        if(!$user){
            require_once('./views/401.php');
        }else{
            require_once('./views/logout.php');
        }
        break;
    case "notes":
        if(!$user){
            require_once('./views/401.php');
        }else{
            require_once('./views/notes.php');
        }
        break;
    case "delete":
        require_once('./views/delete.php');
        break;
    default:
        require_once('./views/home.php');
    break;
}

?>