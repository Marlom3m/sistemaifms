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
      <h3 class="text-center mb-3">Refatorar Senha </h3>
      <h6 class="text-center text-danger mb-3">Ao refatorar a senha voltará para o padrão "mudar123" </h6>
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
        <input type="text" class="form-control col-md-6" name="cpf" maxlength="11" id="senha" placeholder="CPF apenas números" aria-label="Password" aria-describedby="basic-addon2" required>
      </div>

      <button class="btn btn-success btn-block col-md-6" type="submit" id="btnLogin">Refatorar</button>

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
