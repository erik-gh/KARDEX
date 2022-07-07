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
            <h3 class="m-y-0 text-success text-center font-18"><b><?= $data['page_title'] ?></b></h3>
          </div>
          <div class="panel-body">

     
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <h4 class="m-y-0 text-primary text-center font-14"><b>DETALLE INGRESOS </b></h4><bR>
                <div class="table-responsive">                    
                      <div id="tbl_resumenControlIngreso" class="dataTables_wrapper form-inline" role="grid">
                        <table id="tableControlIngreso" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                          <thead class="text-center font-table">
                            <tr class="bg-primary">
                              <th class="text-center" width="35%">ULTIMOS 5 DIAS</th>
                              <th class="text-center" width="65%" colspan="3">REGISTROS TOTALES</th>
                            </tr>
                            <tr class="bg-primary">
                              <th class="text-center" width="35%">FECHA</th>
                              <th class="text-center" width="65%">TOTAL DE INGRESO</th>
                              
                             
                            </tr>
                          </thead>
                          <tbody class="text-center font-table">
                          </tbody>
                        </table>                             
                    </div>
                </div>
              </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <h4 class="m-y-0 text-primary text-center font-14"><b>DETALLE SALIDAS </b></h4><bR>
                <div class="table-responsive">                    
                      <div id="tbl_resumenControlSalida" class="dataTables_wrapper form-inline" role="grid">
                        <table id="tableControlSalida" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                          <thead class="text-center font-table">
                            <tr class="bg-primary">
                              <th class="text-center" width="35%">ULTIMOS 5 DIAS</th>
                              <th class="text-center" width="65%" colspan="3">REGISTROS TOTALES</th>
                            </tr>
                            <tr class="bg-primary">
                              <th class="text-center" width="35%">FECHA</th>
                              <th class="text-center" width="65%">TOTAL DE SALIDAS</th>
                              
                             
                            </tr>
                          </thead>
                          <tbody class="text-center font-table">
                          </tbody>
                        </table>                             
                    </div>
                </div>
              </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <h4 class="m-y-0 text-success text-center font-14"><b>DETALLE REQUERIMIENTO </b></h4><bR>
                <div class="table-responsive">                    
                      <div id="tbl_resumenControlRequerimiento" class="dataTables_wrapper form-inline" role="grid">
                        <table id="tableControlRequerimiento" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                          <thead class="text-center font-table">
                            <tr class="bg-success">
                              <th class="text-center" width="35%">ULTIMOS 5 DIAS</th>
                              <th class="text-center" width="65%" colspan="3">REGISTROS TOTALES</th>
                            </tr>
                            <tr class="bg-success">
                              <th class="text-center" width="35%">FECHA</th>
                              <th class="text-center" width="65%">TOTAL DE REQUERIMIENTOS</th>
                              
                             
                            </tr>
                          </thead>
                          <tbody class="text-center font-table">
                          </tbody>
                        </table>                             
                    </div>
                </div>
              </div>
             
            </div>

                      <div class="row">                        
                          <div class="col-md-12 col-sm-12">
                            <div class="panel panel-default  panel-table m-b-0 " id="paneldetallecompras">
                              <div class="panel-heading ">
                                <h4 class="text-center text-danger font-18"><strong>DETALLE INGRESOS</strong></h4>
                              </div>
                              <div class="panel-body">
                                <div class="table-responsive">
                                  <div id="tbl_totalingresos" class="dataTables_wrapper form-inline" role="grid">
                                    <table id="tableTotalIngresos" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                      <thead class="text-center font-table">
                                        <tr class="bg-primary">
                                          <th class="text-center" width="5%">Nº</th>
                                          <th class="text-center" width="17%">ALMACEN</th>
                                          <th class="text-center" width="17%">PROVEEDOR</th>
                                          <th class="text-center" width="10%">DOCUMENTO</th>
                                          <th class="text-center" width="10%">SERIE</th>
                                          <th class="text-center" width="10%">FECHA-DOC</th>
                                          <th class="text-center" width="10%">USUARIO</th>
                                          <th class="text-center" width="8%">ESTADO</th>
                                         
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

                      <div class="row">                        
                            <div class="col-md-12 col-sm-12">
                              <div class="panel panel-default  panel-table m-b-0 " id="paneldetallesalidas">
                                <div class="panel-heading ">
                                  <h4 class="text-center text-danger font-18"><strong>DETALLE DE SALIDAS</strong></h4>
                                </div>
                                <div class="panel-body">
                                  <div class="table-responsive">
                                    <div id="tbl_totalingresos" class="dataTables_wrapper form-inline" role="grid">
                                      <table id="tableTotalSalidas" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                        <thead class="text-center font-table">
                                          <tr class="bg-primary">
                                            
                                            <th class="text-center" width="18%">CENTRO CONSUMO</th>
                                            <th class="text-center" width="8%">SERIE</th>
                                            <th class="text-center" width="9%">FECHA</th>
                                            <th class="text-center" width="9%">SUCURSAL</th>
                                            <th class="text-center" width="9%">PROCESO</th>
                                            <th class="text-center" width="9%">PERSONAL REC.</th>
                                            <th class="text-center" width="8%">USUARIO</th>
                                            <th class="text-center" width="8%">ESTADO</th>
                                            
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


                      <div class="row">  
                        <div class="col-md-12 col-sm-12">
                            <div class="panel panel-default  panel-table m-b-0 " id="paneldetallerequerimiento">
                              <div class="panel-heading ">
                                <h4 class="text-center text-danger font-18"><strong>DETALLE DE REQUERIMIENTOS</strong></h4>
                              </div>
                              <div class="panel-body">
                                <div class="table-responsive">
                                  <div id="tbl_totalingresos" class="dataTables_wrapper form-inline" role="grid">
                                    <table id="tableTotalRequerimientos" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                      <thead class="text-center font-table">
                                        <tr class="bg-primary">
                                          <th class="text-center" width="5%">Nº</th>
                                          <th class="text-center" width="8%">CENTRO DE CONSUMO</th>
                                          <th class="text-center" width="12%">SOLICITANTE</th>
                                          <th class="text-center" width="8%">N°Orden</th>
                                          <th class="text-center" width="9%">CREADO</th>
                                          <th class="text-center" width="8%">PROCESADO</th>
                                          <th class="text-center" width="8%">DESPACHADO</th>
                                          <th class="text-center" width="6%">PRIORIDAD</th>
                                          <th class="text-center" width="10%">ESTADO</th>
                                         
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

      <div class="site-footer">
        2022 © Sistema Kardex
      </div>
    </div>
    
    <!-- FOOTER -->
    <?php footerAdmin($data); ?>
  </body>

<!-- Mirrored from big-bang-studio.com/cosmos/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:53:30 GMT -->
</html>