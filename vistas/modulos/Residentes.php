<div class="col-12 mt-5">
    <div class="card">
        <h2 class="ml-4">Residentes</h2>
        <div class="card-body">
            <!-- <h1 class="header-title">Usuarios</h1> -->
            <button class="btn btn-success btn-xs mb-3" data-toggle="modal" data-target="#modalITDRP">Informe Tecnico
                de<br> Residencias Profecionales</button>
            <button class="btn btn-danger btn-xs mb-3" data-toggle="modal" data-target="#modalTP">Tesis <br>
                Profesional</button>
            <div class="data-tables datatable-primary">
                <table class="text-center tablaES">
                    <thead class="text-capitalize">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>No. Control</th>
                            <th>Carrera</th>
                            <th>Sexo</th>
                            <th>Telefono</th>
                            <th>Proyecto</th>
                            <th>Tipo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $VerResidentes = new ControladorResidentes();
                        $VerResidentes->ctrMostrarResidentes();
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!--=====================================
INFORME TECNICO DE RESIDENCIAS PROFECIONALES
======================================-->

<div class="modal fade" id="modalITDRP">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--=====================================
              CABEZA DEL MODAL
              ======================================-->
            <div class="modal-header" style="background:#28A745; color:white">
                <h5 class="modal-title">Alta Residente - Informe Tecnico de Residencias Profecionales</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
                <!-- <form method="post"> -->

                <!--=====================================
              CUERPO DEL MODAL
              ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <h6>Datos de Alumnos</h6>
                        <div class="form-row align-items-center">
                            <!-- ENTRADA PARA EL NUMERO DE CONTROL -->
                            <div class="col-sm-2 my-1">
                                <label for="example-text-input" class="col-form-label">No. Control</label>
                                <input class="form-control" type="number" name="nuevoNoControl" placeholder="No. Control" required autocomplete="off">
                            </div>
                            <!-- ENTRADA PARA SELECCIONAR SU CARRERA -->
                            <div class="col-sm-5 my-1">
                                <label class="col-form-label">Carrera</label>
                                <select class="custom-select" name="nuevoCarrera" required>
                                    <option value="">Selecionar carrera</option>
                                    <option value="Ingenieria en Sistemas Computacionales">Ingenieria en Sistemas
                                        Computacionales</option>
                                    <option value="Ingenieria Informatica">Ingenieria Informatica</option>
                                </select>
                            </div>
                            <!-- ENTRADA PARA SELECCIONAR PERIODO -->
                            <div class="col-sm-3 my-1">
                                <label class="col-form-label">Periodo</label>
                                <select class="custom-select" name="nuevoPeriodo" required>
                                    <option value="">Selecionar periodo</option>
                                    <option value="EJ">Enero/Junio</option>
                                    <option value="AD">Agosto/Diciembre</option>
                                </select>
                            </div>
                            <!-- ENTRADA PARA SELECCIONAR AÑO -->
                            <div class="col-sm-2 my-1">
                                <label class="col-form-label">Año</label>
                                <?php
                                $cont = date('Y');
                                ?>
                                <select class="custom-select" name="nuevoPeriodoAnio" required>
                                    <?php while ($cont >= 2018) { ?>
                                    <option name="anio" value="<?php echo ($cont); ?>">
                                        <?php echo ($cont); ?>
                                    </option>
                                    <?php $cont = ($cont - 1);
                                } ?>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="form-row align-items-center">
                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="col-sm-4 my-1">
                            <label for="example-text-input" class="col-form-label">Nombre</label>
                            <input class="form-control" type="text" name="nuevoNombre" placeholder="Nombre" required autocomplete="off">
                        </div>
                        <!-- ENTRADA PARA EL APELLIDO PATERNO -->
                        <div class="col-sm-4 my-1">
                            <label for="example-text-input" class="col-form-label">Apellido Paterno</label>
                            <input class="form-control" type="text" name="nuevoApellidoP" placeholder="Apellido Paterno" required autocomplete="off">
                        </div>
                        <!-- ENTRADA PARA EL APELLIDO MATERNO -->
                        <div class="col-sm-4 my-1">
                            <label for="example-text-input" class="col-form-label">Apellido Materno</label>
                            <input class="form-control" type="text" name="nuevoApellidoM" placeholder="Apellido Materno" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <!-- ENTRADA PARA SELECCIONAR SU SEXO -->
                        <div class="col-sm-6 my-1">
                            <label class="col-form-label">Sexo</label>
                            <select class="custom-select" name="nuevoSexo" required>
                                <option value="">Selecionar sexo</option>
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                            </select>
                        </div>
                        <!-- ENTRADA PARA EL TELEFONO -->
                        <div class="col-sm-6 my-1">
                            <label for="example-text-input" class="col-form-label">Telefono</label>
                            <input class="form-control" type="tel" name="nuevoTelefono" placeholder="Telefono" autocomplete="off">
                        </div>
                    </div>
                    <hr>
                    <h6>Datos de Proyecto</h6>
                    <div class="form-row align-items-center">
                        <!-- ENTRADA PARA EL NOMBRE DEL PROYECTO -->
                        <div class="col-sm-6 my-1">
                            <label for="example-text-input" class="col-form-label">Nombre del Proyecto</label>
                            <input class="form-control" type="text" name="nuevoNombreProyecto" placeholder="Nombre del Proyecto" required autocomplete="off">
                        </div>
                        <!-- ENTRADA PARA EL NOMBRE DE LA EMPRESA -->
                        <div class="col-sm-6 my-1">
                            <label for="example-text-input" class="col-form-label">Nombre de la Empresa</label>
                            <input class="form-control" type="text" name="nuevoNombreEmpresa" placeholder="Nombre de la Empresa" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <!-- ENTRADA PARA ASESOR EXTERNO -->
                        <div class="col-sm-6 my-1">
                            <label for="example-text-input" class="col-form-label">Asesor Externo</label>
                            <input class="form-control" type="text" name="nuevoAsesorExt" placeholder="Asesor Externo" required autocomplete="off">
                        </div>
                        <!-- ENTRADA PARA ASESOR INTERNO -->
                        <div class="col-sm-6 my-1">
                            <label class="col-form-label">Asesor Interno</label>
                            <select class="custom-select" name="nuevoAsesorInt" required>
                                <option value="">Selecionar Asesor</option>
                                <?php
                                $verDocente = new ControladorResidentes();
                                $verDocente->ctrMostrarTodosLosDocesentes();
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <!-- ENTRADA PARA REVISOR #1 -->
                        <div class="col-sm-6 my-1">
                            <label class="col-form-label">Revisor #1</label>
                            <select class="custom-select" name="nuevoRevisor1" required>
                                <option value="">Selecionar revisor</option>
                                <?php
                                $verDocente = new ControladorResidentes();
                                $verDocente->ctrMostrarTodosLosDocesentes();
                                ?>
                            </select>
                        </div>
                        <!-- ENTRADA PARA REVISOR #2 -->
                        <div class="col-sm-6 my-1">
                            <label class="col-form-label">Revisor #2</label>
                            <select class="custom-select" name="nuevoRevisor2" required>
                                <option value="">Selecionar revisor</option>
                                <?php
                                $verDocente = new ControladorResidentes();
                                $verDocente->ctrMostrarTodosLosDocesentes();
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <!-- ENTRADA PARA SUPLENTE -->
                        <div class="col-sm-6 my-1">
                            <label class="col-form-label">Suplente</label>
                            <select class="custom-select" name="nuevoSuplente" required>
                                <option value="">Selecionar suplente</option>
                                <?php
                                $verDocente = new ControladorResidentes();
                                $verDocente->ctrMostrarTodosLosDocesentes();
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!--=====================================
              PIE DEL MODAL
              ======================================-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar residente</button>
                </div>

                <?php

                $RegistrarResidente = new ControladorResidentes();
                $RegistrarResidente->ctrRegistrarResidentes();

                ?>

            </form>
        </div>
    </div>
