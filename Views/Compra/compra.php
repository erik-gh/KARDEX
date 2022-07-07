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
                    <a href="#tab-productos" role="tab" data-toggle="tab" aria-expanded="true">
                      <i class="zmdi zmdi-accounts-list-alt"></i>INGRESOS</a>
                  </li>
                  <!--li class="">
                    <a href="#tab-proveedor" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-view-module"></i>PROVEEDOR</a>
                  </li-->
                  
                </ul>

              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active in fade" id="tab-productos">
                    <div class="container-fluid">
                      <div class="panel panel-primary" id="panelboton">
                        <div class="panel-heading">
                          <h5 class="text-black m-b-18"><strong>TIPO DE INGRESO</strong></h5> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              
                              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">                                                                     
                                    <div class="row">
                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="pull-left">
                                              <button type="button" class="btn btn-outline-success" id="btnNuevo" onclick="VisualizarPanel();"><i class="zmdi zmdi-view-module zmdi-hc-fw m-r-5"></i><span>AREA INTERNA</span></button>
                                            </div>                                        
                                     </div> 
                                    </div>
                               </div>

                                  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">                                                                     
                                    <div class="row">
                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="pull-left">
                                              <button type="button" class="btn btn-outline-success" id="btnNuevo" onclick="VisualizarPanelCompraoaqui();"><i class="zmdi zmdi-view-module zmdi-hc-fw m-r-5"></i><span>COMPRA O ADQUISICON</span></button>
                                            </div>                                        
                                     </div> 
                                    </div>
                               </div>

                                  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">                                                                     
                                    <div class="row">
                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="pull-left">
                                              <button type="button" class="btn btn-outline-success" id="btnNuevo" onclick="VisualizarPanelRepliegue();"><i class="zmdi zmdi-view-module zmdi-hc-fw m-r-5"></i><span>REPLIEGUE</span></button>
                                            </div>                                        
                                     </div> 
                                    </div>
                               </div>

                            </div>
                        </div>
                      </div>

                      <div class="container-fluid">
                            <div class="row" id= "panelacordionbusq">
                                <div id="accordion">
                                  <div class="card">
                                    <div class="card-header" id="headingThree">
                                      <h10 class="mb-0">
                                        <button  class="btn btn-outline-success" onclick="btnpaneltotalingresos();" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                          BUSQUEDAD DE INGRESOS POR FECHAS
                                        </button>
                                      </h10>
                                    </div>
                                  </br>
                                          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                            <div class="card-body">
                                                
                                                <div class="row">
                                                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                    <div class="form-group">
                                                    </div>
                                                  </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                                   <div class="form-group">
                                                    <label>Almacen:</label>
                                                    <div class="input-group-prepend">
                                                        <select class="form-control claseSelect" name="cboalmacenconsulta" id="cboalmacenconsulta" data-live-search="true" data-size="5" required>
                                                        </select>
                                                    </div>
                                                  </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                                  <div class="form-group">
                                                    <label>Desde:</label>
                                                    <div class="input-group-prepend">
                                                        <input class="form-control claseInput" type="date" id="txtfechadesde" name="txtfechadesde">
                                                    </div>
                                                  </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                                  <div class="form-group">
                                                    <label>Hasta:</label>
                                                    <div class="input-group-prepend">
                                                        <input class="form-control claseInput" type="date" id="txtfechahasta" name="txtfechahasta">
                                                    </div>
                                                  </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                 <div class="form-group">
                                                    <label>.</label>
                                                    <div class="input-group-prepend">
                                                         <button type="button" onclick="viewTablaTotaldeIngresos();" class="btn btn-success"><i class="
                                                              zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span>Iniciar Busquedad</span></button>
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



                        <div class="row">                        
                          <div class="col-md-12 col-sm-12">
                            <div class="panel panel-default  panel-table m-b-0 " id="paneldetallecompras">
                              <div class="panel-heading ">
                                <h4 class="text-center text-danger font-18"><strong>TOTAL DE INGRESOS</strong></h4>
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
                                          <th class="text-center" width="10%">FECHA</th>
                                          <th class="text-center" width="10%">USUARIO</th>
                                          <th class="text-center" width="8%">ESTADO</th>
                                          <th class="text-center" width="13%">&nbsp;&nbsp;ACCI&Oacute;N&nbsp;&nbsp;</th>
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
                            <div class="panel panel-default  panel-table m-b-0 " id="paneldetallecompras2">
                              <div class="panel-heading ">
                                <h4 class="text-center text-danger font-18"><strong>TOTAL DE INGRESOS.</strong></h4>
                              </div>
                              <div class="panel-body">
                                <div class="table-responsive">
                                  <div id="tbl_totalingresos2" class="dataTables_wrapper form-inline" role="grid">
                                    <table id="tableTotalIngresos2" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                      <thead class="text-center font-table">
                                        <tr class="bg-primary">
                                          <th class="text-center" width="5%">Nº</th>
                                          <th class="text-center" width="17%">ALMACEN</th>
                                          <th class="text-center" width="17%">PROVEEDOR</th>
                                          <th class="text-center" width="10%">DOCUMENTO</th>
                                          <th class="text-center" width="10%">SERIE</th>
                                          <th class="text-center" width="10%">FECHA</th>
                                          <th class="text-center" width="10%">USUARIO</th>
                                          <th class="text-center" width="8%">ESTADO</th>
                                          <th class="text-center" width="13%">&nbsp;&nbsp;ACCI&Oacute;N&nbsp;&nbsp;</th>
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

                            <div class="panel panel-default  panel-table m-b-0 " id="panelingreareainterna">
                                <div class="row">
                                  
                                       <div class="col-md-4 col-sm-4">
                                          <div class="panel panel-primary panel-table m-b-0">
                                            <div class="panel-heading">
                                              <h5 class="text-black m-b-18"><strong>DATOS DE LA GUIA DE INGRESO</strong></h5>
                                            </div>
                                            <div class="panel-body">
                                              <div class="row">
                                                <!-- <div class="col-lg-1"></div> -->
                                                <div class="col-lg-12">
                                                  <form class="form" id="form_registrarIngreso" method="POST" autocomplete="off" action="javascript:void(0);">
                                                    <input class="form-control" type="hidden" id="txtIdCompra" name="txtIdCompra">
                                                    <input class="form-control" type="hidden" id="txtcontrolCompra" name="txtcontrolCompra" value="0">
                                                    <div class="panel panel-default">
                                                      <div class="panel-body">
                                                        <!--https://getbootstrap.com/docs/3.3/components/-->
                                                        
                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Almacen:</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-home"></span>
                                                                    </button>
                                                                  </span>
                                                                   <select class="form-control claseSelect" name="cboalmacen" id="cboalmacen" data-live-search="true" data-size="5" required>
                                                                   </select>
                                                                 
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div> 

                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">

                                                            </div>
                                                            <div class="form-group">
                                                              <label>Procesos</label>
                                                              <div class="row">
                                                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="input-group">
                                                                      <button type="button" class="btn btn-default" aria-label="right pull-left">
                                                                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                                                                      </button>                                                            
                                                                      <select class="form-control claseSelect" name="cboproceso" id="cboproceso" data-live-search="true" data-size="5" required>
                                                                      </select>
                                                                    </div>
                                                                  </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>

                                                  
                                                        <!--div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                              <label>Tipo de Ingreso</label>
                                                              <div class="row">
                                                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="input-group">
                                                                      <button type="button" class="btn btn-default" aria-label="right pull-left">
                                                                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                                                                      </button>                                                            
                                                                      <select class="form-control claseSelect" name="cbotipoingreso" id="cbotipoingreso" data-live-search="true" data-size="5" required>
                                                                      </select>
                                                                    </div>
                                                                  </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div-->

                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                              <label>Proveedor</label>
                                                              <div class="row">
                                                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="input-group">
                                                                      <button type="button" class="btn btn-default" aria-label="right pull-left">
                                                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                                                      </button>                                                            
                                                                      <select class="form-control claseSelect" name="cboproveedor" id="cboproveedor" data-live-search="true" data-size="5" required>
                                                                      </select>
                                                                      <button onclick="Visualizarmodarcrearproveedor();" type="button" class="btn btn-success" aria-label="right pull-left">
                                                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                                        </button> 
                                                                    </div>
                                                                  </div>

                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>    

                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                                <label>Tipo Documento</label>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                      <div class="input-group">
                                                                        <button type="button" class="btn btn-default" aria-label="right pull-left">
                                                                          <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                                                        </button>                                                            
                                                                        <select class="form-control claseSelect" name="cbotipodocumento" id="cbotipodocumento" data-live-search="true" data-size="5" required>
                                                                        </select>
                                                                      </div>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>   


 
                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                              <label>Fecha de Documento:</label>
                                                              <div class="input-group-prepend">
                                                                  <input class="form-control claseInput" type="date" id="txtfechadoc" name="txtfechadoc">
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>  

                                                    

                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                              <label>Nro. Doc. de Proveedor:</label>
                                                             <div class="input-group-prepend">
                                                                <input class="form-control vld claseInput" type="text" id="txtserie" name="txtserie" required>
                                                            </div>
                                                            </div>
                                                          </div>
                                                        </div>                                                  
                                                        
                                                        
                                                      </div>
                                                    </div>

                                                            <!--div class="row">

                                                                    <div class="col-md-4 col-sm-4">                                                  
                                                                    </div>  
                                                                    <div class="col-md-4 col-sm-4">
                                                                            <div class="pull-right">
                                                                                <button type="button" onclick="enviarFormIngreso();" class="btn btn-success"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span>Guardar productos</span></button>
                                                                             </div>                                                      
                                                                    </div>  

                                                                  <div class="col-md-4 col-sm-4">
                                                                          <div class="pull-left">
                                                                              <button type="button" onclick="cancelDetalleIngreso();" class="btn btn-danger" id="btncancelar"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></button>
                                                                           </div>                                                     
                                                                  </div>    

                                                            </div--> 

                                                  </form>
                                                </div>
                                                <!-- <div class="col-lg-1"></div> -->
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                               
                                      <div class="col-md-8 col-sm-8">
                                        <div class="panel panel-default panel-table m-b-0" id="panelaint">
                                            <div class="panel-heading">
                                              <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                  <h5 class="text-success m-b-18 " ><strong>MATERIALES A RECEPCIONAR - AREA INTERNA</strong></h5>
                                                </div>  

                                                 <div class="col-md-6 col-sm-6">
                                                        <div class="pull-right">
                                                            <button type="button" onclick="VisualizarModalProducto();" class="btn btn-success" id="btnbuscarproductos"><i class="zmdi zmdi-search zmdi-hc-fw m-r-5"></i><span> Agregar Productos</span></button>
                                                         </div>                                                      
                                                </div> 
                                                  
                                              </div>
                                              <!--div class="row">
                                                 <div class="col-md-9 col-sm-9" >
                                                     <input type="text" class="form-control claseInput ui-autocomplete-input" id="IdMaterialIng"  placeholder="Código o Nombre de Material" maxlength="15" autocomplete="off">                                                         
                                                </div> 
                                                
                                                 <div class="col-md-1 col-sm-1">
                                                        <div class="pull-right">
                                                            <a  class="btn btn-primary" id="agregarproducto"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5" onclick="addProducto();"></i><span>ADD</span></a>
                                                         </div>                                                      
                                                </div> 
                                                <div class="col-md-1 col-sm-1">
                                                                                                          
                                                </div> 
                                              
                                                 <div class="col-md-6 col-sm-6">
                                                        <div class="pull-right">
                                                            <button type="button" onclick="VisualizarModalProducto();" class="btn btn-success" id="btnbuscarproductos"><i class="zmdi zmdi-search zmdi-hc-fw m-r-5"></i><span> Agregar Productos</span></button>
                                                         </div>                                                      
                                                </div> 
                                                
                                              </div-->
                                            </div>

                                            <div class="row">
                                              <div class="panel-body" style="height: 450px; overflow-y: auto; overflow-x: hidden">
                                                <div class="table-responsive">
                                                  <div id="tbl_detalleingreso" class="dataTables_wrapper form-inline" role="grid">
                                                    <table id="tableDetalleIngreso" class="display table table-bordered table-hover " cellspacing="0" width="100%">
                                                      <thead class="text-center font-table">
                                                        <tr class="bg-primary">
                                                          <!-- th class="text-center" width="10%">N</th-->
                                                          <th class="text-center" width="40%">PRODUCTO</th>
                                                          <th class="text-center" width="10%">UMA</th>
                                                          <th class="text-center" width="10%">TIPO</th>
                                                          <th class="text-center" width="10%">A</th>
                                                          <th class="text-center" width="10%">B</th>
                                                          <th class="text-center" width="10%">C</th>
                                                          
                                                          <th class="text-center" width="10%">ACCI&Oacute;N</th>
                                                        </tr>
                                                      </thead>
                                                      
                                                        <tbody class="text-center font-table" id="tablaIngresosBody">
                                                          
                                                        </tbody>
                                                    </table>
                                          
                                                  </div>
                                              </div>
                                            </div>

                                           

                                          </div>
                                        </br>
                                           <div class="row">
                                                <div class="col-md-10 col-sm-10">                      
                                                    <div class="form-group">
                                                        <label>Observaciones</label>               
                                                            <textarea class="form-control claseInput" id="txtobservaciones" rows="3"></textarea>
                                                    </div> 
                                                                              
                                                </div> 

                                                  <div class="col-md-2 col-sm-2">
                                                      <div class="row"> 
                                                        <div class="pull-left">
                                                            <button type="button" onclick="enviarFormIngreso();" class="btn btn-success"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span>Guardar </span></button>
                                                        </div>  
                                                      </div> </br>

                                                      <div class="row">                                       
                                                          <div class="pull-left">
                                                              <button type="button" onclick="cancelDetalleIngreso();" class="btn btn-danger" id="btncancelar"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></button>
                                                           </div>                                                               
                                                      </div> 
                                                  </div>

                                            </div> 
                                        </div>
                                      </div>

                                   


                                </div>

                            </div>


                            <div class="panel panel-default  panel-table m-b-0 " id="panelingrecompra">
                                <div class="row">
                                  
                                       <div class="col-md-4 col-sm-4">
                                          <div class="panel panel-primary panel-table m-b-0">
                                            <div class="panel-heading">
                                              <h5 class="text-black m-b-18"><strong>DATOS DE LA GUIA DE INGRESO - COMPRA O ADQUI</strong></h5>
                                            </div>
                                            <div class="panel-body">
                                              <div class="row">
                                                <!-- <div class="col-lg-1"></div> -->
                                                <div class="col-lg-12">
                                                  <form class="form" id="form_registrarCompra" method="POST" autocomplete="off" action="javascript:void(0);">
                                                    <input class="form-control" type="hidden" id="txtIdCompra" name="txtIdCompra">
                                                    <input class="form-control" type="hidden" id="txtcontrolCompra" name="txtcontrolCompra" value="0">
                                                    <div class="panel panel-default">
                                                      <div class="panel-body">
                                                        <!--https://getbootstrap.com/docs/3.3/components/-->
                                                        
                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Almacen:</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-home"></span>
                                                                    </button>
                                                                  </span>
                                                                   <select class="form-control claseSelect" name="cboalmacen2" id="cboalmacen2" data-live-search="true" data-size="5" required>
                                                                      </select>
                                                                 
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div> 

                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Procesos:</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-th-list"></span>
                                                                    </button>
                                                                  </span>
                                                                   <select class="form-control claseSelect" name="cboproceso2" id="cboproceso2" data-live-search="true" data-size="5" required>
                                                                      </select>
                                                                 
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div> 


                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Proveedor:</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-user"></span>
                                                                    </button>
                                                                  </span>
                                                                   <select class="form-control claseSelect" name="cboproveedor2" id="cboproveedor2" data-live-search="true" data-size="5" required>
                                                                      </select>
                                                                 
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div> 

                                                          <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Tipo Documento:</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-list-alt"></span>
                                                                    </button>
                                                                  </span>
                                                                   <select class="form-control claseSelect" name="cbotipodocumento2" id="cbotipodocumento2" data-live-search="true" data-size="5" required>
                                                                      </select>
                                                                 
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div>                                                   
                                  

                                           

 
                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                              <label>Fecha de Documento:</label>
                                                              <div class="input-group-prepend">
                                                                  <input class="form-control claseInput" type="date" id="txtfechadoc2" name="txtfechadoc2">
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>  

                                                    

                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                              <label>Nro. Doc. de Proveedor:</label>
                                                             <div class="input-group-prepend">
                                                                <input class="form-control vld claseInput" type="text" id="txtserie2" name="txtserie2" required>
                                                            </div>
                                                            </div>
                                                          </div>
                                                        </div>   


                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                              <label>Nro. Pedido:</label>
                                                             <div class="input-group-prepend">
                                                                <input class="form-control vld claseInput" type="text" id="txtnumeropedido" name="txtnumeropedido" required>
                                                            </div>
                                                            </div>
                                                          </div>
                                                        </div>    

                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                              <label>Orden de Compra:</label>
                                                             <div class="input-group-prepend">
                                                                <input class="form-control vld claseInput" type="text" id="txtordecompra" name="txtordecompra" required>
                                                            </div>
                                                            </div>
                                                          </div>
                                                        </div>    

                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                              <label>Pecosa:</label>
                                                             <div class="input-group-prepend">
                                                                <input class="form-control vld claseInput" type="text" id="txtpecosa" name="txtpecosa" required>
                                                            </div>
                                                            </div>
                                                          </div>
                                                        </div>                                                   
                                                        
                                                        
                                                      </div>
                                                    </div>

                                                            <div class="row">

                                                                    <div class="col-md-4 col-sm-4">                                                  
                                                                    </div>  
                                                                    <div class="col-md-4 col-sm-4">
                                                                            <div class="pull-right">
                                                                                <button type="button" onclick="enviarFormCompraAdqui();" class="btn btn-success"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span>Guardar productos</span></button>
                                                                             </div>                                                      
                                                                    </div>  

                                                                  <div class="col-md-4 col-sm-4">
                                                                          <div class="pull-left">
                                                                              <button type="button" onclick="cancelDetalleIngreso();" class="btn btn-danger" id="btncancelar"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></button>
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
                               
                                       <div class="col-md-8 col-sm-8" >
                                        <div class="panel panel-default panel-table m-b-0" id="panelrc" >
                                            <div class="panel-heading">
                                              <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                  <h5 class="text-success m-b-18 " ><strong>MATERIALES DE COMPRA </strong></h5>
                                                </div>  
                                                <div class="col-md-6 col-sm-6">
                                                        <div class="pull-right">
                                                            <button type="button" onclick="VisualizarModalProductoCompra();" class="btn btn-success" id="btnbuscarproductos"><i class="zmdi zmdi-search zmdi-hc-fw m-r-5"></i><span> Agregar Productos</span></button>
                                                         </div>                                                      
                                                </div>  
                                              </div>
                                            </div>
                                         
                                          <div class="panel-body">
                                            <div class="table-responsive" >
                                              <div id="tbl_detalleingreso" class="dataTables_wrapper form-inline" role="grid">
                                                <table id="tableDetalleIngresoCompra" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                  <thead class="text-center font-table">
                                                    <tr class="bg-primary">
                                                      <!-- th class="text-center" width="10%">N</th-->
                                                      <th class="text-center" width="40%">PRODUCTO</th>
                                                      <th class="text-center" width="20%">UMA</th>
                                                      <th class="text-center" width="20%">TIPO</th>
                                                      <th class="text-center" width="10%">CANTIDAD</th>
                                                  
                                                      
                                                      <th class="text-center" width="10%">ACCI&Oacute;N</th>
                                                    </tr>
                                                  </thead>
                                                  
                                                    <tbody class="text-center font-table" id="tablaIngresosBody2">
                                                      
                                                    </tbody>
                                                </table>
                                      
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                   


                                </div>

                            </div>




                            <div class="panel panel-default  panel-table m-b-0 " id="panelingresarepliegue">
                                <div class="row">
                                  
                                       <div class="col-md-4 col-sm-4">
                                          <div class="panel panel-primary panel-table m-b-0">
                                            <div class="panel-heading">
                                              <h5 class="text-black m-b-18"><strong>DATOS DE LA GUIA DE INGRESO - REPLIEGUE</strong></h5>
                                            </div>
                                            <div class="panel-body">
                                              <div class="row">
                                                <!-- <div class="col-lg-1"></div> -->
                                                <div class="col-lg-12">
                                                  <form class="form" id="form_registrarRepliegue" method="POST" autocomplete="off" action="javascript:void(0);">
                                                    <input class="form-control" type="hidden" id="txtIdCompra" name="txtIdCompra">
                                                    <input class="form-control" type="hidden" id="txtcontrolCompra" name="txtcontrolCompra" value="0">
                                                    <div class="panel panel-default">
                                                      <div class="panel-body">
                                                        <!--https://getbootstrap.com/docs/3.3/components/-->
                                                        
                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Almacen:</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-home"></span>
                                                                    </button>
                                                                  </span>
                                                                   <select class="form-control claseSelect" name="cboalmacen3" id="cboalmacen3" data-live-search="true" data-size="5" required>
                                                                      </select>
                                                                 
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div> 

                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Procesos:</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-th-list"></span>
                                                                    </button>
                                                                  </span>
                                                                   <select class="form-control claseSelect" name="cboproceso3" id="cboproceso3" data-live-search="true" data-size="5" required>
                                                                      </select>
                                                                 
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div> 


                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Proveedor:</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-user"></span>
                                                                    </button>
                                                                  </span>
                                                                   <select class="form-control claseSelect" name="cboproveedor3" id="cboproveedor3" data-live-search="true" data-size="5" required>
                                                                      </select>
                                                                 
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div> 

                                                          <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Tipo Documento:</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-list-alt"></span>
                                                                    </button>
                                                                  </span>
                                                                   <select class="form-control claseSelect" name="cbotipodocumento3" id="cbotipodocumento3" data-live-search="true" data-size="5" required>
                                                                      </select>
                                                                 
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div>                                                   
                                  

                                           

 
                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                              <label>Fecha de Documento:</label>
                                                              <div class="input-group-prepend">
                                                                  <input class="form-control claseInput" type="date" id="txtfechadoc3" name="txtfechadoc3">
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>  

                                                    

                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                              <label>Nro. Doc. de Proveedor:</label>
                                                             <div class="input-group-prepend">
                                                                <input class="form-control vld claseInput" type="text" id="txtserie3" name="txtserie3" required>
                                                            </div>
                                                            </div>
                                                          </div>
                                                        </div>   


                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                              <label>Nro. Pedido:</label>
                                                             <div class="input-group-prepend">
                                                                <input class="form-control vld claseInput" type="text" id="txtnumeropedido2" name="txtnumeropedido2" required>
                                                            </div>
                                                            </div>
                                                          </div>
                                                        </div>    

                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                              <label>Orden de Compra:</label>
                                                             <div class="input-group-prepend">
                                                                <input class="form-control vld claseInput" type="text" id="txtordecompra2" name="txtordecompra2" required>
                                                            </div>
                                                            </div>
                                                          </div>
                                                        </div>    

                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                              <label>Pecosa:</label>
                                                             <div class="input-group-prepend">
                                                                <input class="form-control vld claseInput" type="text" id="txtpecosa2" name="txtpecosa2" required>
                                                            </div>
                                                            </div>
                                                          </div>
                                                        </div>                                                   
                                                        
                                                        
                                                      </div>
                                                    </div>

                                                            <div class="row">

                                                                    <div class="col-md-4 col-sm-4">                                                  
                                                                    </div>  
                                                                    <div class="col-md-4 col-sm-4">
                                                                            <div class="pull-right">
                                                                                <button type="button" onclick="enviarFormRepliegue();" class="btn btn-success"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span>Guardar productos</span></button>
                                                                             </div>                                                      
                                                                    </div>  

                                                                  <div class="col-md-4 col-sm-4">
                                                                          <div class="pull-left">
                                                                              <button type="button" onclick="cancelDetalleIngreso();" class="btn btn-danger" id="btncancelar"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></button>
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
                               
                                       <div class="col-md-8 col-sm-8" >
                                        <div class="panel panel-default panel-table m-b-0" id="panelrc" >
                                            <div class="panel-heading">
                                              <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                  <h5 class="text-success m-b-18 " ><strong>MATERIALES DE REPLIEGUE </strong></h5>
                                                </div>  
                                                <div class="col-md-6 col-sm-6">
                                                        <div class="pull-right">
                                                            <button type="button" onclick="VisualizarModalProductoRepliegue();" class="btn btn-success" id="btnbuscarproductos"><i class="zmdi zmdi-search zmdi-hc-fw m-r-5"></i><span> Agregar Productos</span></button>
                                                         </div>                                                      
                                                </div>  
                                              </div>
                                            </div>
                                         
                                          <div class="panel-body">
                                            <div class="table-responsive" >
                                              <div id="tbl_detalleingreso" class="dataTables_wrapper form-inline" role="grid">
                                                <table id="tableDetalleIngresoRepliegue" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                  <thead class="text-center font-table">
                                                    <tr class="bg-primary">
                                                      <!-- th class="text-center" width="10%">N</th-->
                                                      <th class="text-center" width="40%">PRODUCTO</th>
                                                      <th class="text-center" width="20%">UMA</th>
                                                      <th class="text-center" width="20%">TIPO</th>
                                                      <th class="text-center" width="10%">CANTIDAD</th>
                                                  
                                                      
                                                      <th class="text-center" width="10%">ACCI&Oacute;N</th>
                                                    </tr>
                                                  </thead>
                                                  
                                                    <tbody class="text-center font-table" id="tablaIngresosBody3">
                                                      
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

                     



                        <div class="row">
                        
                          <div class="col-md-12 col-sm-12">

                            <div class="panel panel-default  panel-table m-b-0 " id="paneldetallecompraid">
                                <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                          <div class="panel-heading">
                                              <h5 class="text-danger m-b-18"><strong>DETALLE DEL INGRESO</strong></h5>
                                            </div>
                                          <div class="panel-body">
                                            <div class="table-responsive">
                                              <div id="tbl_detalleingresosid" class="dataTables_wrapper form-inline" role="grid">
                                                <table id="tabledetalledeingresosid" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                  <thead class="text-center font-table">
                                                    <tr class="bg-primary">
                                                      <th class="text-center" width="5%">Nº</th>
                                                      <th class="text-center" width="10%">FECHA</th>
                                                      <th class="text-center" width="15%">SERIE</th>
                                                      <th class="text-center" width="10%">COD</th>
                                                      <th class="text-center" width="20%">PRODUCTO</th>
                                                      <th class="text-center" width="5%">A</th>
                                                      <th class="text-center" width="5%">B</th>
                                                      <th class="text-center" width="5%">C</th>
                                                      <th class="text-center" width="5%">CANTIDAD</th>
                                                      <th class="text-center" width="10%">USUARIO</th>
                                                      <th class="text-center" width="5%">ESTADO</th>
                                                    
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
                 
                  <div role="tabpanel" class="tab-pane fade" id="tab-proveedor"> 
                    <div class="row">
                      <div class="col-md-5 col-sm-5">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-14" id="titleProveedor"><strong>Crear Proveedor</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <!-- <div class="col-lg-1"></div> -->
                              <div class="col-lg-12">
                                <form class="form" id="form_proveedor" method="POST" autocomplete="off" action="javascript:void(0);">
                                  <input class="form-control" type="hidden" id="txtIdProveedor" name="txtIdProveedor">
                                  <input class="form-control" type="hidden" id="txtcontrolProveedor" name="txtcontrolProveedor" value="0">
                                  <div class="panel panel-default">
                                    <div class="panel-body">

                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                            <label>Razon Social</label>
                                               <div class="input-group">
                                                 <span class="input-group-btn">
                                                  <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-user"></span>
                                                  </button>
                                                </span>
                                                <input class="form-control vld" type="text" id="txtrazonsocial" name="txtrazonsocial" required>
                                               
                                              </div>
                                          </div> 
                                         </div> 
                                      </div> 


                                        <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                            <label>Ruc:</label>
                                               <div class="input-group">
                                                 <span class="input-group-btn">
                                                  <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-barcode"></span>
                                                  </button>
                                                </span>
                                                <input class="form-control vld" type="text" id="txtruc" name="txtruc" required>
                                               
                                              </div>
                                          </div> 
                                         </div> 
                                      </div> 

                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                            <label>Celular:</label>
                                               <div class="input-group">
                                                 <span class="input-group-btn">
                                                  <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-erase"></span>
                                                  </button>
                                                </span>
                                                <input class="form-control vld" type="text" id="txtcelular" name="txtcelular" required>
                                               
                                              </div>
                                          </div> 
                                         </div> 
                                      </div>
                                    

                                     
                                    

                                 
                                      <div class="clearfix m-t-30">
                                        <div class="pull-right">
                                          <button type="submit" class="btn btn-outline-primary" id="agregarproveedor"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> Guardar</span></button>
                                          <button type="submit" class="btn btn-outline-primary" id="updateproveedor" style="display: none;"><i class="zmdi zmdi-refresh zmdi-hc-fw m-r-5"></i><span> Actualizar</span></button>
                                          <a class="btn btn-outline-danger" data-dismiss="modal" id="cancelproveedor" onclick="cancelProveedor();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></a>
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

                      <div class="col-md-7 col-sm-7">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-12"><strong>DETALLE DE PROVEEDORES</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="table-responsive">
                              <div id="tbl_proveedor" class="dataTables_wrapper form-inline" role="grid">
                                <table id="tableProveedor" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                  <thead class="text-center font-table">
                                    <tr class="bg-primary">
                                      <th class="text-center" width="10%">N</th>
                                      <th class="text-center" width="20%">RazonSocial</th>
                                      <th class="text-center" width="20%">Ruc</th>
                                      <th class="text-center" width="20%">Celular</th>
                                      <th class="text-center" width="20%">ESTADO</th>
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

              <!-- Modal LISTA DE PRODUCTOS -->
       
        <div class="modal fade bd-example-modal-lg" id="modal_buscarproducto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">  
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">
                    <i class="zmdi zmdi-close"></i>
                  </span>
                </button> 
                <h4 id="titleModule" class="modal-title text-center text-primary font-16"><b>LISTADO DE PRODUCTOS</b></h4>
              </div>
              <div class="modal-body">
               <div class="row">
                <div class="col-md-12 col-sm-12  col-lg-12">
                       <div class="panel-body">
                                <div class="table-responsive">
                                  <div id="tbl_buscarproducto" class="dataTables_wrapper form-inline" role="grid">
                                    <table id="tablebuscarproducto" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                      <thead class="text-center font-table">
                                        <tr class="bg-primary">
                                          <th class="text-center" width="5%">Nº</th>
                                          <th class="text-center" width="5%">COD</th>
                                          <th class="text-center" width="40%">PRODUCTO</th>
                                          <th class="text-center" width="10%">UMA</th>
                                          <th class="text-center" width="10%">CLASE</th>
                                          <th class="text-center" width="5%">ESTADO</th>
                                          <th class="text-center" width="5%">ACC</th>
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
                <div class="col-lg-1"></div>
              </div>
              <div class="modal-footer"></div>
            </div>
          </div>
        </div>


       <div class="modal fade bd-example-modal-lg" id="modal_buscarproductocompra" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">  
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">
                    <i class="zmdi zmdi-close"></i>
                  </span>
                </button> 
                <h4 id="titleModule" class="modal-title text-center text-primary font-16"><b>LISTADO DE PRODUCTOS - COMPRA</b></h4>
              </div>
              <div class="modal-body">
               <div class="row">
                <div class="col-md-12 col-sm-12  col-lg-12">
                       <div class="panel-body">
                                <div class="table-responsive">
                                  <div id="tbl_buscarproductocompra" class="dataTables_wrapper form-inline" role="grid">
                                    <table id="tablebuscarproductocompra" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                      <thead class="text-center font-table">
                                        <tr class="bg-primary">
                                          <th class="text-center" width="5%">Nº</th>
                                          <th class="text-center" width="55%">PRODUCTO</th>
                                          <th class="text-center" width="15%">UMA</th>
                                          <th class="text-center" width="15%">TIPO</th>
                                          <th class="text-center" width="5%">ESTADO</th>
                                          <th class="text-center" width="5%">&nbsp;&nbsp;ACCI&Oacute;N&nbsp;&nbsp;</th>
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
                <div class="col-lg-1"></div>
              </div>
              <div class="modal-footer"></div>
            </div>
          </div>
        </div>



        <div class="modal fade bd-example-modal-lg" id="modal_buscarproductorepliegue" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">  
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">
                    <i class="zmdi zmdi-close"></i>
                  </span>
                </button> 
                <h4 id="titleModule" class="modal-title text-center text-primary font-16"><b>LISTADO DE PRODUCTOS - REPLIEGUE</b></h4>
              </div>
              <div class="modal-body">
               <div class="row">
                <div class="col-md-12 col-sm-12  col-lg-12">
                       <div class="panel-body">
                                <div class="table-responsive">
                                  <div id="tbl_buscarproductorepliegue" class="dataTables_wrapper form-inline" role="grid">
                                    <table id="tablebuscarproductorepliegue" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                      <thead class="text-center font-table">
                                        <tr class="bg-primary">
                                          <th class="text-center" width="5%">Nº</th>
                                          <th class="text-center" width="55%">PRODUCTO</th>
                                          <th class="text-center" width="15%">UMA</th>
                                          <th class="text-center" width="15%">TIPO</th>
                                          <th class="text-center" width="5%">ESTADO</th>
                                          <th class="text-center" width="5%">&nbsp;&nbsp;ACCI&Oacute;N&nbsp;&nbsp;</th>
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
                <div class="col-lg-1"></div>
              </div>
              <div class="modal-footer"></div>
            </div>
          </div>
        </div>
        <!-- #END# MODAL LISTA DE PRODUCTOS-->

        <!-- Modal VISTA DETALLE DE INGRESOS ESTEEE -->
       
        <div class="modal fade bd-example-modal-lg" id="modal_detalledeingresos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">  
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">
                    <i class="zmdi zmdi-close"></i>
                  </span>
                </button> 
                <h4 id="titleModule" class="modal-title text-center text-primary font-16"><b>DETALLE DE GUIA</b></h4>
              </div>
              <div class="modal-body">
               <div class="row">
                
                <div class="col-md-12 col-sm-12  col-lg-12">
                       <div class="panel-body">
                                <div class="table-responsive">
                                  <div id="tbl_detalleingresos" class="dataTables_wrapper form-inline" role="grid">
                                    <table id="tabledetalledeingresos" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                      <thead class="text-center font-table">
                                        <tr class="bg-primary">
                                          <th class="text-center" width="5%">Nº</th>
                                          <th class="text-center" width="10%">FECHA</th>
                                          <th class="text-center" width="15%">SERIE</th>
                                          <th class="text-center" width="30%">PRODUCTO</th>
                                          <th class="text-center" width="10%">TIPO</th>
                                          <th class="text-center" width="5%">CANTIDAD</th>
                                          <th class="text-center" width="15%">USUARIO</th>
                                          <th class="text-center" width="5%">ESTADO</th>
                                          <th class="text-center" width="5%">&nbsp;&nbsp;ACCI&Oacute;N&nbsp;&nbsp;</th>
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
                <div class="col-lg-1"></div>
              </div>
              <div class="modal-footer"></div>
            </div>
          </div>
        </div>
        <!-- #END# Modal VISTA DETALLE DE INGRESOS-->

         <!-- Modal REGISTRO DE NUEVO PROVEEDOR -->
       
        <div class="modal fade bd-example-modal-lg" id="modal_crearproveedor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">  
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">
                    <i class="zmdi zmdi-close"></i>
                  </span>
                </button> 
              </div>
              <div class="modal-body">
              <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-14" id="titleProveedor"><strong>Crear Proveedor</strong></h4>
                          </div>
                          <div class="panel-body">
                                <div class="row">
                                    <!-- <div class="col-lg-1"></div> -->
                                    <div class="col-lg-12">
                                      <form class="form" id="form_proveedor2" method="POST" autocomplete="off" action="javascript:void(0);">
                                        <input class="form-control" type="hidden" id="txtIdProveedor2" name="txtIdProveedor2">
                                        <input class="form-control" type="hidden" id="txtcontrolProveedor2" name="txtcontrolProveedor2" value="0">
                                        <div class="panel panel-default">
                                          <div class="panel-body">

                                            <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                  <div class="form-group">
                                                  <label>Razon Social</label>
                                                     <div class="input-group">
                                                       <span class="input-group-btn">
                                                        <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-user"></span>
                                                        </button>
                                                      </span>
                                                      <input class="form-control vld" type="text" id="txtrazonsocial2" name="txtrazonsocial2" required>
                                                     
                                                    </div>
                                                </div> 
                                              </div> 
                                            </div> 


                                            <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                  <div class="form-group">
                                                  <label>Ruc:</label>
                                                     <div class="input-group">
                                                       <span class="input-group-btn">
                                                        <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-barcode"></span>
                                                        </button>
                                                      </span>
                                                      <input class="form-control vld"  minlength="11" maxlength="11" type="text" id="txtruc2" name="txtruc2"  required>
                                                     
                                                    </div>
                                                </div> 
                                               </div> 
                                            </div> 

                                            <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                  <div class="form-group">
                                                  <label>Celular:</label>
                                                     <div class="input-group">
                                                       <span class="input-group-btn">
                                                        <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-erase"></span>
                                                        </button>
                                                      </span>
                                                      <input class="form-control vld" type="number" minlength="9" maxlength="9"  id="txtcelular2" name="txtcelular2" required>
                                                     
                                                    </div>
                                                </div> 
                                               </div> 
                                            </div>

                                             <div class="row" id="estado_proveedor" style="display: none;">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                  <div class="switches-stacked">
                                                    <label>Activo</label>
                                                    <label class="switch switch-primary">  
                                                      <input type="checkbox" id="chkestadoproveedor2" name="chkestadoproveedor2" class="s-input">
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
                                                <button type="submit"  class="btn btn-outline-primary" id="agregarproveedor"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> Guardar</span></button>
                                                <button type="submit" class="btn btn-outline-primary" id="updateproveedor" style="display: none;"><i class="zmdi zmdi-refresh zmdi-hc-fw m-r-5"></i><span> Actualizar</span></button>
                                                <a class="btn btn-outline-danger" data-dismiss="modal" id="cancelproveedor" onclick="cancelProveedor();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></a>
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
                <div class="col-lg-1"></div>
              </div>
              <div class="modal-footer"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- #END# MODAL REGISTRO DE NUEVO PROVEEDOR-->

         <!-- Modal ANULAR COMPRA -->
       
        <div class="modal fade bd-example-modal-lg" id="modal_anularcompra" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">  
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">
                    <i class="zmdi zmdi-close"></i>
                  </span>
                </button> 
              </div>
              <div class="modal-body">
              <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-danger font-14" id="titleProveedor"><strong>DESEA ANULAR ESTA COMPRA ?</strong></h4>
                          </div>
                          <div class="panel-body">
                                <div class="row">
                                    <!-- <div class="col-lg-1"></div> -->
                                    <div class="col-lg-12">
                                      <form class="form" id="form_anularcompra" method="POST" autocomplete="off" action="javascript:void(0);">
                                        <input class="form-control" type="hidden" id="txtidanular" name="txtidanular">
                                        <input class="form-control" type="hidden" id="txtcontrolanular" name="txtcontrolanular" value="0">
                                        <div class="panel panel-default">
                                          <div class="panel-body">

                                            <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                  <div class="form-group">
                                                        <label class="text-danger">Motivo de la Anulaci&oacuten</label>               
                                                            <textarea class="form-control claseInput" id="txtobsanular" required rows="3"></textarea>
                                                    </div> 
                                              </div> 
                                            </div> 


                                             <div class="row" id="estado_proveedor" style="display: none;">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                  <div class="switches-stacked">
                                                    <label>Activo</label>
                                                    <label class="switch switch-primary">  
                                                      <input type="checkbox" id="chkestadoproveedor2" name="chkestadoproveedor2" class="s-input">
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
                                                <button type="submit" class="btn btn-outline-primary" id="agregarproveedor"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> Confirmar Anulaci&oacuten</span></button>
                                                <button type="submit" class="btn btn-outline-primary" id="updateproveedor" style="display: none;"><i class="zmdi zmdi-refresh zmdi-hc-fw m-r-5"></i><span> Actualizar</span></button>
                                                <a class="btn btn-outline-danger" data-dismiss="modal" id="cancelproveedor" onclick="cancelAnularCompra();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></a>
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
                <div class="col-lg-1"></div>
              </div>
              <div class="modal-footer"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- #END# MODAL FIN ANULAR COMPRA-->

      
      <div class="site-footer">
        2022 © Sistema Kardex
      </div>
    </div>
    
    <!-- FOOTER -->
    <?php footerAdmin($data); ?>
  </body>

<!-- Mirrored from big-bang-studio.com/cosmos/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:53:30 GMT -->
</html>