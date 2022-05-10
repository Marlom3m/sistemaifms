<center>
  <div class="container col-md-5" >
    <?php
      if (!empty($_SESSION['type'])) {
    ?>
    <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?php
        if(!empty($_SESSION['message']))
          echo $_SESSION['message'].'<br>';
      ?>
    </div>
    <?php
      unset($_SESSION['type']);
      unset($_SESSION['message']);
    }
    ?>
  </div>

<?php
  if(empty($_SESSION['usuario'])){
?>
<div class="container justify-content-center">
  <div class="login-box">
    <!-- colocar o caminho para o login -->
    <form action="?page=fazer_login" method="post">
      <h3 class="text-center mb-3">Login </h3>
      <div class="input-group mb-3 justify-content-center">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">
            <ion-icon name="person-circle-outline"></ion-icon>
          </span>
        </div>
        <input type="text" class="form-control col-md-6" name="email" id="user" placeholder="E-mail" aria-label="Username" aria-describedby="basic-addon1" required>
      </div>

      <div class="input-group mb-3 justify-content-center">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon2">
            <ion-icon name="lock-closed-outline"></ion-icon>
          </span>
        </div>
        <input type="password" class="form-control col-md-6" name="senha" id="senha" placeholder="Senha" aria-label="Password" aria-describedby="basic-addon2" required>
      </div>
      <a href="?page=refatorar" class="text-primary">
        Esqueceu a Senha?
      </a>
      <button class="btn btn-success btn-block col-md-6" type="submit" id="btnLogin">Entrar</button>

    </form>

    <a href=<?php echo BASEURL ?>>
      <button class="btn btn-danger btn-block col-md-6 center" id="btnCancel">Voltar</button>
    </a>
  </div>

</div>
<?php
}
 ?>
</center>