</div>
</div>

<!--=====================================
TESIS PROFESIONAL
======================================-->

<div class="modal fade" id="modalTP">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--=====================================
              CABEZA DEL MODAL
              ======================================-->
            <div class="modal-header" style="background:#DC3545; color:white">
                <h5 class="modal-title">Alta Residente - Informe Tecnico de Residencias Profecionales</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
                <!-- <form method="post"> -->

                <!--=====================================
              CUERPO DEL MODAL
              ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <h6>Datos de Alumnos</h6>
                        <div class="form-row align-items-center">
                            <!-- ENTRADA PARA EL NUMERO DE CONTROL -->
                            <div class="col-sm-2 my-1">
                                <label for="example-text-input" class="col-form-label">No. Control</label>
                                <input class="form-control" type="number" name="nuevoNoControl" placeholder="No. Control" required autocomplete="off">
                            </div>
                            <!-- ENTRADA PARA SELECCIONAR SU CARRERA -->
                            <div class="col-sm-5 my-1">
                                <label class="col-form-label">Carrera</label>
                                <select class="custom-select" name="nuevoCarrera" required>
                                    <option value="">Selecionar carrera</option>
                                    <option value="ISC">Ingenieria en Sistemas Computacionales</option>
                                    <option value="II">Ingenieria Informatica</option>
                                </select>
                            </div>
                            <!-- ENTRADA PARA SELECCIONAR PERIODO -->
                            <div class="col-sm-3 my-1">
                                <label class="col-form-label">Periodo</label>
                                <select class="custom-select" name="nuevoPeriodo" required>
                                    <option value="">Selecionar periodo</option>
                                    <option value="EJ">Enero/Junio</option>
                                    <option value="AD">Agosto/Diciembre</option>
                                </select>
                            </div>
                            <!-- ENTRADA PARA SELECCIONAR AÑO -->
                            <div class="col-sm-2 my-1">
                                <label class="col-form-label">Año</label>
                                <?php
                                $cont = date('Y');
                                ?>
                                <select class="custom-select" name="nuevoPeriodoAnio" required>
                                    <?php while ($cont >= 2018) { ?>
                                    <option name="anio" value="<?php echo ($cont); ?>">
                                        <?php echo ($cont); ?>
                                    </option>
                                    <?php $cont = ($cont - 1);
                                } ?>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="form-row align-items-center">
                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="col-sm-4 my-1">
                            <label for="example-text-input" class="col-form-label">Nombre</label>
                            <input class="form-control" type="text" name="nuevoNombre" placeholder="Nombre" required autocomplete="off">
                        </div>
                        <!-- ENTRADA PARA EL APELLIDO PATERNO -->
                        <div class="col-sm-4 my-1">
                            <label for="example-text-input" class="col-form-label">Apellido Paterno</label>
                            <input class="form-control" type="text" name="nuevoApellidoP" placeholder="Apellido Paterno" required autocomplete="off">
                        </div>
                        <!-- ENTRADA PARA EL APELLIDO MATERNO -->
                        <div class="col-sm-4 my-1">
                            <label for="example-text-input" class="col-form-label">Apellido Materno</label>
                            <input class="form-control" type="text" name="nuevoApellidoM" placeholder="Apellido Materno" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <!-- ENTRADA PARA SELECCIONAR SU SEXO -->
                        <div class="col-sm-6 my-1">
                            <label class="col-form-label">Sexo</label>
                            <select class="custom-select" name="nuevoSexo" required>
                                <option value="">Selecionar sexo</option>
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                            </select>
                        </div>
                        <!-- ENTRADA PARA EL TELEFONO -->
                        <div class="col-sm-6 my-1">
                            <label for="example-text-input" class="col-form-label">Telefono</label>
                            <input class="form-control" type="tel" name="nuevoTelefono" placeholder="Telefono" autocomplete="off">
                        </div>
                    </div>
                    <hr>
                    <h6>Datos de Proyecto</h6>
                    <div class="form-row align-items-center">
                        <!-- ENTRADA PARA EL NOMBRE DEL PROYECTO -->
                        <div class="col-sm-6 my-1">
                            <label for="example-text-input" class="col-form-label">Nombre del Proyecto</label>
                            <input class="form-control" type="text" name="nuevoNombreProyecto" placeholder="Nombre del Proyecto" required autocomplete="off">
                        </div>
                        <!-- ENTRADA PARA EL NOMBRE DE LA EMPRESA -->
                        <div class="col-sm-6 my-1">
                            <label for="example-text-input" class="col-form-label">Nombre de la Empresa</label>
                            <input class="form-control" type="text" name="nuevoNombreEmpresa" placeholder="Nombre de la Empresa" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <!-- ENTRADA PARA ASESOR INTERNO -->
                        <div class="col-sm-6 my-1">
                            <label class="col-form-label">Asesor Interno</label>
                            <select class="custom-select" name="nuevoAsesorInt" required>
                                <option value="">Selecionar Asesor</option>
                                <?php
                                $verDocente = new ControladorResidentes();
                                $verDocente->ctrMostrarTodosLosDocesentes();
                                ?>
                            </select>
                        </div>
                        <!-- ENTRADA PARA REVISOR #1 -->
                        <div class="col-sm-6 my-1">
                            <label class="col-form-label">Revisor #1</label>
                            <select class="custom-select" name="nuevoRevisor1" required>
                                <option value="">Selecionar revisor</option>
                                <?php
                                $verDocente = new ControladorResidentes();
                                $verDocente->ctrMostrarTodosLosDocesentes();
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <!-- ENTRADA PARA REVISOR #1 -->
                        <div class="col-sm-6 my-1">
                            <label class="col-form-label">Revisor #2</label>
                            <select class="custom-select" name="nuevoRevisor1" required>
                                <option value="">Selecionar revisor</option>
                                <?php
                                $verDocente = new ControladorResidentes();
                                $verDocente->ctrMostrarTodosLosDocesentes();
                                ?>
                            </select>
                        </div>
                        <!-- ENTRADA PARA REVISOR #2 -->
                        <div class="col-sm-6 my-1">
                            <label class="col-form-label">Revisor #3</label>
                            <select class="custom-select" name="nuevoRevisor2" required>
                                <option value="">Selecionar revisor</option>
                                <?php
                                $verDocente = new ControladorResidentes();
                                $verDocente->ctrMostrarTodosLosDocesentes();
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <!-- ENTRADA PARA SUPLENTE -->
                        <div class="col-sm-6 my-1">
                            <label class="col-form-label">Suplente</label>
                            <select class="custom-select" name="nuevoSuplente" required>
                                <option value="">Selecionar suplente</option>
                                <?php
                                $verDocente = new ControladorResidentes();
                                $verDocente->ctrMostrarTodosLosDocesentes();
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!--=====================================
              PIE DEL MODAL
              ======================================-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar residente</button>
                </div>
        </div>
        </form>

    </div>
