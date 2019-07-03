<div class="login-area login-bg">
    <div class="container">
        <div class="login-box">
        <!-- <div class="login-box ptb--100"> -->
            <form method="post" novalidate="">
                <div class="login-form-head">
                    <div class="logo d-flex justify-content-around my-4">
                        <a href="#" class="my-1 w-100"><img class="d-inline-block" src="vistas/assets/images/icon/sep-logo.svg" alt="logo"></a>
                        <a href="#" class="mx-3 "><img class="d-inline-block" src="vistas/assets/images/icon/logo-tec.svg" alt="logo"></a>
                        <a href="#" class="mt-1 "><img class="d-inline-block" src="vistas/assets/images/icon/LogoDSC.svg" alt="logo"></a>
                    </div>
                    <h5 style="color:black;">Sistema De Residencias</h5>
                    <p style="color:black;">Inicia sesion para acceder a las opciones del sistema.</p>
                </div>
                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="user">Usuario</label>
                        <input type="text" id="user" name="username" autocomplete="off">
                        <i class="fa fa-user fa-2x"></i>
                    </div>
                    <div class="form-gp">
                        <label for="pass">Contraseña</label>
                        <input type="password" id="pass" name="password">
                        <i class="fa fa-lock fa-2x"></i>
                    </div>
                    <?php
                    $login = new ControladorUsuarios();
                    $login->ctrIngresoUsuario();
                    ?>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Iniciar Sesion </button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>