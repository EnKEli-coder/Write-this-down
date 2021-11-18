<?php
include('./model/db.php');

if (isset($_POST['login'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = $connection->prepare("SELECT * FROM user WHERE usuario=:username");
  $query->bindParam("username", $username, PDO::PARAM_STR);
  $query->execute();

  $result = $query->fetch(PDO::FETCH_ASSOC);

  if (!$result) {
      echo '<p class="error">Datos Erroneos</p>';
  } else {
      if (password_verify($password, $result['clave'])) {
          $_SESSION['user_id'] = $result['id'];
          header('Location:?menu=notes');
          echo '<p class="success">Logueo Exitoso</p>';
      } else {
          echo '<p class="error">Contraseña incorrecta</p>';
      }
  }
}
?>
<div class="fondo-form">
  <div class="container">
    <div class="flexbox">
      <div class="row">
        <div class="col s12 m6 l4 offset-l4 offset-m3">
          <form action="" method="post">
            <div class="row card-panel z-depth-2">
              <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input 
                type="text"
                placeholder="Usuario"
                id="usuario"
                name="username"
                class="validate"
                required
                />
              </div>
              <div class="input-field col s12">
                <i class="material-icons prefix">fingerprint</i>
                <input 
                type="password"
                placeholder="Contraseña"
                id="pswd"
                name="password"
                class="validate"
                required
                />
              </div>
              <button class="btn blue right" name="login" type="submit" value="login">
                <i class="material-icons left">login</i>
                Acceder
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>