</div>
</div>

<!--=====================================
EDITAR RESIDENTE
======================================-->

<div class="modal fade" id="modalER">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--=====================================
              CABEZA DEL MODAL
              ======================================-->
            <div class="modal-header" style="background:#FFC107; color:white">
                <h5 class="modal-title">Editar Residente</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
                <!-- <form method="post"> -->

                <!--=====================================
              CUERPO DEL MODAL
              ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <h6>Datos de Alumnos</h6>
                        <div class="form-row align-items-center">
                            <!-- ENTRADA PARA EL NUMERO DE CONTROL -->
                            <div class="col-sm-2 my-1">
                                <label for="example-text-input" class="col-form-label">No. Control</label>
                                <input class="form-control" type="number" name="nuevoNoControl" placeholder="No. Control" required autocomplete="off">
                            </div>
                            <!-- ENTRADA PARA SELECCIONAR SU CARRERA -->
                            <div class="col-sm-5 my-1">
                                <label class="col-form-label">Carrera</label>
                                <select class="custom-select" name="nuevoCarrera" required>
                                    <option value="">Selecionar carrera</option>
                                    <option value="ISC">Ingenieria en Sistemas Computacionales</option>
                                    <option value="II">Ingenieria Informatica</option>
                                </select>
                            </div>
                            <!-- ENTRADA PARA SELECCIONAR PERIODO -->
                            <div class="col-sm-3 my-1">
                                <label class="col-form-label">Periodo</label>
                                <select class="custom-select" name="nuevoPeriodo" required>
                                    <option value="">Selecionar periodo</option>
                                    <option value="EJ">Enero/Junio</option>
                                    <option value="AD">Agosto/Diciembre</option>
                                </select>
                            </div>
                            <!-- ENTRADA PARA SELECCIONAR AÑO -->
                            <div class="col-sm-2 my-1">
                                <label class="col-form-label">Año</label>
                                <?php
                                $cont = date('Y');
                                ?>
                                <select class="custom-select" name="nuevoPeriodoAnio" required>
                                    <?php while ($cont >= 2018) { ?>
                                    <option name="anio" value="<?php echo ($cont); ?>">
                                        <?php echo ($cont); ?>
                                    </option>
                                    <?php $cont = ($cont - 1);
                                } ?>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="form-row align-items-center">
                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="col-sm-4 my-1">
                            <label for="example-text-input" class="col-form-label">Nombre</label>
                            <input class="form-control" type="text" name="nuevoNombre" placeholder="Nombre" required autocomplete="off">
                        </div>
                        <!-- ENTRADA PARA EL APELLIDO PATERNO -->
                        <div class="col-sm-4 my-1">
                            <label for="example-text-input" class="col-form-label">Apellido Paterno</label>
                            <input class="form-control" type="text" name="nuevoApellidoP" placeholder="Apellido Paterno" required autocomplete="off">
                        </div>
                        <!-- ENTRADA PARA EL APELLIDO MATERNO -->
                        <div class="col-sm-4 my-1">
                            <label for="example-text-input" class="col-form-label">Apellido Materno</label>
                            <input class="form-control" type="text" name="nuevoApellidoM" placeholder="Apellido Materno" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <!-- ENTRADA PARA SELECCIONAR SU SEXO -->
                        <div class="col-sm-6 my-1">
                            <label class="col-form-label">Sexo</label>
                            <select class="custom-select" name="nuevoSexo" required>
                                <option value="">Selecionar sexo</option>
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                            </select>
                        </div>
                        <!-- ENTRADA PARA EL TELEFONO -->
                        <div class="col-sm-6 my-1">
                            <label for="example-text-input" class="col-form-label">Telefono</label>
                            <input class="form-control" type="tel" name="nuevoTelefono" placeholder="Telefono" autocomplete="off">
                        </div>
                    </div>
                    <hr>
                    <h6>Datos de Proyecto</h6>
                    <div class="form-row align-items-center">
                        <!-- ENTRADA PARA EL NOMBRE DEL PROYECTO -->
                        <div class="col-sm-6 my-1">
                            <label for="example-text-input" class="col-form-label">Nombre del Proyecto</label>
                            <input class="form-control" type="text" name="nuevoNombreProyecto" placeholder="Nombre del Proyecto" required autocomplete="off">
                        </div>
                        <!-- ENTRADA PARA EL NOMBRE DE LA EMPRESA -->
                        <div class="col-sm-6 my-1">
                            <label for="example-text-input" class="col-form-label">Nombre de la Empresa</label>
                            <input class="form-control" type="text" name="nuevoNombreEmpresa" placeholder="Nombre de la Empresa" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <!-- ENTRADA PARA ASESOR INTERNO -->
                        <div class="col-sm-6 my-1">
                            <label class="col-form-label">Asesor Interno</label>
                            <select class="custom-select" name="nuevoAsesorInt" required>
                                <option value="">Selecionar Asesor</option>
                                <?php
                                $verDocente = new ControladorResidentes();
                                $verDocente->ctrMostrarTodosLosDocesentes();
                                ?>
                            </select>
                        </div>
                        <!-- ENTRADA PARA REVISOR #1 -->
                        <div class="col-sm-6 my-1">
                            <label class="col-form-label">Revisor #1</label>
                            <select class="custom-select" name="nuevoRevisor1" required>
                                <option value="">Selecionar revisor</option>
                                <?php
                                $verDocente = new ControladorResidentes();
                                $verDocente->ctrMostrarTodosLosDocesentes();
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <!-- ENTRADA PARA REVISOR #1 -->
                        <div class="col-sm-6 my-1">
                            <label class="col-form-label">Revisor #2</label>
                            <select class="custom-select" name="nuevoRevisor1" required>
                                <option value="">Selecionar revisor</option>
                                <?php
                                $verDocente = new ControladorResidentes();
                                $verDocente->ctrMostrarTodosLosDocesentes();
                                ?>
                            </select>
                        </div>
                        <!-- ENTRADA PARA REVISOR #2 -->
                        <div class="col-sm-6 my-1">
                            <label class="col-form-label">Revisor #3</label>
                            <select class="custom-select" name="nuevoRevisor2" required>
                                <option value="">Selecionar revisor</option>
                                <?php
                                $verDocente = new ControladorResidentes();
                                $verDocente->ctrMostrarTodosLosDocesentes();
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <!-- ENTRADA PARA SUPLENTE -->
                        <div class="col-sm-6 my-1">
                            <label class="col-form-label">Suplente</label>
                            <select class="custom-select" name="nuevoSuplente" required>
                                <option value="">Selecionar suplente</option>
                                <?php
                                $verDocente = new ControladorResidentes();
                                $verDocente->ctrMostrarTodosLosDocesentes();
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!--=====================================
              PIE DEL MODAL
              ======================================-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar residente</button>
                </div>



            </form>
        </div>
    </div>
