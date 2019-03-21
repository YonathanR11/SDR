<?php
class ControladorUsuarios
{

    /*=============================================
    INGRESO DE USUARIO
    =============================================*/
    public static function ctrIngresoUsuario()
    {

        if (isset($_POST["username"])) {

            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["username"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])
            ) {

                $encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                $tabla = "usuarios";
                $item = "usuario";
                $valor = $_POST["username"];

                $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

                if ($respuesta["usuario"] == $_POST["username"] && $respuesta["password"] == $encriptar) {

                    if ($respuesta["estado"] == 1) {

                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["id"] = $respuesta["id"];
                        $_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["usuario"] = $respuesta["usuario"];
                        $_SESSION["perfil"] = $respuesta["perfil"];
                        $_SESSION["estado"] = $respuesta["estado"];

                        echo '<script>

								window.location = "Inicio";

							</script>';
                    } else {

                        // echo '¡Usuario no activado!';
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>¡Usuario no activado!</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span class="fa fa-times"></span>
						</button>
					</div>';
                    }
                } else {

                    // echo '¡Usuario o contraseña incorrecta!';
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>¡Usuario o contraseña incorrecta!</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span class="fa fa-times"></span>
					</button>
				</div>';
                }
            }
        }
    }

    /*=============================================
    REGISTRO DE USUARIO
    =============================================*/

    public static function ctrCrearUsuario()
    {
        if (isset($_POST["nuevoUsuario"])) {
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])
            ) {

                if ($_POST["nuevoPassword"] != $_POST["confirmarPassword"]) {
                    echo '<script>
				   Swal.fire({
						type: "error",
					   title: "!La contraseña NO Coincide!",
					   showConfirmButton: true,
					   confirmButtonText: "Cerrar",
					   closeOnConfirm: false
				   }).then((result)=>{
					   if(result.value){
						   window.location = "Usuarios";
					   }
					   });
				 </script>';
                } else {
                    $tabla = "usuarios";
                    $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    $datos = array(
                        "nombre" => $_POST["nuevoNombre"],
                        "usuario" => $_POST["nuevoUsuario"],
                        "password" => $encriptar,
                        "perfil" => $_POST["nuevoPerfil"],
                    );

                    $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);
                    if ($respuesta == "ok") {
                        echo '<script>
				   Swal.fire({
						type: "success",
					   title: "¡Registrado Correctamente!",
					   showConfirmButton: true,
					   confirmButtonText: "Cerrar",
					   closeOnConfirm: false
				   }).then((result)=>{
					   if(result.value){
						   window.location = "Usuarios";
					   }
					   });
				 </script>';
                    }
                }
            } else {
                echo '<script>
				   Swal.fire({
						type: "error",
					   title: "¡El usuario no puede estar vacio o llevar caracteres especiales!",
					   showConfirmButton: true,
					   confirmButtonText: "Cerrar",
					   closeOnConfirm: false
				   }).then((result)=>{
					   if(result.value){
						   window.location = "Usuarios";
					   }
					   });
				 </script>';
            }
        }
    }
    /*=============================================
    MOSTRAR USUARIO
    =============================================*/
    public static function ctrMostrarUsuarios($item, $valor)
    {
        $tabla = "usuarios";
        $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
        return $respuesta;
    }

    /*=============================================
    EDITAR USUARIO
    =============================================*/
    public static function ctrEditarUsuario($editarUsuario, $editarNombre, $editarPassword, $confirmarPassword, $passwordActual, $editarPerfil)
    {
        if (isset($_POST[$editarUsuario])) {
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST[$editarNombre]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST[$editarUsuario])
            ) {
                $tabla = "usuarios";
                if ($_POST[$editarPassword] != "" || $_POST[$confirmarPassword] != "") {
                    if ($_POST[$editarPassword] == $_POST[$confirmarPassword]) {
                        if (preg_match('/^[a-zA-Z0-9]+$/', $_POST[$editarPassword])) {
                            $encriptar = crypt($_POST[$editarPassword], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                        } else {
                            echo '<script>
                            Swal.fire({
                                    type: "error",
                                title: "¡La contraseña no puede estar vacio o llevar caracteres especiales!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                            }).then((result)=>{
                                if(result.value){
                                    window.location = "' . $_GET["ruta"] . '";
                                }
                                });
                            </script>';
                        }
                    } else {
                        echo '<script>
                        Swal.fire({
                                type: "error",
                            title: "¡La contraseña NO Coincide!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value){
                                window.location = "' . $_GET["ruta"] . '";
                            }
                            });
                        </script>';
                    }
                } else {
                    $encriptar = $_POST[$passwordActual];
                }


                $datos = array(
                    "nombre" => $_POST[$editarNombre],
                    "usuario" => $_POST[$editarUsuario],
                    "password" => $encriptar,
                    "perfil" => $_POST[$editarPerfil],
                );


                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);
                if ($respuesta == "ok") {

                    if ($editarUsuario == "editarMiUsuario") {
                        $_SESSION['nombre'] = $datos['nombre'];
                    }
                    echo '<script>
                    Swal.fire({
                            type: "success",
                        title: "¡Modificado Correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                            }).then((result)=>{
                        if(result.value){
                            window.location = "' . $_GET["ruta"] . '";
                        }
                        });
                    </script>';
                }
            } else {
                echo '<script>
				Swal.fire({
					 type: "error",
					title: "¡El usuario no puede estar vacio o llevar caracteres especiales!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
				}).then((result)=>{
					if(result.value){
						window.location = "' . $_GET["ruta"] . '";
					}
					});
			  </script>';
            }
        }
    }

    /*=============================================
    BORRAR USUARIO
    =============================================*/
    public static function ctrBorrarUsuario()
    {
        if (isset($_GET["idUsuario"])) {
            $tabla = "usuarios";
            $datos = $_GET["idUsuario"];

            $respuesta = ModeloUsuarios::MdlBorrarUsuario($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
			   Swal.fire({
					type: "success",
				   title: "¡Eliminado Correctamente!",
				   showConfirmButton: true,
				   confirmButtonText: "Cerrar",
				   closeOnConfirm: false
			   }).then((result)=>{
				   if(result.value){
					   window.location = "Usuarios";
				   }
				   });
			 </script>';
            }
        }
    }
}
