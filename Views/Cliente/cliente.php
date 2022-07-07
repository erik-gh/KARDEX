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
                 
                  <li class="">
                    <a href="#tab-cliente" role="tab" data-toggle="tab" aria-expanded="true">
                      <i class="zmdi zmdi-accounts-list-alt"></i> CLIENTES</a>
                  </li> 
                 <li class="">
                    <a href="#tab-module" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-view-module"></i> VENTAS</a>
                  </li>
                 <!--  <li class="">
                    <a href="#tab-asignar" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-assignment-check"></i> MEDIDAS</a>
                  </li>-->
                </ul> 

                <div class="tab-content">

                
                 
                  <div role="tabpanel" class="tab-pane fade active in" id="tab-cliente"> 
                    <div class="row">
                      <div class="col-md-5 col-sm-5">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-14" id="titleEspacio"><strong>Crear Clientes</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <!-- <div class="col-lg-1"></div> -->
                              <div class="col-lg-12">
                                <form class="form" id="form_registercliente" method="POST" autocomplete="off" action="javascript:void(0);">
                                  <input class="form-control" type="hidden" id="txtIdCliente" name="txtIdCliente">
                                  <input class="form-control" type="hidden" id="txtcontrolCliente" name="txtcontrolCliente" value="0">
                                  <div class="panel panel-default">
                                    <div class="panel-body">
                                      <h5 class="text-blue-grey m-b-15"><strong>DATOS DEL CLIENTE</strong></h5>
                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Nombre y Apellidos:</label>
                                           <div class="input-group-prepend">
                                              <input class="form-control vld" type="text" id="txtnombre" name="txtnombre" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Dni:</label>
                                            <div class="input-group-prepend">
                                              <input class="form-control vld" type="number"  id="txtdni" name="txtdni" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Direcci&oacuten:</label>
                                            <div class="input-group-prepend">
                                              <input class="form-control vld" type="text"  id="txtdireccion" name="txtdireccion" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                     <!--  <h5 class="text-blue-grey m-b-15"><strong>DATOS DEL USUARIO</strong></h5> -->
                                       <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Fecha Nacimiento:</label>
                                             <div class="input-group-prepend">
                                              <input class="form-control" type="date" id="txtfechanacimiento" name="txtfechanacimiento">
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

                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Correo:</label>
                                            <div class="input-group-prepend">
                                              <input class="form-control vld" type="text" id="txtcorreo" name="txtcorreo" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                        <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Contacto:</label>
                                            <div class="input-group-prepend">
                                              <input class="form-control vld" type="text" id="txtcontacto" name="txtcontacto" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                   
                                 
                                      <div class="clearfix m-t-30">
                                        <div class="pull-right">
                                          <button type="submit" class="btn btn-outline-primary" id="agregarcliente"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> Guardar</span></button>
                                          <button type="submit" class="btn btn-outline-primary" id="updatecliente" style="display: none;"><i class="zmdi zmdi-refresh zmdi-hc-fw m-r-5"></i><span> Actualizar</span></button>
                                          <a class="btn btn-outline-danger" data-dismiss="modal" id="cancelcliente" onclick="cancelCliente();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></a>
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
                            <h4 class="text-center text-primary font-12"><strong>LISTA DE CLIENTES</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="table-responsive">
                              <div id="tbl_cliente" class="dataTables_wrapper form-inline" role="grid">
                                <table id="tableCliente" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                  <thead class="text-center font-table">
                                    <tr class="bg-primary">
                                      <th class="text-center" width="5%">Nº</th>
                                      <th class="text-center" width="25%">NOMBRE</th>
                                      <th class="text-center" width="10%">DNI</th>
                                      <th class="text-center" width="15%">CELULAR</th>
                                      <th class="text-center" width="15%">CORREO</th>
                                      <th class="text-center" width="20%">CONTACTO</th>
                                      
                                      <th class="text-center" width="10%">&nbsp;&nbsp;ACCI&Oacute;N&nbsp;&nbsp;</th>
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

               <div role="tabpanel" class="tab-pane fade" id="tab-module">

                   <div class="container-fluid">
                    <div class="panel panel-primary">
                       <div class="panel-heading">
                           <h5 class="text-black m-b-18"><strong>PROYECTO</strong></h5>
                       </div>
                      <div class="panel-body">
                            <div class="row">
                              <div class="col-md-12 col-sm-12">

                                   
                                               <div class="row">
                                                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                    <div class="form-group">                                           
                                                      <select class="form-control" name="cboproyecto" id="cboproyecto" data-live-search="true" data-size="5" required>
                                                      </select>
                                                    </div>
                                                  </div>

                                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                  
                                                      <div class="pull-left">
                                                        <button type="button" class="btn btn-outline-success" id="VER_register" onclick="viewTablaproductos(),viewTablaproductos2()"><i class="zmdi zmdi-eye zmdi-hc-fw m-r-5"></i><span> Visualizar</span></button>
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
                         <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-12"><strong>LISTA DE LOTES DISPONIBLES</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="table-responsive">
                              <div id="tbl_producto" class="dataTables_wrapper form-inline" role="grid">
                                <table id="tableProducto" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                  <thead class="text-center font-table">
                                    <tr class="bg-primary">
                                      <th class="text-center" width="5%">Nº</th>
                                      <th class="text-center" width="25%">PROYECTO</th>
                                      <th class="text-center" width="10%">LOTE</th>
                                      <th class="text-center" width="10%">MANZANA</th>
                                      <th class="text-center" width="10%">MEDIDA</th>
                                      <th class="text-center" width="10%">DETALLES</th>
                                      <th class="text-center" width="10%">PRECIO</th>
                                      <th class="text-center" width="10%">ESTADO</th>
                                      <th class="text-center" width="10%">&nbsp;&nbsp;ACCI&Oacute;N&nbsp;&nbsp;</th>
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
                         <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-danger font-12"><strong>LISTA DE LOTES VENDIDOS O SEPARADOS</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="table-responsive">
                              <div id="tbl_producto" class="dataTables_wrapper form-inline" role="grid">
                                <table id="tableProducto2" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                  <thead class="text-center font-table">
                                    <tr class="bg-primary">
                                      <th class="text-center" width="5%">Nº</th>
                                      <th class="text-center" width="15%">CLIENTE</th>
                                      <th class="text-center" width="10%">LOTE</th>
                                      <th class="text-center" width="10%">MANZANA</th>
                                      <th class="text-center" width="10%">MEDIDA</th>
                                      <th class="text-center" width="10%">INICIAL</th>
                                      <th class="text-center" width="10%">INICIAL DEP.</th>
                                      <th class="text-center" width="10%">PRECIO</th>
                                      <th class="text-center" width="10%">ESTADO</th>
                                      <th class="text-center" width="10%">&nbsp;&nbsp;ACCI&Oacute;N&nbsp;&nbsp;</th>
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
                  
                  <!--   <div role="tabpanel" class="tab-pane fade" id="tab-asignar">
                    <div class="row">

                      <div class="col-md-4 col-sm-4">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-12" id="titleAsignar"><strong>ASIGNAR MEDIDAS</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              
                              <div class="col-lg-12">
                               <form class="form" id="form_registermedida" method="POST" autocomplete="off" action="javascript:void(0);">
                                  <input class="form-control" type="hidden" id="txtIdMedida" name="txtIdMedida">
                                  <input class="form-control" type="hidden" id="txtcontrolmedida" name="txtcontrolmedida" value="0">
                                  <div class="panel panel-default">
                                    <div class="panel-body">
                                                                           
                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Medida</label>
                                            <div class="input-group-prepend">
                                              <input class="form-control vld" type="text" id="txtdescripcionMedida" name="txtdescripcionMedida" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                                                       
                                      <div class="clearfix m-t-30">
                                        <div class="pull-right">
                                          <button type="submit" class="btn btn-outline-primary" id="agregarMedida"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> Guardar</span></button>
                                          <button type="submit" class="btn btn-outline-primary" id="updateMedida" style="display: none;"><i class="zmdi zmdi-refresh zmdi-hc-fw m-r-5"></i><span> Actualizar</span></button>
                                          <a class="btn btn-outline-danger" data-dismiss="modal" id="cancelMedida" onclick="cancelMedida();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8 col-sm-8">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-12"><strong>DETALLE MEDIDAS</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="table-responsive">
                              <div id="tbl_asignar" class="dataTables_wrapper form-inline" role="grid">
                                <table id="tableMedida" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                  <thead class="text-center font-table">
                                    <tr class="bg-primary">
                                      <th class="text-center" width="10%">N</th>
                                      <th class="text-center" width="50%">DESCRIPCI&Oacute;N DE MEDIDAS</th>
                                      <th class="text-center" width="20%">ESTADO</th>
                                      <th class="text-center" width="20%">ACCI&Oacute;N</th>
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
                  </div>  -->

                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- Modal venta 1 -->

    <div class="modal fade" id="modal_moduloventa" role="dialog" data-keyboard="false" data-backdrop="static" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden=ue">
                <i class="zmdi zmdi"tr-close"></i>
              </span>
            </button> -->
            <h4 id="titleModule" class="modal-title text-center text-primary font-16"><b>REGISTRAR TRANSACCION</b></h4>
          </div>
          <div class="modal-body">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
              <form class="form-horizontal" id="form_registerventa" method="POST" autocomplete="off" >
                <input class="form-control" type="hidden" id="txtIdProducto" name="txtIdProducto">
                <input class="form-control" type="hidden" id="txtcontrolIdVenta" name="txtcontrolIdVenta" >

                <div class="panel ">

                  <div class="panel-body">

                    <div class="row">

                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        

                          <div class="row">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label style="color: orangered;">CLIENTE</label>
                            <div class="input-group-prepend">
                             <select class="form-control" name="cbocliente" id="cbocliente" data-live-search="true" data-size="5" required>
                             </select>
                           </div>
                         </div>
                        </div>

                          <div class="row">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                           <label style="color: orangered;">ASESOR COMERCIAL</label>
                            <div class="input-group-prepend">
                             <select class="form-control" name="cboasesor" id="cboasesor" data-live-search="true" data-size="5" required>
                             </select>
                           </div>
                         </div>
                        </div>

                          
                     </div>
                   </div>

                  

                   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">

                      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                         <label style="color: orangered;">BANCO</label>
                        <div class="input-group-prepend">
                           <select class="form-control" name="cbobanco" id="cbobanco" data-live-search="true" data-size="5" required>
                             </select>
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <label style="color: orangered;">FECHA</label>
                        <div class="input-group-prepend">
                          <input class="form-control" type="date" id="txtFecha" name="txtFecha">
                        </div>
                      </div>
                    </div>
                  </div>


                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                     <label style="color: orangered;">NUMERO DE OPERACION - VOUCHER</label>
                     <div class="input-group-prepend">
                      <input type="text" class="form-control vld" name="txtvoucher" id="txtvoucher"  />
                    </div>
                  </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                     <label style="color: orangered;">Inicial</label>
                     <div class="input-group-prepend">
                      <input type="number" class="form-control vld" name="txtinicial" id="txtinicial"  />
                    </div>
                  </div>
                </div>

                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                     <label style="color: orangered;">evento</label>
                        <div class="input-group-prepend">
                          <select class="form-control" name="cboselect-evento" id="cboselect-evento" data-live-search="true" data-size="5" required>
                            <option value="0">VENTA</option> 
                            <option value="1">SEPARAR</option>
                          </select>
                        </div>
                   </div>


            

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label style="color: orangered;">OBSERVACIONES</label>
                <div class="col-lg-12">
                  <textarea class="form-control" rows="4" id="txtObservacion" > </textarea>
                </div>
              </div>
            </div>

          </div>

                 


          <div class="row clearfix m-t-30">
            <div class="pull-right">
             
                <button type="submit" class="btn btn-outline-primary" id="registrarVenta" value="registraventa"><i class="zmdi zmdi-refresh zmdi-hc-fw m-r-5"></i><span>Registrar</span></button>

              
              <a class="btn btn-outline-danger" data-dismiss="modal" id="cancelRegistro" onclick="cancelRegistroVenta();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cerrar</span></a>
            </div>
          </div>


        </div>
      </div>

    </form>
  </div>
  <div class="col-lg-1"></div>
