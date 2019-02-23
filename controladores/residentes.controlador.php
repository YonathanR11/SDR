<?php

class ControladorResidentes
{

    /*=============================================
    MOSTRAR TODOS LOS ASESORES/REVISORES/SUPLENTES
    =============================================*/
    public static function ctrMostrarTodosLosDocesentes()
    {
        $tabla = "asesor";
        $item = "noResidentes";
        $valor = "7";
        echo $tabla . ' ' . $item . ' ' . $valor;
        $respuesta = ModeloResidentes::MdlMostrarDocentes($tabla, $item, $valor);

        foreach ($respuesta as $key => $value) {
            echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
        }
    }


    /*=============================================
    MOSTRAR TODOS LOS RESIDENTES
    =============================================*/
    public static function ctrMostrarResidentes()
    {
        $tabla = "residentes";
        $item = null;
        $valor = "";

        $respuesta = ModeloResidentes::MdlMostrarResidentesEnTabla($tabla, $item, $valor);

        foreach ($respuesta as $key => $value) {
            echo ' <tr>
                            <td>' . $value["id"] . '</td>
                            <td>' . $value["nombre"] . '</td>
                            <td>' . $value["noControl"] . '</td>
                            <td>' . $value["carrera"] . '</td>
                            <td>' . $value["sexo"] . '</td>
                            <td>' . $value["telefono"] . '</td>
                            <td>' . $value["nombreProyecto"] . '</td>
                            <td>' . $value["tipo"] . '</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning"  idResidente="' . $value["id"] . '" data-toggle="modal" data-target="#modalER"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-primary btnInfoResidente" idResidente="' . $value["id"] . '" data-toggle="modal" data-target="#modalInfo"><i class="fa fa-info"></i></button>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#modalFormatos"><i class="fa fa-print"></i></button>
                                </div>
                            </td>
                        </tr>';
        }
    }

    /*=============================================
    MOSTRAR INFO DEL RESIDENTE
    =============================================*/
    public static function ctrMostrarInfoResidentes($item, $valor)
    {
        $tabla = "residentes";
        /* $item = null; */

        /* $valor = $_POST["idResidente"]; */
        $respuesta = ModeloResidentes::MdlMostrarInfoResidentes($tabla, $item, $valor);

        /* foreach ($res3 as $key => $value) {
        echo '<h6>'.$value["nombre"].'<h6><br>';
        echo '<h6>'.$value["carrera"].'<h6><br>';
        echo '<h6>'.$value["periodo"].'<h6><br>';
        echo '<h6>'.$value["sexo"].'<h6><br>';
        echo '<h6>'.$value["telefono"].'<h6><br>';
        echo '<h6>'.$value["tipo_registro"].'<h6><br>';
        echo '<hr>';
        echo '<h6>'.$value["nombreProyecto"].'<h6><br>';
        echo '<h6>'.$value["nombreEmpresa"].'<h6><br>';
        echo '<h6>'.$value["asesorExt"].'<h6><br>';
        echo '<h6>'.$value["asesorInt"].'<h6><br>';
        echo '<h6>'.$value["revisor1"].'<h6><br>';
        echo '<h6>'.$value["revisor2"].'<h6><br>';
        echo '<h6>'.$value["revisor3"].'<h6><br>';
        echo '<h6>'.$value["suplente"].'<h6><br>';
    } */
        return $respuesta;
    }



    /*=============================================
    REGISTRAR RESIDENTES
    =============================================*/

    public static function ctrRegistrarResidentes()
    {
        if (isset($_POST["nuevoNoControl"])) {

            $tabla1 = "proyecto";
            $tabla2 = "residentes";
            $tipo = 1;
            //$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


            $na = null;
            $datosProyecto = array(
                "nombreProyecto" => $_POST["nuevoNombreProyecto"],
                "nombreEmpresa" => $_POST["nuevoNombreEmpresa"],
                "asesorExt" => $_POST["nuevoAsesorExt"],
                "asesorInt" => $_POST["nuevoAsesorInt"],
                "revisor1" => $_POST["nuevoRevisor1"],
                "revisor2" => $_POST["nuevoRevisor2"],
                "revisor3" => $na,
                "suplente" => $_POST["nuevoSuplente"]
            );

            $respuestaProyecto = ModeloResidentes::mdlRegistroResidenteProyecto($tabla1, $datosProyecto);


            if ($respuestaProyecto == "ok") {

                $revisarProyecto = ModeloResidentes::mdlRevisarPro($tabla1, $datosProyecto);

                $datosResidente = array(
                    "noControl" => $_POST["nuevoNoControl"],
                    "carrera" => $_POST["nuevoCarrera"],
                    "periodo" => $_POST["nuevoPeriodo"],
                    "anio" => $_POST["nuevoPeriodoAnio"],
                    "nombre" => $_POST["nuevoNombre"],
                    "apellidoP" => $_POST["nuevoApellidoP"],
                    "apellidoM" => $_POST["nuevoApellidoM"],
                    "sexo" => $_POST["nuevoSexo"],
                    "telefono" => $_POST["nuevoTelefono"],
                    "tipo_registro" => $tipo,
                    "proyecto_id" => $revisarProyecto["id"]
                );

                $resResidente = ModeloResidentes::mdlRegistroResidenteDatos($tabla2, $datosResidente);
                if ($resResidente == "ok") {
                    echo '<script>
				Swal.fire({
					 type: "success",
					title: "!Se registro correctamente¡",					   
					showConfirmButton: true,
					confirmButtonText: "Cerrar"				   
				}).then((result)=>{
					if(result.value){
						window.location = "Residentes";
					}
					});
              </script>';
                } else {
                    echo '<script>
                    Swal.fire({
                         type: "success",
                        title: "!No se pudo registrar¡",					   
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"				   
                    }).then((result)=>{
                        if(result.value){
                            window.location = "Residentes";
                        }
                        });
                  </script>';
                }
            } else {
                echo '<script>
				Swal.fire({
					 type: "error",
                    title: "!No se pudo registrar¡",
                    text: "Revisa los datos del Proyecto.",					   
					showConfirmButton: true,
					confirmButtonText: "Cerrar"				   
				}).then((result)=>{
					if(result.value){
						window.location = "Residentes";
					}
					});
			  </script>';
            }
        }
    }
}