</div>
</div>

<!--=====================================
INFORMACION RESIDENTE
======================================-->
<!-- basic modal start -->
<div class="modal fade" id="modalInfo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Informacion del Residente</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- <div class="form-row align-items-center"> -->
                <ul class="list-group list-group-flush">
                    <input class="form-control" type="text" id="InfoNombre" name="InfoNombre" value="">
                    <li class="list-group-item" id="InfoCarrera" name="InfoCarrera" value=""></li>
                    <!-- <input class="list-group-item" type="text" id="InfoNombre" name="InfoNombre" value=""> -->
                    <!-- <p class="list-group-item" type="text" id="InfoNombre" name="InfoNombre" value=""></p> -->
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                </ul>
                <!-- </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!--=====================================
INFORMES DE RESIDENTE PARA IMPRIMIR
======================================-->
<!-- basic modal start -->
<div class="modal fade" id="modalFormatos">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Formatos de Impresion</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-success btn-lg btn-block">Dictamen de anteproyecto de Residencias
                    Profecionales</button>
                <button type="button" class="btn btn-success btn-lg btn-block">Asignación de asesor</button>
                <button type="button" class="btn btn-success btn-lg btn-block">Liberacion de Residencias
                    Profecionales</button>
                <button type="button" class="btn btn-success btn-lg btn-block">Asignacion de jurado</button>
                <button type="button" class="btn btn-success btn-lg btn-block">Comision para titulación</button>
                <button type="button" class="btn btn-success btn-lg btn-block">Ofició de asignacion de sinodales</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div> 