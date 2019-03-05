<?php
class ControladorDocentes
{
    public static function ctrCrearDocente()
    {
        if (isset($_POST["nuevoNombre"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["nuevoNombre"])) {
                $tabla = "asesor";
                $datos = array(
                    "nombre" => $_POST["nuevoNombre"]
                );
                $respuesta = modeloDocentes::mdlIngresarDocente($tabla, $datos);
                echo $respuesta;
                if ($respuesta == "ok") {
                    echo '<script>
                    Swal.fire({
                    type: "success",
                    title: "!Registrado Correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    }).then((result)=>{
                    if(result.value){
                       window.location = "Docentes";
                    }
                    });
                    </script>';
                }
            } else {
                echo '<script>
				   Swal.fire({
						type: "error",
					   title: "!El campo nombre no puede estar vacio o llevar caracteres especiales",
					   showConfirmButton: true,
					   confirmButtonText: "Cerrar",
					   closeOnConfirm: false
				   }).then((result)=>{
					   if(result.value){
						   window.location = "Docentes";
					   }
					   });
				 </script>';
            }
        }
    }
    /*=============================================
    MOSTRAR DOCENTE
    =============================================*/
    public static function ctrMostrarDocentes($item, $valor)
    {
        $tabla = "asesor";
        $respuesta = ModeloDocentes::MdlMostrarDocentes($tabla, $item, $valor);
        return $respuesta;
    }
    /*=============================================
    EDITAR DOCENTE
    =============================================*/
    public static function ctrEditarDocente()
    {
        {
            if (isset($_POST["editarNombre"])) {
                if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["editarNombre"])) {
                    $tabla = "asesor";
                    $datos = array(
                        "id" => $_POST["idDocente"],
                        "nombre" => $_POST["editarNombre"]
                    );
                    $respuesta = modeloDocentes::mdlEditarDocente($tabla, $datos);
                    /* echo $datos["id"];
                    echo $respuesta; */
                    if ($respuesta == "ok") {
                        echo '<script>
                        Swal.fire({
                        type: "success",
                        title: "!Registrado Correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        }).then((result)=>{
                        if(result.value){
                           window.location = "Docentes";
                        }
                        });
                        </script>';
                    }
                } else {
                    echo '<script>
                       Swal.fire({
                            type: "error",
                           title: "!El campo nombre no puede estar vacio o llevar caracteres especiales",
                           showConfirmButton: true,
                           confirmButtonText: "Cerrar",
                           closeOnConfirm: false
                       }).then((result)=>{
                           if(result.value){
                               window.location = "Docentes";
                           }
                           });
                     </script>';
                }
            }
        }
    }
    /*=============================================
    BORRAR DOCENTE
    =============================================*/
    public static function ctrBorrarDocente(){
        if (isset($_GET["idDocente"])) {
            $tabla = "asesor";
            $datos = $_GET["idDocente"];

            $respuesta = ModeloDocentes::MdlBorrarDocente($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
			   Swal.fire({
					type: "success",
				   title: "!Eliminado Correctamente",
				   showConfirmButton: true,
				   confirmButtonText: "Cerrar",
				   closeOnConfirm: false
			   }).then((result)=>{
				   if(result.value){
					   window.location = "Docentes";
				   }
				   });
			 </script>';
            }
        }
    }
}
 