</div>
<div class="modal-footer"></div>
</div>

</div>
</div>


      <!-- Modal detalleventa 2 -->

    <div class="modal fade" id="modal_modulodetalleventa" role="dialog" data-keyboard="false" data-backdrop="static" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden=ue">
                <i class="zmdi zmdi"tr-close"></i>
              </span>
            </button> -->
            <h4 id="titleModule" class="modal-title text-center text-primary font-16"><b>VENTA Y REGISTRO DE CUOTAS</b></h4>
          </div>
          <div class="modal-body">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
              <form class="form-horizontal" id="form_registerdetalleventa" method="POST" autocomplete="off" >
                <input class="form-control" type="hidden" id="txtDetalleVenta" name="txtDetalleVenta">
                <input class="form-control" type="hidden" id="txtcontrolIdDetalleVenta" name="txtcontrolIdDetalleVenta" value="0" >

                <div class="panel ">

                  <div class="panel-body">

                    <div class="row">

                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        

                          <div class="row">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label style="color: orangered;">CLIENTE</label>
                            <div class="input-group-prepend">
                             <input type="text" class="form-control vld" name="txtcliente" id="txtcliente"  />
                           </div>
                         </div>
                        </div>                        

                          
                     </div>
                   </div>

                  

                   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">

                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                         <label style="color: orangered;">BANCO</label>
                        <div class="input-group-prepend">
                           <select class="form-control" name="cbobanco2" id="cbobanco2" data-live-search="true" data-size="5" required>
                             </select>
                        </div>
                      </div>

                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label style="color: orangered;">FECHA</label>
                        <div class="input-group-prepend">
                          <input class="form-control" type="date" id="txtFecha2" name="txtFecha2">
                        </div>
                      </div>
                    </div>
                  </div>



                   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">

                        <div class="col-xs-6 col-sm-6 col-md-12 col-lg-6">
                            
                             <label style="color: orangered;">VOUCHER</label>
                             <div class="input-group-prepend">
                              <input type="text" class="form-control vld" name="txtvoucher2" id="txtvoucher2"  />
                            </div>
                          
                        </div>


                          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                              
                               <label style="color: orangered;">Segunda Inicial</label>
                               <div class="input-group-prepend">
                                <input type="number" class="form-control vld" name="txtinicial2" id="txtinicial2"  />
                              </div>
                            
                          </div>

                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                            
                             <label style="color: darkred;">FRACCIONAMIENTO DE CUOTAS</label>                          
                        </div>                          
                    </div>
                  </div>


                   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">

                        <div class="col-xs-6 col-sm-6 col-md-12 col-lg-6">
                            
                             <label style="color: orangered;">FECHAS DE PAGO</label>
                            <div class="input-group-prepend">
                              <input class="form-control" type="date" id="txtfechapago" name="txtfechapago">
                            </div>
                          
                        </div>


                          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                              
                               <label style="color: orangered;">Nº CUOTAS</label>
                               <div class="input-group-prepend">
                                <input type="number" class="form-control vld" name="txtcuotas" id="txtcuotas"  />
                              </div>
                            
                          </div>

                    </div>
                  </div>


                    <div class="form-group">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            
                             <label style="color: orangered;">MONTO DE LAS CUOTAS</label>
                             <div class="input-group-prepend">
                              <input type="text" class="form-control vld" name="txtmontocuotas" id="txtmontocuotas"  />
                            </div>
                          
                        </div>


                      
                    </div>
                  


               

       

          </div>

                 


          <div class="row clearfix m-t-30">
            <div class="pull-right">
             
                <button type="submit" class="btn btn-outline-primary" id="registrarVenta" value="registraventa"><i class="zmdi zmdi-refresh zmdi-hc-fw m-r-5"></i><span>Registrar</span></button>

              
              <a class="btn btn-outline-danger" data-dismiss="modal" id="cancelRegistro" onclick="cancelRegistroVenta();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cerrar</span></a>
            </div>
          </div>


        </div>
      </div>

    </form>
  </div>
  <div class="col-lg-1"></div>
</div>
<div class="modal-footer"></div>
</div>

</div>
</div>

      

  


      </div>
      <div class="site-footer">
        2022 © Sistema - Compu Electronics
      </div>
    </div>
    
    <!-- FOOTER -->
    <?php footerAdmin($data); ?>
  </body>

<!-- Mirrored from big-bang-studio.com/cosmos/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:53:30 GMT -->
</html>