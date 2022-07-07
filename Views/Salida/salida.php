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
                      <i class="zmdi zmdi-accounts-list-alt"></i>SALIDA</a>
                  </li>
                  <!-- <li class="">
                    <a href="#tab-proveedor" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-view-module"></i>PROVEEDOR</a>
                  </li> -->
                  
                </ul>

                <div class="tab-content">
                <div role="tabpanel" class="tab-pane active in fade" id="tab-productos">
                    <div class="container-fluid">
                      <div class="panel panel-primary" id="panelboton">
                        <div class="panel-heading">
                          <h5 class="text-black m-b-18"><strong>SALIDAS DE ALMACEN</strong></h5> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              <div class="col-md-12 col-sm-12">

                                 <div class="row">                                            

                                     <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <div class="pull-left">
                                              <button type="button" class="btn btn-outline-success" id="btnNuevo" onclick="VisualizarPanel();"><i class="zmdi zmdi-view-module zmdi-hc-fw m-r-5"></i><span>GENERAR GUIA DE SALIDA</span></button>
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
                                <h4 class="text-center text-danger font-18"><strong>TOTAL DE SALIDAS</strong></h4>
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
                                          <th class="text-center" width="12%">&nbsp;&nbsp;ACCI&Oacute;N&nbsp;&nbsp;</th>
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

                            <div class="panel panel-default  panel-table m-b-0 " id="panelcompra">
                                <div class="row">
                                  
                                       <div class="col-md-4 col-sm-4">
                                          <div class="panel panel-primary panel-table m-b-0">
                                            <div class="panel-heading">
                                              <h5 class="text-black m-b-18"><strong>DATOS DEL DOCUMENTO DE SALIDA</strong></h5>
                                            </div>
                                            <div class="panel-body"style="height: 650px; overflow-y: auto; overflow-x: hidden">
                                              <div class="row">
                                                <!-- <div class="col-lg-1"></div> -->
                                                <div class="col-lg-12">
                                                  <form class="form" id="form_salida" method="POST" autocomplete="off" action="javascript:void(0);">
                                                    <input class="form-control" type="hidden" id="txtIdVenta" name="txtIdVenta">
                                                    <input class="form-control" type="hidden" id="txtcontrolVenta" name="txtcontrolVenta" value="0">
                                                    <div class="panel panel-default">
                                                      <div class="panel-body">
                                                        <!--https://getbootstrap.com/docs/3.3/components/-->
                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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



                                                  
                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Centro de Consumo</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-home"></span>
                                                                    </button>
                                                                  </span>
                                                                   <select class="form-control claseSelect" name="cbocconsumo" id="cbocconsumo" data-live-search="true" data-size="5" required>
                                                                      </select>
                                                                 
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div> 

                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Recibido Por:</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-home"></span>
                                                                    </button>
                                                                  </span>
                                                                   <select class="form-control claseSelect" name="cborecibidopor" id="cborecibidopor" data-live-search="true" data-size="5" required>
                                                                      </select>                                                             
                                                                  </div>
                                                                </div> 
                                                           </div> 
                                                        </div> 

                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Entregado Por:</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-home"></span>
                                                                    </button>
                                                                  </span>
                                                                   <select class="form-control claseSelect" name="entregadopor" id="entregadopor" data-live-search="true" data-size="5" required>
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
                                                                  <input class="form-control claseInput" type="date" id="txtfechadoc" name="txtfechadoc">
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>  


                                                         <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                              <label>N° De Documento:</label>
                                                              <div class="input-group-prepend">
                                                                  <input class="form-control claseInput" type="text" id="txtserie" name="txtserie">
                                                              </div>
                                                            </div>
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
                                              <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                  <h5 class="text-success m-b-18 " ><strong>MATERIALES A ENTREGAR</strong></h5>
                                                </div>  
                                                <div class="col-md-6 col-sm-6">
                                                        <div class="pull-right">
                                                            <button type="submit" onclick="VisualizarModalProducto();" class="btn btn-success" id="btnbuscarproductos"><i class="zmdi zmdi-search zmdi-hc-fw m-r-5"></i><span> Agregar Productos</span></button>
                                                         </div>                                                      
                                                </div>  
                                              </div>
                                            </div>
                                         <div class="row">
                                              <div class="panel-body" style="height: 550px; overflow-y: auto; overflow-x: hidden">
                                                <div class="table-responsive">
                                                  <div id="tbl_detalleingreso" class="dataTables_wrapper form-inline" role="grid">
                                                    <table id="tableDetalleIngreso" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                      <thead class="text-center font-table">
                                                        <tr class="bg-primary">
                                                          <!-- th class="text-center" width="10%">N</th-->
                                                          <th class="text-center" width="40%">PRODUCTO</th>
                                                          <th class="text-center" width="10%">UMA</th>
                                                          
                                                          <th class="text-center" width="10%">SA</th>
                                                          <th class="text-center" width="10%">A</th>
                                                          <th class="text-center" width="10%">SB</th>
                                                          <th class="text-center" width="10%">B</th>
                                                          <th class="text-center" width="10%">SC</th>
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
                                        </div>

                                      <div class="row">
                                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                                <div class="form-group">
                                                    <label>Observaciones</label>                     
                                                    <textarea class="form-control claseInput" id="txtobservaciones" rows="3"></textarea>   
                                                </div> 
                                            </div> 
                                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> 
                                              <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                            <div class="pull-left">
                                                                <button type="button" onclick="enviarFormSalida();" class="btn btn-success"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span>Guardar </span></button>
                                                             </div>                                                      
                                                    </div> 
                                              </div> <br>      
                                              <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                            <div class="pull-left">
                                                                <button type="button" onclick="cancelDetalleSalida();" class="btn btn-danger" id="btncancelar"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></button>
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

                            <div class="panel panel-default  panel-table m-b-0 " id="paneldetallesalidaid">
                                <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                          <div class="panel-heading">
                                              <h5 class="text-danger m-b-18"><strong>DETALLE DE SALIDA</strong></h5>
                                            </div>
                                          <div class="panel-body">
                                            <div class="table-responsive">
                                              <div id="tbl_detallesalidaid" class="dataTables_wrapper form-inline" role="grid">
                                                <table id="tabledetalledesalidaid" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                  <thead class="text-center font-table">
                                                    <tr class="bg-primary">
                                                      <th class="text-center" width="5%">Nº</th>
                                                      <th class="text-center" width="10%">FECHA</th>
                                                      <th class="text-center" width="30%">PRODUCTO</th>
                                                      <th class="text-center" width="10%">A</th>
                                                      <th class="text-center" width="10%">B</th>
                                                      <th class="text-center" width="10%">C</th>
                                                      <th class="text-center" width="5%">CANTIDAD</th>
                                                      <th class="text-center" width="10%">USUARIO</th>
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
                                          <th class="text-center" width="60%">PRODUCTO</th>
                                          <th class="text-center" width="10%">UMA</th>
                                          <!--th class="text-center" width="10%">TIPO</th-->
                                          <th class="text-center" width="5%">CANT.</th>
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

          <!-- Modal ANULAR SALIDA -->
       
        <div class="modal fade bd-example-modal-lg" id="modal_anularsalida" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">  
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
                            <h4 class="text-center text-danger font-14" id="titleP"><strong>DESEA ANULAR ESTA SALIDA ?</strong></h4>
                          </div>
                          <div class="panel-body">
                                <div class="row">
                                    <!-- <div class="col-lg-1"></div> -->
                                    <div class="col-lg-12">
                                      <form class="form" id="form_anularsalida" method="POST" autocomplete="off" action="javascript:void(0);">
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
        <!-- #END# MODAL FIN ANULAR SALIDA-->

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
                                <form class="form" id="form_proveedor" method="POST" autocomplete="off" action="javascript:void(0);">
                                  <input class="form-control" type="hidden" id="txtIdProveedor" name="txtIdProveedor">
                                  <input class="form-control" type="hidden" id="txtcontrolProveedor" name="txtcontrolProveedor" value="0">
                                  <div class="panel panel-default">
                                    <div class="panel-body">
                                     
                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Razon Social:</label>
                                            <div class="input-group-prepend">
                                              <input class="form-control vld" type="text" id="txtrazonsocial" name="txtrazonsocial" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Ruc:</label>
                                           <div class="input-group-prepend">
                                              <input class="form-control vld" type="number" id="txtruc" name="txtruc" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Celular:</label>
                                           <div class="input-group-prepend">
                                              <input class="form-control vld" type="number" id="txtcelular" name="txtcelular" required>
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

                     
                    </div>
                <div class="col-lg-1"></div>
              </div>
              <div class="modal-footer"></div>
            </div>
          </div>
        </div>
        <!-- #END# MODAL REGISTRO DE NUEVO PROVEEDOR-->

       

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