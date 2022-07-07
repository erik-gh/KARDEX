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
                      <i class="zmdi zmdi-accounts-list-alt"></i>PRODUCTOS</a>
                  </li>
                  <li class="">
                    <a href="#tab-uma" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-view-module"></i>UMA</a>
                  </li>
                  <li class="">
                    <a href="#tab-clase" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-view-module"></i> CLASE</a>
                  </li>
                  <li class="">
                    <a href="#tab-familia" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-assignment-check"></i> FAMILIA</a>
                  </li>

                   <li class="">
                    <a href="#tab-proveedor" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-assignment-check"></i> PROVEEDOR</a>
                  </li>

                  <li class="">
                    <a href="#tab-personal" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-assignment-check"></i> PERSONAL</a>
                  </li>

                  <li class="">
                    <a href="#tab-cargo" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-assignment-check"></i> CARGO</a>
                  </li>

                  <li class="">
                    <a href="#tab-documento" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-assignment-check"></i>DOCUMENTO</a>
                  </li>

                  <li class="">
                    <a href="#tab-centroconsumo" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-assignment-check"></i>CENTRO CONSUMO</a>
                  </li>

                  <li class="">
                    <a href="#tab-almacen" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-assignment-check"></i>ALMACEN</a>
                  </li>

                  <li class="">
                    <a href="#tab-proceso" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-assignment-check"></i> PROCESO</a>
                  </li>

                </ul>

                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab-productos">
                    <div class="row">
                      <div class="col-md-5 col-sm-5">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-12" id="titleProducto"><strong>CREAR PRODUCTOS</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <!-- <div class="col-lg-1"></div> -->
                              <div class="col-lg-12">
                                <form class="form" id="form_registerproducto" method="POST" autocomplete="off" action="javascript:void(0);">
                                  <input class="form-control" type="hidden" id="txtIdProducto" name="txtIdProducto">
                                  <input class="form-control" type="hidden" id="txtcontrolProducto" name="txtcontrolProducto" value="0">
                                  <div class="panel panel-default">
                                    <div class="panel-body">
                                      <!-- <h5 class="text-blue-grey m-b-15"><strong>DATOS PERSONALES</strong></h5> -->
                                      
                                      <div class="row">
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                          <div class="form-group">
                                            <label>Descripcion</label>
                                            <div class="input-group-prepend">
                                              <input class="form-control vld" type="text" id="txtdescripcion" name="txtdescripcion" required>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                          <div class="form-group">
                                            <label>Codigo</label>
                                            <div class="input-group-prepend">
                                              <input class="form-control vld" type="text" id="txtcodigo" name="txtcodigo" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Clase</label>
                                            <select class="form-control" name="cboclase" id="cboclase" data-live-search="true" data-size="5" required>
                                            </select>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Uma</label>
                                            <select class="form-control" name="cbouma" id="cbouma" data-live-search="true" data-size="5" required>
                                            </select>
                                          </div>
                                        </div>
                                      </div>

                                       <div class="row" id="estado_producto" style="display: none;">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="switches-stacked">
                                              <label>Activo</label>
                                              <label class="switch switch-primary">  
                                                <input type="checkbox" id="chkestadoproducto" name="chkestadoproducto" class="s-input">
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
                                          <button type="submit" class="btn btn-outline-primary" id="agregarProducto"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> Guardar</span></button>
                                          <button type="submit" class="btn btn-outline-primary" id="updateProducto" style="display: none;"><i class="zmdi zmdi-refresh zmdi-hc-fw m-r-5"></i><span> Actualizar</span></button>
                                          <a class="btn btn-outline-danger" data-dismiss="modal" id="cancelProducto" onclick="cancelProducto();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></a>
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
                            <h4 class="text-center text-primary font-12"><strong>LISTA DE PRODUCTOS</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="table-responsive">
                              <div id="tbl_perfils" class="dataTables_wrapper form-inline" role="grid">
                                <table id="tableProducto" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                  <thead class="text-center font-table">
                                      <tr class="bg-primary">
                                          <th class="text-center" width="5%">Nº</th>
                                          <th class="text-center" width="5">CODIGO</th>
                                          <th class="text-center" width="40">PRODUCTO</th>
                                          <th class="text-center" width="20%">CLASE</th>
                                          <th class="text-center" width="10%">UMA</th>
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
                 
                  <div role="tabpanel" class="tab-pane fade" id="tab-uma"> 
                    <div class="row">
                      <div class="col-md-5 col-sm-5">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-14" id="titleUma"><strong>Crear UMA</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <!-- <div class="col-lg-1"></div> -->
                              <div class="col-lg-12">
                                <form class="form" id="form_uma" method="POST" autocomplete="off" action="javascript:void(0);">
                                  <input class="form-control" type="hidden" id="txtIdUma" name="txtIdUma">
                                  <input class="form-control" type="hidden" id="txtcontrolUma" name="txtcontrolUma" value="0">
                                  <div class="panel panel-default">
                                    <div class="panel-body">
                                     
                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>UMA:</label>
                                           <div class="input-group-prepend">
                                              <input class="form-control vld" type="text" id="txtdescripcionuma" name="txtdescripcionuma" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="row" id="estado_uma" style="display: none;">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="switches-stacked">
                                              <label>Activo</label>
                                              <label class="switch switch-primary">  
                                                <input type="checkbox" id="chkestadouma" name="chkestadouma" class="s-input">
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
                                          <button type="submit" class="btn btn-outline-primary" id="agregarUma"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> Guardar</span></button>
                                          <button type="submit" class="btn btn-outline-primary" id="updateUma" style="display: none;"><i class="zmdi zmdi-refresh zmdi-hc-fw m-r-5"></i><span> Actualizar</span></button>
                                          <a class="btn btn-outline-danger" data-dismiss="modal" id="cancelUma" onclick="cancelUma();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></a>
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
                            <h4 class="text-center text-primary font-12"><strong>DETALLE DE UMA</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="table-responsive">
                              <div id="tbl_uma" class="dataTables_wrapper form-inline" role="grid">
                                <table id="tableUma" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                  <thead class="text-center font-table">
                                    <tr class="bg-primary">
                                      <th class="text-center" width="10%">N</th>
                                      <th class="text-center" width="50%">DESCRIPCI&Oacute;N DE UMA</th>
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
                  </div>

                  <div role="tabpanel" class="tab-pane fade" id="tab-clase">
                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-12" id="titleClase"><strong>ASIGNAR CLASE</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <!-- <div class="col-lg-1"></div> -->
                              <div class="col-lg-12">
                               <form class="form" id="form_registerclase" method="POST" autocomplete="off" action="javascript:void(0);">
                                  <input class="form-control" type="hidden" id="txtIdclase" name="txtIdclase">
                                  <input class="form-control" type="hidden" id="txtcontrolclase" name="txtcontrolclase" value="0">
                                  <div class="panel panel-default">
                                    <div class="panel-body">

                                       <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Clase:</label>
                                           <div class="input-group-prepend">
                                              <input class="form-control vld" type="text" id="txtdescripcionclase" name="txtdescripcionclase" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Familia</label>
                                            <select class="form-control" name="cbofamilia" id="cbofamilia" data-live-search="true" data-size="5" required>
                                            </select>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="row" id="estado_clase" style="display: none;">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="switches-stacked">
                                              <label>Activo</label>
                                              <label class="switch switch-primary">  
                                                <input type="checkbox" id="chkestadoclase" name="chkestadoclase" class="s-input">
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
                                          <button type="submit" class="btn btn-outline-primary" id="agregarClase"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> Guardar</span></button>
                                          <button type="submit" class="btn btn-outline-primary" id="updateClase" style="display: none;"><i class="zmdi zmdi-refresh zmdi-hc-fw m-r-5"></i><span> Actualizar</span></button>
                                          <a class="btn btn-outline-danger" data-dismiss="modal" id="cancelClase" onclick="cancelClase();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></a>
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
                            <h4 class="text-center text-primary font-12"><strong>DETALLE DE CLASES</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="table-responsive">
                              <div id="tbl_asignar" class="dataTables_wrapper form-inline" role="grid">
                                <table id="tableClase" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                  <thead class="text-center font-table">
                                    <tr class="bg-primary">
                                      <th class="text-center" width="10%">N</th>
                                      <th class="text-center" width="25%">DESCRIPCI&Oacute;N DE CLASE</th>
                                      <th class="text-center" width="25%">DESCRIPCI&Oacute;N DE FAMILIA</th>
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
                  </div>
                  
                  <div role="tabpanel" class="tab-pane fade" id="tab-familia">
                    <div class="row">

                      <div class="col-md-4 col-sm-4">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-12" id="titleFamilia"><strong>ASIGNAR FAMILIA</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <!-- <div class="col-lg-1"></div> -->
                              <div class="col-lg-12">
                               <form class="form" id="form_registerfamilia" method="POST" autocomplete="off" action="javascript:void(0);">
                                  <input class="form-control" type="hidden" id="txtIdfamilia" name="txtIdfamilia">
                                  <input class="form-control" type="hidden" id="txtcontrolfamilia" name="txtcontrolfamilia" value="0">
                                  <div class="panel panel-default">
                                    <div class="panel-body">
                                                                           
                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Familia</label>
                                            <div class="input-group-prepend">
                                              <input class="form-control vld" type="text" id="txtdescripcionfamilia" name="txtdescripcionfamilia" required>
                                            </div>
                                          </div>
                                        </div>
                                      </div>


                                      <div class="row" id="estado_familia" style="display: none;">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="switches-stacked">
                                              <label>Activo</label>
                                              <label class="switch switch-primary">  
                                                <input type="checkbox" id="chkestadofamilia" name="chkestadofamilia" class="s-input">
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
                                          <button type="submit" class="btn btn-outline-primary" id="agregarFamilia"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> Guardar</span></button>
                                          <button type="submit" class="btn btn-outline-primary" id="updateFamilia" style="display: none;"><i class="zmdi zmdi-refresh zmdi-hc-fw m-r-5"></i><span> Actualizar</span></button>
                                          <a class="btn btn-outline-danger" data-dismiss="modal" id="cancelFamilia" onclick="cancelFamilia();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></a>
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
                            <h4 class="text-center text-primary font-12"><strong>DETALLE FAMILIA</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="table-responsive">
                              <div id="tbl_asignarS" class="dataTables_wrapper form-inline" role="grid">
                                <table id="tableFamilia" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                  <thead class="text-center font-table">
                                    <tr class="bg-primary">
                                      <th class="text-center" width="10%">N</th>
                                      <th class="text-center" width="50%">DESCRIPCI&Oacute;N DE FAMILIA</th>
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
                                                <input class="form-control vld " placeholder="Introduzca su RUC" minlength="11" maxlength="11" type="text" id="txtruc" name="txtruc" onkeypress="SoloNum()" required>
                                               
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
                                                <input class="form-control vld" type="text" id="txtcelular" placeholder="Introduzca su Celular" minlength="9" maxlength="9" name="txtcelular" onkeypress="SoloNum()" required>
                                               
                                              </div>
                                          </div> 
                                         </div> 
                                      </div>

                                       <div class="row" id="estado_proveedor" style="display: none;">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="switches-stacked">
                                              <label>Activo</label>
                                              <label class="switch switch-primary">  
                                                <input type="checkbox" id="chkestadoproveedor" name="chkestadoproveedor" class="s-input">
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

                  <div role="tabpanel" class="tab-pane fade" id="tab-personal"> 
                    <div class="row">
                      <div class="col-md-5 col-sm-5">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-14" id="titlePersonal"><strong>Crear Personal</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <!-- <div class="col-lg-1"></div> -->
                              <div class="col-lg-12">
                                <form class="form" id="form_personal" method="POST" autocomplete="off" action="javascript:void(0);">
                                  <input class="form-control" type="hidden" id="txtIdPersonal" name="txtIdPersonal">
                                  <input class="form-control" type="hidden" id="txtcontrolPersonal" name="txtcontrolPersonal" value="0">
                                  <div class="panel panel-default">
                                    <div class="panel-body">


                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                            <label>DNI</label>
                                               <div class="input-group">
                                                 <span class="input-group-btn">
                                                  <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-user"></span>
                                                  </button>
                                                </span>
                                                <input class="form-control vld" type="text" id="txtdni" name="txtdni" minlength="8" maxlength="8" onkeypress="SoloNum()" required>
                                               
                                              </div>
                                          </div> 
                                         </div> 
                                      </div> 

                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                            <label>Nombre y Apellido</label>
                                               <div class="input-group">
                                                 <span class="input-group-btn">
                                                  <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-user"></span>
                                                  </button>
                                                </span>
                                                <input class="form-control vld" type="text" id="txtnombre" name="txtnombre" required>
                                               
                                              </div>
                                          </div> 
                                         </div> 
                                      </div> 


                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Centro de Consumo </label>
                                            <select class="form-control" name="cboconsumo" id="cboconsumo" data-live-search="true" data-size="5" required>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                             
                                              

                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Cargo </label>
                                            <select class="form-control" name="cbocargo" id="cbocargo" data-live-search="true" data-size="5" required>
                                            </select>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="row" id="estado_personal" style="display: none;">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="switches-stacked">
                                              <label>Activo</label>
                                              <label class="switch switch-primary">  
                                                <input type="checkbox" id="chkestadopersonal" name="chkestadopersonal" class="s-input">
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
                                          <button type="submit" class="btn btn-outline-primary" id="agregarpersonal"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> Guardar</span></button>
                                          <button type="submit" class="btn btn-outline-primary" id="updatepersonal" style="display: none;"><i class="zmdi zmdi-refresh zmdi-hc-fw m-r-5"></i><span> Actualizar</span></button>
                                          <a class="btn btn-outline-danger" data-dismiss="modal" id="cancelpersonal" onclick="cancelPersonal();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></a>
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
                            <h4 class="text-center text-primary font-12"><strong>DETALLE DE PERSONAL</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="table-responsive">
                              <div id="tbl_personal" class="dataTables_wrapper form-inline" role="grid">
                                <table id="tablePersonal" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                  <thead class="text-center font-table">
                                    <tr class="bg-primary">
                                      <th class="text-center" width="10%">N</th>
                                      <th class="text-center" width="20%">Nombre y Apelidos</th>
                                      <th class="text-center" width="20%">Dni</th>
                                      <th class="text-center" width="20%">Centro de Consumo </th>
                                      <th class="text-center" width="10%">Cargo</th>
                                      <th class="text-center" width="10%">Estado</th>
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

                  <div role="tabpanel" class="tab-pane fade" id="tab-cargo">
                      <div class="row">
                        <div class="col-md-4 col-sm-4">
                          <div class="panel panel-default panel-table m-b-0">
                            <div class="panel-heading">
                              <h4 class="text-center text-primary font-12" id="titleCargo"><strong>REGISTRAR CARGO</strong></h4>
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                <!-- <div class="col-lg-1"></div> -->
                                <div class="col-lg-12">
                                  <form class="form" id="form_registerCargo" method="POST" autocomplete="off" action="javascript:void(0);">
                                    <input class="form-control" type="hidden" id="txtIDCargo" name="txtIDCargo">
                                    <input class="form-control" type="hidden" id="txtcontrolCargo" name="txtcontrolCargo" value="0">
                                    <div class="panel panel-default">
                                      <div class="panel-body">
                                        <!-- <h5 class="text-blue-grey m-b-15"><strong>DATOS PERSONALES</strong></h5> -->
                                        <div class="row">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                              <label>Cargo</label>
                                              <div class="input-group-prepend">
                                                <input class="form-control vld" type="text" id="txtcargo" name="txtcargo" required>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                   
                                        <!-- <h5 class="text-blue-grey m-b-15"><strong>DATOS DEL USUARIO</strong></h5> -->
                                        <div class="row" id="estado_cargo" style="display: none;">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="switches-stacked">
                                              <label>Activo</label>
                                              <label class="switch switch-primary">  
                                                <input type="checkbox" id="chkestadoCargo" name="chkestadoCargo" class="s-input">
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
                                            <button type="submit" class="btn btn-outline-primary" id="agregarCargo"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> Guardar</span></button>
                                            <button type="submit" class="btn btn-outline-primary" id="updateCargo" style="display: none;"><i class="zmdi zmdi-refresh zmdi-hc-fw m-r-5"></i><span> Actualizar</span></button>
                                            <a class="btn btn-outline-danger" data-dismiss="modal" id="cancelCargo" onclick="cancelCargo();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></a>
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
                              <h4 class="text-center text-primary font-12"><strong>LISTA DE CARGOS</strong></h4>
                            </div>
                            <div class="panel-body">
                            
                              <div class="table-responsive">
                                <div id="tbl_cargo" class="dataTables_wrapper form-inline" role="grid">
                                  <table id="tableCargos" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead class="text-center font-table">
                                        <tr class="bg-primary">
                                            <th class="text-center" width="10%">Nº</th>
                                            <th class="text-center" width="35%">CARGO</th>
                                            <th class="text-center" width="10%">REMUNERACI&Oacute;N</th>
                                            <th class="text-center" width="20%">ESTADO</th>
                                            <th class="text-center" width="15%">ACCI&Oacute;N</th>
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

                  <div role="tabpanel" class="tab-pane fade" id="tab-documento"> 
                    <div class="row">
                      <div class="col-md-5 col-sm-5">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-14" id="titledocumento"><strong>Crear Documento</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <!-- <div class="col-lg-1"></div> -->
                              <div class="col-lg-12">
                                <form class="form" id="form_documento" method="POST" autocomplete="off" action="javascript:void(0);">
                                  <input class="form-control" type="hidden" id="txtIddocumento" name="txtIddocumento">
                                  <input class="form-control" type="hidden" id="txtcontroldocumento" name="txtcontroldocumento" value="0">
                                  <div class="panel panel-default">
                                    <div class="panel-body">


                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                            <label>Nombre del Documento</label>
                                               <div class="input-group">
                                                 <span class="input-group-btn">
                                                  <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-bookmark"></span>
                                                  </button>
                                                </span>
                                                <input class="form-control vld" type="text" id="txtnombredocumento" name="txtnombredocumento" required>
                                               
                                              </div>
                                          </div> 
                                         </div> 
                                      </div> 



                                
                                        <div class="row" id="estado_documento" style="display: none;">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="switches-stacked">
                                              <label>Activo</label>
                                              <label class="switch switch-primary">  
                                                <input type="checkbox" id="chkestadodocumento" name="chkestadodocumento" class="s-input">
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
                                          <button type="submit" class="btn btn-outline-primary" id="agregardocumento"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> Guardar</span></button>
                                          <button type="submit" class="btn btn-outline-primary" id="updatedocumento" style="display: none;"><i class="zmdi zmdi-refresh zmdi-hc-fw m-r-5"></i><span> Actualizar</span></button>
                                          <a class="btn btn-outline-danger" data-dismiss="modal" id="canceldocumento" onclick="cancelDocumento();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></a>
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
                            <h4 class="text-center text-primary font-12"><strong>LISTA DE DOCUMENTOS</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="table-responsive">
                              <div id="tbl_personal" class="dataTables_wrapper form-inline" role="grid">
                                <table id="tabledocumento" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                  <thead class="text-center font-table">
                                    <tr class="bg-primary">
                                      <th class="text-center" width="10%">N</th>
                                      <th class="text-center" width="20%">Descripcion</th>
                                      <th class="text-center" width="10%">Estado</th>
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


                  <div role="tabpanel" class="tab-pane fade" id="tab-centroconsumo">
                      <div class="row">
                        <div class="col-md-5 col-sm-5">
                          <div class="panel panel-default panel-table m-b-0">
                            <div class="panel-heading">
                              <h4 class="text-center text-primary font-12" id="titleCconsumo"><strong>REGISTRAR CENTRO CONSUMO</strong></h4>
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                <!-- <div class="col-lg-1"></div> -->
                                <div class="col-lg-12">
                                  <form class="form" id="form_registercentroconsumo" method="POST" autocomplete="off" action="javascript:void(0);">
                                    <input class="form-control" type="hidden" id="txtIdCentroConsumo" name="txtIdCentroConsumo">
                                    <input class="form-control" type="hidden" id="txtcontrolCentroConsumo" name="txtcontrolCentroConsumo" value="0">
                                    <div class="panel panel-default">
                                      <div class="panel-body">
                                        <!-- <h5 class="text-blue-grey m-b-15"><strong>DATOS PERSONALES</strong></h5> -->
                                        <div class="row">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                              <label>Centro Consumo</label>
                                              <div class="input-group-prepend">
                                                <input class="form-control vld" type="text" id="txtcconsumo" name="txtcconsumo" required>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                   
                                        <!-- <h5 class="text-blue-grey m-b-15"><strong>DATOS DEL USUARIO</strong></h5> -->
                                        <div class="row" id="estado_consumo" style="display: none;">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="switches-stacked">
                                              <label>Activo</label>
                                              <label class="switch switch-primary">  
                                                <input type="checkbox" id="chkestadocconsumo" name="chkestadocconsumo" class="s-input">
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
                                            <button type="submit" class="btn btn-outline-primary" id="agregarCconsumo"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> Guardar</span></button>
                                            <button type="submit" class="btn btn-outline-primary" id="updateCconsumo" style="display: none;"><i class="zmdi zmdi-refresh zmdi-hc-fw m-r-5"></i><span> Actualizar</span></button>
                                            <a class="btn btn-outline-danger" data-dismiss="modal" id="cancelCconsumo" onclick="cancelCconsumo();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></a>
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
                              <h4 class="text-center text-primary font-12"><strong>LISTA CENTROS DE CONSUMOS</strong></h4>
                            </div>
                            <div class="panel-body">
                           
                              <div class="table-responsive">
                                <div id="tbl_consumo" class="dataTables_wrapper form-inline" role="grid">
                                  <table id="tableCconsumo" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead class="text-center font-table">
                                        <tr class="bg-primary">
                                            <th class="text-center" width="10%">Nº</th>
                                            <th class="text-center" width="60%">DESCRIPCION</th>
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


                  <div role="tabpanel" class="tab-pane fade" id="tab-almacen"> 
                    <div class="row">
                      <div class="col-md-5 col-sm-5">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-14" id="titlealmacen"><strong>Crear Almacen</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <!-- <div class="col-lg-1"></div> -->
                              <div class="col-lg-12">
                                <form class="form" id="form_almacen" method="POST" autocomplete="off" action="javascript:void(0);">
                                  <input class="form-control" type="hidden" id="txtIdalmacen" name="txtIdalmacen">
                                  <input class="form-control" type="hidden" id="txtcontrolalmacen" name="txtcontrolalmacen" value="0">
                                  <div class="panel panel-default">
                                    <div class="panel-body">


                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                            <label>Nombre del Almacen</label>
                                               <div class="input-group">
                                                 <span class="input-group-btn">
                                                  <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-bookmark"></span>
                                                  </button>
                                                </span>
                                                <input class="form-control vld" type="text" id="txtnombrealmacen" name="txtnombrealmacen" required>
                                               
                                              </div>
                                          </div> 
                                         </div> 
                                      </div> 



                                
                                        <div class="row" id="estado_almacen" style="display: none;">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="switches-stacked">
                                              <label>Activo</label>
                                              <label class="switch switch-primary">  
                                                <input type="checkbox" id="chkestadoalmacen" name="chkestadoalmacen" class="s-input">
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
                                          <button type="submit" class="btn btn-outline-primary" id="agregaralmacen"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> Guardar</span></button>
                                          <button type="submit" class="btn btn-outline-primary" id="updatealmacen" style="display: none;"><i class="zmdi zmdi-refresh zmdi-hc-fw m-r-5"></i><span> Actualizar</span></button>
                                          <a class="btn btn-outline-danger" data-dismiss="modal" id="cancelalmacen" onclick="cancelAlmacen();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></a>
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
                            <h4 class="text-center text-primary font-12"><strong>LISTA DE AlMACENES</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="table-responsive">
                              <div id="tbl_documento" class="dataTables_wrapper form-inline" role="grid">
                                <table id="tablealmacen" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                  <thead class="text-center font-table">
                                    <tr class="bg-primary">
                                      <th class="text-center" width="10%">N</th>
                                      <th class="text-center" width="20%">Descripcion</th>
                                      <th class="text-center" width="10%">Estado</th>
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




                  <div role="tabpanel" class="tab-pane fade" id="tab-proceso"> 
                    <div class="row">
                      <div class="col-md-5 col-sm-5">
                        <div class="panel panel-default panel-table m-b-0">
                          <div class="panel-heading">
                            <h4 class="text-center text-primary font-14" id="titleproceso"><strong>Crear Proceso</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <!-- <div class="col-lg-1"></div> -->
                              <div class="col-lg-12">
                                <form class="form" id="form_proceso" method="POST" autocomplete="off" action="javascript:void(0);">
                                  <input class="form-control" type="hidden" id="txtIdProceso" name="txtIdProceso">
                                  <input class="form-control" type="hidden" id="txtcontrolProceso" name="txtcontrolProceso" value="0">
                                  <div class="panel panel-default">
                                    <div class="panel-body">


                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                            <label>Nombre Proceso</label>
                                               <div class="input-group">
                                                 <span class="input-group-btn">
                                                  <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-bookmark"></span>
                                                  </button>
                                                </span>
                                                <input class="form-control vld" type="text" id="txtnombreproceso" name="txtnombreproceso" required>
                                               
                                              </div>
                                          </div> 
                                         </div> 
                                      </div> 



                                    <div class="row">
                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                          <label>Fecha de Inicio:</label>
                                          <div class="input-group-prepend">
                                              <input class="form-control claseInput" type="date" id="txtfechainicio" name="txtfechainicio">
                                          </div>
                                        </div>
                                      </div>
                                    </div>  

                                    <div class="row">
                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                          <label>Fecha de Fin:</label>
                                          <div class="input-group-prepend">
                                              <input class="form-control claseInput" type="date" id="txtfechafin" name="txtfechafin">
                                          </div>
                                        </div>
                                      </div>
                                    </div>  
                                    
                                        <div class="row" id="estado_proceso" style="display: none;">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="switches-stacked">
                                              <label>Activo</label>
                                              <label class="switch switch-primary">  
                                                <input type="checkbox" id="chkestadoproceso" name="chkestadoproceso" class="s-input">
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
                                          <button type="submit" class="btn btn-outline-primary" id="agregarproceso"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> Guardar</span></button>
                                          <button type="submit" class="btn btn-outline-primary" id="updateproceso" style="display: none;"><i class="zmdi zmdi-refresh zmdi-hc-fw m-r-5"></i><span> Actualizar</span></button>
                                          <a class="btn btn-outline-danger" data-dismiss="modal" id="cancelproceso" onclick="cancelProveedor();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></a>
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
                            <h4 class="text-center text-primary font-12"><strong>LISTA DE PROCESOS</strong></h4>
                          </div>
                          <div class="panel-body">
                            <div class="table-responsive">
                              <div id="tbl_personal" class="dataTables_wrapper form-inline" role="grid">
                                <table id="tableproceso" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                  <thead class="text-center font-table">
                                    <tr class="bg-primary">
                                      <th class="text-center" width="10%">N</th>
                                      <th class="text-center" width="45%">Nombre</th>
                                      <th class="text-center" width="10%">Fecha de Inicio</th>
                                      <th class="text-center" width="10%">Fecha de Fin</th>
                                      <th class="text-center" width="5%">Estado</th>
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
        2022 © Sistema Kardex
      </div>
    </div>
    
    <!-- FOOTER -->
    <?php footerAdmin($data); ?>
  </body>

<!-- Mirrored from big-bang-studio.com/cosmos/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:53:30 GMT -->
</html>