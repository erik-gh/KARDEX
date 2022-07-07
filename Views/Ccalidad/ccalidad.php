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
                      <i class="zmdi zmdi-accounts-list-alt"></i>MATERIALES NO CRITICOS</a>
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
                          <h5 class="text-black m-b-18"><strong>BUSQUEDAD POR GUIA DE INGRESOS</strong></h5> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              <div class="col-md-12 col-sm-12">
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
                                                        <th class="text-center" width="10%">SERIE</th>
                                                        <th class="text-center" width="15%">PROVEEDOR</th>
                                                        <th class="text-center" width="15%">TIPO</th>
                                                        <th class="text-center" width="10%">ALMACEN</th>
                                                        <th class="text-center" width="10%">FECHA DOC.</th>
                                                        <th class="text-center" width="10%">FECHA ING.</th>
                                                        
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
                                                              <form class="form" id="form_registrarCcalidad" method="POST" autocomplete="off" action="javascript:void(0);">
                                                                <input class="form-control" type="text" id="txtIdComprarepliegue" name="txtIdComprarepliegue">
                                                                <input class="form-control" type="text" id="txtcontrolComprarepliegue" name="txtcontrolComprarepliegue" value="0">
                                                                <div class="panel panel-default">
                                                                  <div class="panel-body">
                                                                    <!--https://getbootstrap.com/docs/3.3/components/-->
                                                                    <div class="row">
                                                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                          <div class="form-group">
                                                                          <label>Responsable del C.C:</label>
                                                                             <div class="input-group">
                                                                               <span class="input-group-btn">
                                                                                <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-home"></span>
                                                                                </button>
                                                                              </span>
                                                                               <select class="form-control" name="cborecibidopor" id="cborecibidopor" data-live-search="true" data-size="5" required>
                                                                                  </select>
                                                                             
                                                                            </div>
                                                                        </div> 
                                                                       </div> 
                                                                    </div> 

                                                                    <div class="row">
                                                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                          <div class="form-group">
                                                                          <label>Almacen:</label>
                                                                             <div class="input-group">
                                                                               <span class="input-group-btn">
                                                                                <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-home"></span>
                                                                                </button>
                                                                              </span>
                                                                               <input class="form-control vld claseInput" type="text" id="txtalmacen" name="txtalmacen" disabled="false" required>
                                                                             
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
                                                                               <input class="form-control vld claseInput" type="text" id="txtproceso" name="txtproceso" disabled="false" required>
                                                                             
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
                                                                               <input class="form-control vld claseInput" type="text" id="txtproveedor" name="txtproveedor" disabled="false" required>
                                                                             
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
                                                                              <input class="form-control vld claseInput" type="text" id="txttipodocumento" name="txttipodocumento" disabled="false" required>
                                                                             
                                                                            </div>
                                                                        </div> 
                                                                       </div> 
                                                                    </div>                                                   
                                              

                                                       

             
                                                                    <div class="row">
                                                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                        <div class="form-group">
                                                                          <label>Fecha de Documento:</label>
                                                                          <div class="input-group-prepend">
                                                                              <input class="form-control vld claseInput" type="text" id="txtfechadoc" disabled="false" name="txtfechadoc" required>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    </div>  

                                                                

                                                                    <div class="row">
                                                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                        <div class="form-group">
                                                                          <label>Nro. Doc. de Proveedor:</label>
                                                                         <div class="input-group-prepend">
                                                                            <input class="form-control vld claseInput" type="text" id="txtserie2" disabled="false" name="txtserie2" required>
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
                                                                                            <button id="btncontrolcalidad" type="button" onclick="enviarFormCompraAdqui();" class="btn btn-success"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span>Guardar productos</span></button>
                                                                                         </div>                                                      
                                                                                </div>  

                                                                              <div class="col-md-4 col-sm-4">
                                                                                      <div class="pull-left">
                                                                                          <button type="button" onclick="bottonRegresar();" class="btn btn-danger" id="btnRegresar"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Regresar</span></button>
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
                                                              <h5 class="text-success m-b-18 " ><strong>MATERIALES </strong></h5>
                                                            </div>  
                                        
                                                          </div>
                                                        </div>
                                                     
                                                    <div class="panel-body">
                                                        <div class="table-responsive" >
                                                          <div id="tbl_detallecontrolcalidad" class="dataTables_wrapper form-inline" role="grid">
                                                            <table id="tableDetalleControlCalidad" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                            <thead class="text-center font-table">
                                                              <tr class="bg-primary">
                                                                <th class="text-center" width="5%">Nº</th>
                                                                <th class="text-center" width="45%">PRODUCTO</th>
                                                                <th class="text-center" width="8%">TcA</th>
                                                                <th class="text-center" width="8  %">TcB</th>
                                                                <th class="text-center" width="8%">TcC</th>
                                                                
                                                                <th class="text-center" width="6%">CANTIDAD</th>
                                                                <th class="text-center" width="6%">A</th>
                                                                <th class="text-center" width="6%">B</th>
                                                                <th class="text-center" width="6%">C</th>                                                                
                                                                
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

                                  


                                   <div class="row">

                                       <div class="col-md-6 col-sm-6">

                                              <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                      <div class="panel panel-default  panel-table m-b-0 " id="panelaprobarcontrolcalidad">
                                                        <div class="panel-heading ">
                                                          <h4 class="text-center text-danger font-18"><strong>APROBAR CONTROL CALIDAD</strong></h4>
                                                        </div>
                                                        <div class="panel-body">
                                                          <div class="table-responsive">
                                                            <div id="tbl_aprobcontrolcalidad" class="dataTables_wrapper form-inline" role="grid">
                                                              <table id="tableaprobarccalidad" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                                <thead class="text-center font-table">
                                                                  <tr class="bg-primary">
                                                                    <th class="text-center" width="5%">Nº</th>
                                                                    <th class="text-center" width="15%">RAZON SOCIAL</th>
                                                                    <th class="text-center" width="20%">SERIE</th>
                                                                    <th class="text-center" width="10%">USUARIO REG</th>
                                                                    <th class="text-center" width="10%">FECHA</th>
                                                                                                                                                                       
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

                                        <div class="col-md-6 col-sm-6">

                                              <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                  <input class="form-control" type="hidden" id="txtIdComprarepliegueid" name="txtIdComprarepliegueid">
                                                  <input class="form-control" type="hidden" id="txtIdCalidadid" name="txtIdCalidadid">
                                                  <input class="form-control" type="hidden" id="txtestadodcc" name="txtestadodcc">
                                                      <div class="panel panel-default  panel-table m-b-0 " id="paneldetallecontrolcalidad">
                                                        <div class="panel-heading ">
                                                          <h4 class="text-center text-danger font-18"><strong>DETALLE CONTROL CALIDAD</strong></h4>
                                                        </div>
                                                        <div class="panel-body">
                                                          <div class="table-responsive">
                                                            <div id="tbl_detalleaprobcontrolcalidad" class="dataTables_wrapper form-inline" role="grid">
                                                              <table id="tabledetalleaprobarccalidad" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                                <thead class="text-center font-table">
                                                                  <tr class="bg-primary">
                                                                    <th class="text-center" width="5%">Nº</th>
                                                                    <th class="text-center" width="45%">PRODUCTO</th>
                                                                    <th class="text-center" width="15%">A</th>
                                                                    <th class="text-center" width="15%">B</th>
                                                                    <th class="text-center" width="15%">C</th>                                                                                                                                                                                                                         
                                                                  
                                                                    
                                                                </thead>
                                                                <tbody class="text-center font-table">
                                                                  

                                                                </tbody>
                                                              </table>
                                                            </div>                                                            
                                                          </div>
                                                            <div class="row">

                                                                                <div class="col-md-6 col-sm-6">                                                  
                                                                                </div>  
                                                                                <div class="col-md-6 col-sm-6">
                                                                                        <div class="pull-right">
                                                                                            <button type="button" onclick="aprobarproductosCcalidad();" id="btnconfirmastock" class="btn btn-success"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span>Confirmar Stock</span></button>
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
                               
                </div>
              </div>
            </div>
          </div>
        </div>

              <!-- Modal LISTA DE PRODUCTOS -->
       

       

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