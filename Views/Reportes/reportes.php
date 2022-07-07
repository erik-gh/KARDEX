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
                    <a href="#tab-smateriales" role="tab" data-toggle="tab" aria-expanded="true">
                      <i class="zmdi zmdi-view-module"></i>STOK DE MATERIALES</a>
                  </li>

                  <li class="">
                    <a href="#tab-tmateriales" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-refresh"></i>TRAZABILIDAD DE MATERIAL</a>
                  </li>

                   <!--li class="">
                    <a href="#tab-srequerimiento" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-search"></i>SEGUIMIENTO DE REQUERIMIENTO</a>
                  </li-->
                  
                </ul>

                <div class="tab-content">
                  

                  <div role="tabpanel" class="tab-pane fade active in" id="tab-smateriales">
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <div class="panel panel-primary panel-table m-b-0">
                          <div class=" panel-heading">
                            <h5 class="text-black m-b-18"><strong>STOCK DE MATERIALES </strong></h5> 
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <!-- <div class="col-lg-1"></div> -->
                              <div class="col-lg-12">
                                <form class="form" id="form_stockmateriales" method="POST" autocomplete="off" action="javascript:void(0);">
                                  <input class="form-control" type="hidden" id="txtStock" name="txtStock">
                                  <input class="form-control" type="hidden" id="txtcontrolStock" name="txtcontrolStock" value="0">
                                  <div class="panel panel-default">
                                    <div class="panel-body">
                                      <!-- <h5 class="text-blue-grey m-b-15"><strong>DATOS PERSONALES</strong></h5> -->
                                      
                                      <div class="row">
                                          <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">                                              
                                                <div class="form-group">
                                                  <label>Almacen</label>
                                                  <div class="row">
                                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                          <select class="form-control" name="cbosucursal" id="cbosucursal" data-live-search="true" data-size="5" required>
                                                          </select>
                                                        
                                                      </div>
                                                  </div>
                                                </div>                                              
                                          </div> 

                                          <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">                                              
                                                <div class="form-group">
                                                  <label>Familia</label>
                                                  <div class="row">
                                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">         
                                                          <select class="form-control" onchange="CboClase();" name="cbofamiliarepor" id="cbofamiliarepor" data-live-search="true" data-size="5" required>
                                                          </select>
                                                        
                                                      </div>
                                                  </div>
                                                </div>                                              
                                          </div> 

                                          <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">                                              
                                                <div class="form-group">
                                                  <label>Clase</label>
                                                  <div class="row">
                                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
                                                          <select class="form-control" onchange="cboProducto();" name="cboclaserepor" id="cboclaserepor" data-live-search="true" data-size="5" required>
                                                          </select>
                                                        
                                                      </div>
                                                  </div>
                                                </div>                                              
                                          </div> 

                                          <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">                                              
                                                <div class="form-group">
                                                  <label>Producto</label>
                                                  <div class="row">
                                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                          <select class="form-control" name="cboproductorepor" id="cboproductorepor" data-live-search="true" data-size="5" required>
                                                          </select>
                                                        
                                                      </div>
                                                  </div>
                                                </div>                                              
                                          </div> 


                                         <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                                                <div class="clearfix m-t-30">
                                                  <div class="pull-letf ">
                                                    <button type="submit" onclick="buttonconsultastock();" class="btn btn-outline-primary" id="btnconsulta"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> CONSULTAR</span></button>
                                                    
                                                  </div>
                                              </div>
                                         </div> 


                                      </div>

                                      <div class="row">
                        
                                          <div class="col-md-12 col-sm-12">

                                            <div class="panel panel-default  panel-table m-b-0 " id="paneldetallecompras">
                                              <div class="panel-heading ">
                                                <h4 class="text-center text-danger font-18"><strong>STOCK POR SUCURSAL</strong></h4>
                                              </div>
                                              <div class="panel-body">
                                                <div class="table-responsive">
                                                  <div id="tbl_totalingresos" class="dataTables_wrapper form-inline" role="grid">
                                                    <table id="tableStockProductos" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                      <thead class="text-center font-table">
                                                        <tr class="bg-primary">
                                                          <th class="text-center" width="5%">COD</th>
                                                          <th class="text-center" width="10%">ALMACEN</th>
                                                          <th class="text-center" width="20%">PRODUCTO</th>
                                                          <th class="text-center" width="5%">AT</th>
                                                          <th class="text-center" width="5%">BT</th>
                                                          <th class="text-center" width="5%">CT</th>
                                                          <th class="text-center" width="10%">EXISTENCIA</th>
                                                          <th class="text-center" width="2%">IDFAM</th>
                                                          <th class="text-center" width="8%">FAMILIA</th>
                                                          <th class="text-center" width="2%">IDCLA</th>
                                                          <th class="text-center" width="8%">CLASE</th>
                                                          <th class="text-center" width="10%">UMA</th>
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
                                </form>
                              </div>
                              <!-- <div class="col-lg-1"></div> -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>  
                  </div>

                  <div role="tabpanel" class="tab-pane fade " id="tab-tmateriales">
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <div class="panel panel-primary panel-table m-b-0">
                          <div class=" panel-heading">
                            <h5 class="text-black m-b-18"><strong>SEGUIMIENTO DE PRODUCTO </strong></h5> 
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <!-- <div class="col-lg-1"></div> -->
                              <div class="col-lg-12">
                                <form class="form" id="form_stockmateriales" method="POST" autocomplete="off" action="javascript:void(0);">
                                  <input class="form-control" type="hidden" id="txtStock" name="txtStock">
                                  <input class="form-control" type="hidden" id="txtcontrolStock" name="txtcontrolStock" value="0">
                                  <div class="panel panel-default">
                                    <div class="panel-body">
                                      <!-- <h5 class="text-blue-grey m-b-15"><strong>DATOS PERSONALES</strong></h5> -->
                                      
                                      <div class="row">
                                          <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">              
                                                <div class="form-group">
                                                  <label>Almacen</label>
                                                  <div class="row">
                                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                                                       
                                                          <select class="form-control" name="cbosucursalT" id="cbosucursalT" data-live-search="true" data-size="5" required>
                                                          </select>
                                                        
                                                      </div>
                                                  </div>
                                                </div>                                              
                                           </div> 

                                            <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">              
                                                <div class="form-group">
                                                  <label>Producto</label>
                                                  <div class="row">
                                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                                                       
                                                          <select class="form-control" name="cboproducto" id="cboproducto" data-live-search="true" data-size="5" required>
                                                          </select>
                                                        
                                                      </div>
                                                  </div>
                                                </div>                                              
                                            </div> 


                                          <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2"> 
                                            <div class="form-group">
                                              <label>Desde:</label>
                                              <div class="input-group-prepend">
                                                  <input class="form-control claseInput" type="date" id="txtfechadesde" name="txtfechadesde">
                                              </div>
                                            </div>
                                          </div>

                                           <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2"> 
                                            <div class="form-group">
                                              <label>Hasta:</label>
                                              <div class="input-group-prepend">
                                                  <input class="form-control claseInput" type="date" id="txtfechahasta" name="txtfechahasta">
                                              </div>
                                            </div>
                                          </div>


                                         <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">  
                                                <div class="clearfix m-t-30">
                                                  <div class="pull-letf ">
                                                    <button type="submit" onclick="buttontrazproducto();" class="btn btn-outline-primary" id="btnconsulta"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> CONSULTAR</span></button>                                          
                                                  </div>
                                              </div>
                                         </div> 


                                      </div>

                                      <div class="row">
                        
                                          <div class="col-md-12 col-sm-12">

                                            <div class="panel panel-default  panel-table m-b-0 " id="paneldetallecompras">
                                              <div class="panel-heading ">
                                                <h4 class="text-center text-danger font-18"><strong>TRAZABILIDAD DEL PRODUCTO</strong></h4>
                                              </div>
                                              <div class="panel-body">
                                                <div class="table-responsive">
                                                  <div id="tbl_tazprod" class="dataTables_wrapper form-inline" role="grid">
                                                    <table id="tableTrazProd" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                      <thead class="text-center font-table">
                                                        <tr class="bg-primary">
                                                          <th class="text-center" width="5%">Nº</th>

                                                          <th class="text-center" width="10%">SUCURSAL</th>
                                                          <th class="text-center" width="10%">CODPROD</th>
                                                          <th class="text-center" width="40%">PRODUCTO</th>
                                                          <th class="text-center" width="10%">MOVIMIENTO</th>
                                                          <th class="text-center" width="10%">KARDEX</th>
                                                          <th class="text-center" width="5%">A</th>
                                                          <th class="text-center" width="5%">B</th>
                                                          <th class="text-center" width="5%">C</th>
                                                          <th class="text-center" width="5%">ENT</th>
                                                          <th class="text-center" width="5%">SAL</th>
                                                          <th class="text-center" width="10%">EXISTENCIA</th>
                                                          <th class="text-center" width="10%">FECHA</th>
                                                          <th class="text-center" width="10%">USUARIO</th>
                                                          
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
                                </form>
                              </div>
                              <!-- <div class="col-lg-1"></div> -->
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
        2022 © Sistema Kardex
      </div>
    </div>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <!-- FOOTER -->
    <?php footerAdmin($data); ?>
  </body>



<!-- Mirrored from big-bang-studio.com/cosmos/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:53:30 GMT -->
</html>