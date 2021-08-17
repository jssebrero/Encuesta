<div class="d-flex justify-content-center">
       
        <form class="p-5 bg-light" method="post">
          <div class="form-group">
          <h1>REGISTRO</h1>
            <label for="nombre">Nombre:</label>
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
              <input type="text" class="form-control" placeholder="ingrese su nombre(s)" id="nombre" name="nombre" require/>
            </div>

            </div>
          <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
              <input type="text" class="form-control" placeholder="ingrese sus apellidos" id="apellidos" name="apellidos" require/>
            </div>
            
          </div>
          <div class="form-group">
            <label for="email">E-mail:</label>
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              <input type="email" class="form-control" placeholder="ingrese su e-mail" id="email" name="email" require/>
            </div>
            
          </div>
          <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
              <input type="password" class="form-control" placeholder="Ingrese su contraseña" id="pwd" name="pwd" require/>
            </div>
            
          </div>
         
          <button type="submit" class="btn btn-primary" name="btnEnviar">Enviar</button>
        <?php
          require_once"controladores/signupController.php";

          $signup = new signupController();
          $signup -> signupC();
        ?>
        </form>
</div>