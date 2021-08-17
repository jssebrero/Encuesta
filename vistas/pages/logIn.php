<div class="d-flex justify-content-center">
        <form class="p-5 bg-light" method="post">
          
          <div class="form-group">
          <h1>LOGIN</h1>
            <label for="email">E-mail:</label>
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              <input type="email"class="form-control" placeholder="ingrese su e-mail" id="ingresoemail" name="ingresoemail" />
            </div>
            
          </div>
          <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
              <input type="password" class="form-control" placeholder="Ingrese su contraseña" id="ingresopwd" name="ingresopwd" />
            </div>
            
          </div>

          <?php
        if(isset($_SESSION['error'])){
            echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
            echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times ;</button>
              <h4><i class='icon fa fa-check'></i> Éxito!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>

         
         
          <button type="submit" class="btn btn-primary" name="btnIngreso">Ingresar</button>
          <a href="signUp" class="btn btn-success" >Registrarse</a>

        <?php
          require_once"controladores/loginController.php";

          $signup = new loginController();
          $signup -> loginC();
        ?>

        </form>
</div>