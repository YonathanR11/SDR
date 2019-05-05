<div class="col-12 mt-3">
    <div class="card">
        <!-- <h2 class="ml-4">Docentes</h2> -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card align-self-start  mt-3">
                <h4 class="header-title mb-3">Grafica de registros</h4>
                        <div class="seo-fact sbg2 mt-4" id="divResidenciasInit">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="fa fa-user-friends"></i>Informe Tecnico de Residencias Profesionales</div>
                                <!-- <div class="seofct-icon"><img class="w-25" src="vistas/assets/images/author/residentes.svg"> Residentes</div> -->
                                
                                <?php
                                $valor = 1;
                                $totalR = ControladorInicio::ctrMostrarResidentesInicio($valor);
                                    echo "<h2>".$totalR["total"]."</h2>";
                                ?>
                                
                            </div>
                            <canvas id="seolinechart1" height="50"></canvas>
                        </div>
                    </div>
                    <div class="card align-self-end mt-5">
                        <div class="seo-fact sbg3">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="fa fa-user-friends"></i> Tesis Profesional</div>
                                <!-- <div class="seofct-icon"><img class="w-25" src="vistas/assets/images/author/residentes.svg"> Residentes</div> -->
                                <?php
                                $valor = 2;
                                $totalT = ControladorInicio::ctrMostrarResidentesInicio($valor);
                                    echo "<h2>".$totalT["total"]."</h2>";
                                ?>
                            </div>
                            <canvas id="seolinechart2" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <!-- circular -->
                <div class="col-lg-6 align-self-center">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Grafica de registros</h4>
                            <canvas id="GrafoRT" height="200" ></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>