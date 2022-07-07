<!DOCTYPE html>
<html lang="es">
   <!-- HEAD --> 
  <?php headAdmin($data); ?>
  <body class="layout layout-header-fixed layout-left-sidebar-fixed">
    <div class="site-overlay"></div>
    <div class="site-header">
      <!-- HEADER -->
      <?php headerAdmin($data); ?>
    </div>
    <div class="site-main">
      <div class="site-left-sidebar">
        <!-- SIDEBAR MENU -->
        <?php sidebarAdmin($data); ?>
      </div>
      <div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0 text-danger text-center font-18"><b><?= $data['page_title'] ?></b></h3>
          </div>
          <div class="panel-body">
            <div class="row">
              
              <div class="col-md-12">
                <ul class="nav nav-tabs nav-tabs-custom m-b-15">
                  <li class="active">
                    <a href="#tab-proceso" role="tab" data-toggle="tab" aria-expanded="true">
                      <i class="zmdi zmdi-labels"></i> PROCESO</a>
                  </li>
                  <li class="">
                    <a href="#tab-imprenta" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-print"></i> IMPRENTA</a>
                  </li>
                  <li class="">
                    <a href="#tab-formato" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-view-module"></i> FORMATOS</a>
                  </li>
                </ul>

                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab-proceso">
                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-12" id="titleProceso"><strong>REGISTRAR PROCESO</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <!-- <div class="col-lg-1"></div> -->
                              <div class="col-lg-12">
                                <form class="form" id="form_registerProceso" method="POST" autocomplete="off" action="javascript:void(0);">
                                  <input class="form-control" type="hidden" id="txtIDProceso" name="txtIDProceso">
                                  <input class="form-control" type="hidden" id="txtcontrolProceso" name="txtcontrolProceso" value="0">
                                  <div class="panel panel-default">
                                    <div class="panel-body">
                                      <!-- <h5 class="text-blue-grey m-b-15"><strong>DATOS PERSONALES</strong></h5> -->
                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Código Proceso</label>
                                            <div class="input-group-prepend">
                                              <input class="form-control vld" type="text" id="txtcodproceso" name="txtcodproceso" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Nombre Proceso</label>
                                            <div class="input-group-prepend"> 
                                              <input class="form-control vld" type="text" id="txtnomproceso" name="txtnomproceso" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Fecha Inicio</label>
                                            <div class="input-group-prepend">
                                              <input class="form-control vld" type="date" id="txtfechainicio" name="txtfechainicio" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Fecha Cierre</label>
                                            <div class="input-group-prepend">
                                              <input class="form-control vld" type="date" id="txtfechacierre" name="txtfechacierre" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- <h5 class="text-blue-grey m-b-15"><strong>DATOS DEL USUARIO</strong></h5> -->
                                      <div class="row" id="estado_proceso" style="display: none;">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="switches-stacked">
                                            <label>Activo</label>
                                            <label class="switch switch-primary">  
                                              <input type="checkbox" id="chkestadoProceso" name="chkestadoProceso" class="s-input">
                                              <span class="s-content">
                                                <span class="s-track"></span>
                                                <span class="s-handle"></span>
                                              </span>
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="clearfix m-t-30">
                                        <div class="pull-right">
                                          <button type="submit" class="btn btn-outline-primary" id="agregarProceso"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> Guardar</span></button>
                                          <button type="submit" class="btn btn-outline-primary" id="updateProceso" style="display: none;"><i class="zmdi zmdi-refresh zmdi-hc-fw m-r-5"></i><span> Actualizar</span></button>
                                          <a class="btn btn-outline-danger" id="cancelProceso" onclick="cancelProceso();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <!-- <div class="col-lg-1"></div> -->
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-8 col-sm-8">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-12"><strong>LISTA DE PROCESOS</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="table-responsive">
                              <div id="tbl_proceso" class="dataTables_wrapper form-inline" role="grid">
                                <table id="tableProcesoss" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                  <thead class="text-center font-table">
                                      <tr class="bg-primary">
                                          <th class="text-center" width="5%">Nº</th>
                                          <th class="text-center" width="15%">COD. PROCESO</th>
                                          <th class="text-center" width="30%">NOMBRE PROCESO</th>
                                          <th class="text-center" width="15%">FECHA INICIO</th>
                                          <th class="text-center" width="15%">FECHA FIN</th>
                                          <th class="text-center" width="10%">ESTADO</th>
                                          <th class="text-center" width="10%">ACCI&Oacute;N</th>
                                      </tr>
                                  </thead>
                                  <tbody class="text-center font-table">
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                 
                  <div role="tabpanel" class="tab-pane fade" id="tab-imprenta"> 
                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-12" id="titleImprenta"><strong>REGISTRAR IMPRENTA</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <!-- <div class="col-lg-1"></div> -->
                              <div class="col-lg-12">
                                <form class="form" id="form_registerImprenta" method="POST" autocomplete="off" action="javascript:void(0);">
                                  <input class="form-control" type="hidden" id="txtIDImprenta" name="txtIDImprenta">
                                  <input class="form-control" type="hidden" id="txtcontrolImprenta" name="txtcontrolImprenta" value="0">
                                  <div class="panel panel-default">
                                    <div class="panel-body">
                                      <!-- <h5 class="text-blue-grey m-b-15"><strong>DATOS PERSONALES</strong></h5> -->
                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Imprenta</label>
                                            <div class="input-group-prepend">
                                              <input class="form-control vld" type="text" id="txtimprenta" name="txtDNI" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Direcci&oacute;n</label>
                                            <div class="input-group-prepend">
                                              <input class="form-control vld" type="text" id="txtdireccion" name="txtdireccion" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Tel&eacute;fono</label>
                                            <div class="input-group-prepend">
                                              <input class="form-control vld" type="text" id="txttelefono" name="txttelefono" minlength="9" maxlength="9" onkeypress="SoloNum()" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="row" id="estado_imprenta" style="display: none;">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="switches-stacked">
                                            <label>Activo</label>
                                            <label class="switch switch-primary">  
                                              <input type="checkbox" id="chkestadoImprenta" name="chkestadoImprenta" class="s-input">
                                              <span class="s-content">
                                                <span class="s-track"></span>
                                                <span class="s-handle"></span>
                                              </span>
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="clearfix m-t-30">
                                        <div class="pull-right">
                                          <button type="submit" class="btn btn-outline-primary" id="agregarImprenta"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> Guardar</span></button>
                                          <button type="submit" class="btn btn-outline-primary" id="updateImprenta" style="display: none;"><i class="zmdi zmdi-refresh zmdi-hc-fw m-r-5"></i><span> Actualizar</span></button>
                                          <a class="btn btn-outline-danger" id="cancelImprenta" onclick="cancelImprenta();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <!-- <div class="col-lg-1"></div> -->
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-8 col-sm-8">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-12"><strong>LISTA DE IMPRENTAS</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="table-responsive">
                              <div id="tbl_usuario" class="dataTables_wrapper form-inline" role="grid">
                                <table id="tableImprentas" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                  <thead class="text-center font-table">
                                    <tr class="bg-primary">
                                      <th class="text-center" width="5%">Nº</th>
                                      <th class="text-center" width="35%">IMPRENTA</th>
                                      <th class="text-center" width="25%">DIRECCI&Oacute;N</th>
                                      <th class="text-center" width="15%">TEL&Eacute;FONO</th>
                                      <th class="text-center" width="10%">ESTADO</th>
                                      <th class="text-center" width="10%">ACCI&Oacute;N</th>
                                    </tr>
                                  </thead>
                                  <tbody class="text-center font-table">
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div role="tabpanel" class="tab-pane fade" id="tab-formato">
                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-12" id="titleFormato"><strong>REGISTRAR FORMATO</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <!-- <div class="col-lg-1"></div> -->
                              <div class="col-lg-12">
                                <form class="form" id="form_registerFormato" method="POST" autocomplete="off" action="javascript:void(0);">
                                  <input class="form-control" type="hidden" id="txtIDFormato" name="txtIDFormato">
                                  <input class="form-control" type="hidden" id="txtcontrolFormato" name="txtcontrolFormato" value="0">
                                  <div class="panel panel-default">
                                    <div class="panel-body">
                                      <!-- <h5 class="text-blue-grey m-b-15"><strong>DATOS PERSONALES</strong></h5> -->
                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Formato</label>
                                            <div class="input-group-prepend">
                                              <input class="form-control vld" type="text" id="txtformato" name="txtDNI" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Descripci&oacute;n</label>
                                            <div class="input-group-prepend">
                                              <input class="form-control vld" type="text" id="txtdescripcion" name="txtdescripcion" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="row" id="estado_formato" style="display: none;">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="switches-stacked">
                                            <label>Activo</label>
                                            <label class="switch switch-primary">  
                                              <input type="checkbox" id="chkestadoFormato" name="chkestadoFormato" class="s-input">
                                              <span class="s-content">
                                                <span class="s-track"></span>
                                                <span class="s-handle"></span>
                                              </span>
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="clearfix m-t-30">
                                        <div class="pull-right">
                                          <button type="submit" class="btn btn-outline-primary" id="agregarFormato"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> Guardar</span></button>
                                          <button type="submit" class="btn btn-outline-primary" id="updateFormato" style="display: none;"><i class="zmdi zmdi-refresh zmdi-hc-fw m-r-5"></i><span> Actualizar</span></button>
                                          <a class="btn btn-outline-danger" id="cancelFormato" onclick="cancelFormato();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <!-- <div class="col-lg-1"></div> -->
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-8 col-sm-8">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-12"><strong>LISTA DE FORMATOS</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="table-responsive">
                              <div id="tbl_usuario" class="dataTables_wrapper form-inline" role="grid">
                                <table id="tableFormatos" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                  <thead class="text-center font-table">
                                    <tr class="bg-primary">
                                      <th class="text-center" width="10%">Nº</th>
                                      <th class="text-center" width="35%">FORMATO</th>
                                      <th class="text-center" width="35%">DESCRIPCI&Oacute;N</th>
                                      <th class="text-center" width="10%">ESTADO</th>
                                      <th class="text-center" width="10%">ACCI&Oacute;N</th>
                                    </tr>
                                  </thead>
                                  <tbody class="text-center font-table">
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="site-footer">
        2019 © Sistema
      </div>
    </div>
    
    <!-- FOOTER -->
    <?php footerAdmin($data); ?>
  </body>

</html>