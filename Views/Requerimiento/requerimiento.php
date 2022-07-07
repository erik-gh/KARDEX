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
                    <a href="#tab-requerimiento" role="tab" data-toggle="tab" aria-expanded="true">
                      <i class="zmdi zmdi-accounts-list-alt"></i>REQUERIMIENTO</a>
                  </li>
                  <li class="">
                   <a href="#tab-formatorequerimiento" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-view-module"></i>FORMATO REQUERIMIENTO</a>
                  </li>
                  
                </ul>

                <div class="tab-content">
                <div role="tabpanel" class="tab-pane active in fade" id="tab-requerimiento">
                    <div class="container-fluid">
                      <div class="panel panel-primary" id="panelboton">
                        <div class="panel-heading">
                          <h5 class="text-black m-b-18"><strong>REQUERIMIENTOS</strong></h5> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              <div class="col-md-12 col-sm-12">

                                 <div class="row">                                            

                                     <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <div class="pull-left">
                                              <button type="button" class="btn btn-outline-success" id="btnagregarrequerimiento" onclick="VisualizarPanel(),llamarusuario();"><i class="glyphicon glyphicon-plus"></i><span> AGREGAR REQUERIMIENTO</span></button>
                                            </div>                                        
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
                                <h4 class="text-center text-danger font-18"><strong>TOTAL DE REQUERIMIENTOS</strong></h4>
                              </div>
                              <div class="panel-body">
                                <div class="table-responsive">
                                  <div id="tbl_totalingresos" class="dataTables_wrapper form-inline" role="grid">
                                    <table id="tableTotalIngresos" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                      <thead class="text-center font-table">
                                        <tr class="bg-primary">
                                          <th class="text-center" width="5%">Nº</th>
                                          <th class="text-center" width="25%">CENTRO DE CONSUMO</th>
                                          <th class="text-center" width="25%">SOLICITANTE</th>
                                          <th class="text-center" width="10%">FECHA</th>
                                          <th class="text-center" width="10%">PRIORIDAD</th>
                                          <th class="text-center" width="10%">ESTADO</th>
                                          <th class="text-center" width="15%">&nbsp;&nbsp;ACCI&Oacute;N&nbsp;&nbsp;</th>
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

                            <div class="panel panel-default  panel-table m-b-0 " id="panelrequerimiento">
                                <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                          <div class="panel panel-primary panel-table m-b-0">
                                            <div class="panel-heading">
                                              <h5 class="text-black m-b-18"><strong>DATOS DEL SOLICITANTE</strong></h5>
                                            </div>
                                            <div class="panel-body">
                                              <div class="row">
                                                <!-- <div class="col-lg-1"></div> -->
                                                <div class="col-lg-12">
                                                  <form class="form" id="form_requerimiento" method="POST" autocomplete="off" action="javascript:void(0);">
                                                    <input class="form-control" type="hidden" id="txtIdrequerimiento" name="txtIdrequerimiento">
                                                    <input class="form-control" type="hidden" id="txtIdCentroconsumo" name="txtIdCentroconsumo">
                                                    <input class="form-control" type="hidden" id="txtcontrolrequerimiento" name="txtcontrolrequerimiento" value="0">
                                                    <div class="panel panel-default">
                                                      <div class="panel-body">
                                                        <!--https://getbootstrap.com/docs/3.3/components/-->
                                                      
                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Proceso</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-home"></span>
                                                                    </button>
                                                                  </span>
                                                                   <select class="form-control claseSelect" name="cboproceso" id="cboproceso" data-live-search="true" data-size="5" required>
                                                                      </select>
                                                                 
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
                                                                  <input class="form-control" disabled="false" type="text" id="txtcentroconsumo" name="txtcentroconsumo" required>                                                               
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div> 

                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Solicitante</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-user"></span>
                                                                    </button>
                                                                  </span>

                                                                 <input class="form-control" disabled="false" type="text" id="txtsolicitante" name="txtsolicitante" required>
                                                                 
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div> 

                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Fase:</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-home"></span>
                                                                    </button>
                                                                  </span>
                                                                   <select class="form-control claseSelect" name="cbofase" id="cbofase" data-live-search="true" data-size="5" required>
                                                                      </select>
                                                                 
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div>     

                                                        <div class="row">
                                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                              <div class="form-group">
                                                                <label>Prioridad</label>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                                                                                               
                                                                        <select class="form-control" name="cboprioridad" id="cboprioridad" data-live-search="true" data-size="5" required>
                                                                          <option value="0">BAJA</option> 
                                                                          <option value="1">MEDIA</option>
                                                                          <option value="2">ALTA</option>
                                                                        </select>                                                           
                                                                                                                                              
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        
                                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                              <div class="form-group">
                                                                <label>Turno</label>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                                                                                               
                                                                        <select class="form-control" name="cboturno" id="cboturno" data-live-search="true" data-size="5" required>
                                                                          <option value="1">MAÑANA</option> 
                                                                          <option value="2">TARDE</option>
                                                                          <option value="3">NOCHE</option>
                                                                        </select>                                                           
                                                                                                                                              
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            </div>

                                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                              <div class="form-group">
                                                                <label>Cantidad</label>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                                                                                               
                                                                        <div class="input-group-prepend">
                                                                          <input class="form-control vld claseInput" type="text" id="txtcantidad" name="txtcantidad" required>
                                                                         </div>                                                         
                                                                                                                                              
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>  

                                                        <div class="row">
                                                          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                              <label>Nro.de Orden:</label>
                                                             <div class="input-group-prepend">
                                                                <input class="form-control vld claseInput" type="text" id="txtorden" name="txtorden" required>
                                                            </div>
                                                            </div>
                                                          </div>

                                                          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                              <label>Fecha de Actividad:</label>
                                                              <div class="input-group-prepend">
                                                                  <input class="form-control claseInput" type="date" id="txtfechaactividad" name="txtfechaactividad">
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>

                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                              <label>Actividad:</label>
                                                             <div class="input-group-prepend">
                                                                <input class="form-control vld claseInput" type="text" id="txtactividad" name="txtactividad" required>
                                                            </div>
                                                            </div>
                                                          </div>
                                                        </div>

                                                  
                                                       <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                                <label>Analista de Linea:</label>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                      <div class="input-group">
                                                                        <button type="button" class="btn btn-default" aria-label="right pull-left">
                                                                          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                                                        </button>                                                            
                                                                        <select class="form-control claseSelect" name="cboanalistalinea" id="cboanalistalinea" data-live-search="true" data-size="5" required>
                                                                        </select>
                                                                        <button onclick="Visualizarmodalanalistalinea();" type="button" class="btn btn-success" aria-label="right pull-left">
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
                                                                <label>Analista de Turno:</label>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                      <div class="input-group">
                                                                        <button type="button" class="btn btn-default" aria-label="right pull-left">
                                                                          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                                                        </button>                                                            
                                                                        <select class="form-control claseSelect" name="cboanalistaturno" id="cboanalistaturno" data-live-search="true" data-size="5" required>
                                                                        </select>
                                                                        <button onclick="Visualizarmodalanalistaturno();" type="button" class="btn btn-success" aria-label="right pull-left">
                                                                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                                          </button> 
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
                               
                                      <div class="col-md-8 col-sm-8">
                                        <div class="panel panel-default panel-table m-b-0">
                                            <div class="panel-heading">
                                              <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                  <h5 class="text-success m-b-18 " ><strong>MATERIALES A SOLICITAR</strong></h5>
                                                </div>  
                                                <div class="col-md-6 col-sm-6">
                                                        <div class="pull-right">
                                                            <button type="submit" onclick="VisualizarModalProducto();" class="btn btn-success" id="btnbuscarproductos"><i class="zmdi zmdi-search zmdi-hc-fw m-r-5"></i><span> Agregar Productos</span></button>
                                                         </div>                                                      
                                                </div>  
                                              </div>
                                            </div>
                                         
                                        <div class="row">
                                          <div class="panel-body" style="height: 650px; overflow-y: auto; overflow-x: hidden">
                                            <div class="table-responsive">
                                              <div id="tbl_detalleingreso" class="dataTables_wrapper form-inline" role="grid">
                                                <table id="tableDetalleRequerimiento" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                  <thead class="text-center font-table">
                                                    <tr class="bg-primary">
                                                      <th class="text-center" width="10%">COD</th>
                                                      <th class="text-center" width="40%">PRODUCTO</th>
                                                      <th class="text-center" width="10%">UMA</th>                                       
                                                      <th class="text-center" width="10%">EXISTENCIA</th>
                                                      <th class="text-center" width="10%">CANTIDAD</th>
                                                      <th class="text-center" width="10%">ACCI&Oacute;N</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody class="text-center font-table" id="tablarequesolicitud">
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
                                                                <button type="button" onclick="enviarRequerimiento();" class="btn btn-success"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span>Guardar </span></button>
                                                             </div>                                                      
                                                    </div> 
                                              </div> <br>      
                                              <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                            <div class="pull-left">
                                                                <button type="button" onclick="cancelRequerimiento();" class="btn btn-danger" id="btncancelar"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></button>
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

                            <div class="panel panel-default  panel-table m-b-0 " id="paneldetallerequerimientoid">
                                <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                          <div class="panel-heading">
                                              <h5 class="text-danger m-b-18"><strong>DETALLE DEL REQUERIMIENTO</strong></h5>
                                          </div>
                                          <div class="panel-body">
                                            <div class="table-responsive">
                                              <div id="tbl_detalleingresosid" class="dataTables_wrapper form-inline" role="grid">
                                                <table id="tabledetallerequerimientoid" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                  <thead class="text-center font-table">
                                                    <tr class="bg-primary">
                                                      <th class="text-center" width="5%">Nº</th>
                                                      <th class="text-center" width="15%">FECHA</th>
                                                      <th class="text-center" width="10%">COD</th>
                                                      <th class="text-center" width="45%">PRODUCTO</th>
                                                      <th class="text-center" width="15%">CANTIDAD</th>
                                                     
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
                                          
                </div>

                <div role="tabpanel" class="tab-pane" id="tab-formatorequerimiento">
                    <div class="container-fluid">
                      <div class="panel panel-primary" id="panelbotonformato">
                        <div class="panel-heading">
                          <h5 class="text-black m-b-18"><strong>FORMATOS DE IMPRESION</strong></h5> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              <div class="col-md-12 col-sm-12">

                                 <div class="row">                                            

                                     <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <div class="pull-left">
                                              <button type="button" class="btn btn-outline-success" id="btnagregarrequerimiento" onclick="VisualizarPanelformato(),llamarusuario();"><i class="glyphicon glyphicon-plus"></i><span>     ELABORAR FORMATO</span></button>
                                            </div>                                        
                                     </div>  
           
                                  </div>

                              </div> 

                            </div>
                        </div>
                      </div>

                        <div class="row">                        
                          <div class="col-md-12 col-sm-12">

                            <div class="panel panel-default  panel-table m-b-0 " id="paneldetallerequerimientoformato">
                              <div class="panel-heading ">
                                <h4 class="text-center text-danger font-18"><strong>DETALLES DE FORMATOS</strong></h4>
                              </div>
                              <div class="panel-body">
                                <div class="table-responsive">
                                  <div id="tbl_totalformato" class="dataTables_wrapper form-inline" role="grid">
                                    <table id="tableTotalFormatos" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                      <thead class="text-center font-table">
                                        <tr class="bg-primary">
                                          <th class="text-center" width="5%">Nº</th>
                                          <th class="text-center" width="25%">CENTRO DE CONSUMOs</th>
                                          <th class="text-center" width="25%">SOLICITANTE</th>
                                          <th class="text-center" width="10%">FECHA</th>
                                          <th class="text-center" width="10%">PRIORIDAD</th>
                                          <th class="text-center" width="10%">ESTADO</th>
                                          <th class="text-center" width="15%">&nbsp;&nbsp;ACCI&Oacute;N&nbsp;&nbsp;</th>
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

                            <div class="panel panel-default  panel-table m-b-0 " id="panelrequerimientoformato">
                                <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                          <div class="panel panel-success panel-table m-b-0">
                                            <div class="panel-heading">
                                              <h5 class="text-black m-b-18"><strong>DATOS DEL FORMATO</strong></h5>
                                            </div>
                                            <div class="panel-body">
                                              <div class="row">
                                                <!-- <div class="col-lg-1"></div> -->
                                                <div class="col-lg-12">
                                                  <form class="form" id="form_requerimientoformato" method="POST" autocomplete="off" action="javascript:void(0);">
                                                    <input class="form-control" type="hidden" id="txtIdrequerimientoformato" name="txtIdrequerimientoformato">
                                                    <input class="form-control" type="hidden" id="txtIdCentroconsumoformato" name="txtIdCentroconsumoformato">
                                                    <input class="form-control" type="hidden" id="txtcontrolrequerimientoformato" name="txtcontrolrequerimientoformato" value="0">
                                                    <div class="panel panel-default">
                                                      <div class="panel-body">
                                                        <!--https://getbootstrap.com/docs/3.3/components/-->
                                                      
                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Proceso</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-home"></span>
                                                                    </button>
                                                                  </span>
                                                                   <select class="form-control claseSelect" name="cboprocesoformato" id="cboprocesoformato" data-live-search="true" data-size="5" required>
                                                                      </select>
                                                                 
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
                                                                  <input class="form-control" disabled="false" type="text" id="txtcentroconsumoformato" name="txtcentroconsumoformato" required>                                                               
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div> 

                                                         <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Solicitante</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-user"></span>
                                                                    </button>
                                                                  </span>

                                                                 <input class="form-control" disabled="false" type="text" id="txtsolicitanteformato" name="txtsolicitanteformato" required>
                                                                
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div> 

                                                         <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Fase:</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-home"></span>
                                                                    </button>
                                                                  </span>
                                                                   <select class="form-control claseSelect" name="cbofaseformato" id="cbofaseformato" data-live-search="true" data-size="5" required>
                                                                      </select>
                                                                 
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div>     

                                                        <div class="row">
                                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                              <div class="form-group">
                                                                <label>Prioridad</label>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                                                                                               
                                                                        <select class="form-control" name="cboprioridadformato" id="cboprioridadformato" data-live-search="true" data-size="5" required>
                                                                          <option value="0">BAJA</option> 
                                                                          <option value="1">MEDIA</option>
                                                                          <option value="2">ALTA</option>
                                                                        </select>                                                           
                                                                                                                                              
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        
                                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                              <div class="form-group">
                                                                <label>Turno</label>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                                                                                               
                                                                        <select class="form-control" name="cboturnoformato" id="cboturnoformato" data-live-search="true" data-size="5" required>
                                                                          <option value="1">MAÑANA</option> 
                                                                          <option value="2">TARDE</option>
                                                                          <option value="3">NOCHE</option>
                                                                        </select>                                                           
                                                                                                                                              
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            </div>

                                                             <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                              <div class="form-group">
                                                                <label>Cantidad</label>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                                                                                               
                                                                        <div class="input-group-prepend">
                                                                          <input class="form-control vld claseInput" type="number" id="txtcantidadformato" name="txtcantidadformato" required>
                                                                         </div>                                                         
                                                                                                                                              
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>  

                                                        <div class="row">
                                                          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                              <label>Nro.de Orden:</label>
                                                             <div class="input-group-prepend">
                                                                <input class="form-control vld claseInput" type="text" id="txtordenformato" name="txtordenformato" required>
                                                            </div>
                                                            </div>
                                                          </div>

                                                          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                              <label>Fecha de Actividad:</label>
                                                              <div class="input-group-prepend">
                                                                  <input class="form-control claseInput" type="date" id="txtfechaactividadformato" name="txtfechaactividadformato">
                                                              </div>
                                                            </div>
                                                          </div>


                                                        </div>

                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                              <label>Actividad:</label>
                                                             <div class="input-group-prepend">
                                                                <input class="form-control vld claseInput" type="text" id="txtactividadformato" name="txtactividadformato" required>
                                                            </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                         

                                                         <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Analista de Linea:</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-home"></span>
                                                                    </button>
                                                                  </span>
                                                                   <select class="form-control claseSelect" name="cboanalistalineaformato" id="cboanalistalineaformato" data-live-search="true" data-size="5" required>
                                                                      </select>
                                                                 
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div>  

                                                         <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Analista de Turno:</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-home"></span>
                                                                    </button>
                                                                  </span>
                                                                   <select class="form-control claseSelect" name="cboanalistaturnoformato" id="cboanalistaturnoformato" data-live-search="true" data-size="5" required>
                                                                      </select>
                                                                 
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
                                                  <h5 class="text-success m-b-18 " ><strong>MATERIALES A DETALLAR EN FORMATO</strong></h5>
                                                </div>  
                                                <div class="col-md-6 col-sm-6">
                                                        <div class="pull-right">
                                                            <button type="submit" onclick="VisualizarModalProductoformato();" class="btn btn-success" id="btnbuscarproductos"><i class="zmdi zmdi-search zmdi-hc-fw m-r-5"></i><span> Agregar Productos a Formato</span></button>
                                                         </div>                                                      
                                                </div>  
                                              </div>
                                            </div>
                                         
                                          <div class="row">
                                            <div class="panel-body" style="height: 650px; overflow-y: auto; overflow-x: hidden">
                                              <div class="table-responsive">
                                                <div id="tbl_detalleingresoformato" class="dataTables_wrapper form-inline" role="grid">
                                                  <table id="tableDetalleRequerimientoformato" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                    <thead class="text-center font-table">
                                                      <tr class="bg-primary">
                                                        <th class="text-center" width="40%">PRODUCTO</th>
                                                        <th class="text-center" width="10%">UMA</th>
                                                        <th class="text-center" width="10%">CANTIDAD</th>
                                                        <th class="text-center" width="10%">ACCI&Oacute;N</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody class="text-center font-table" id="tablarequesolicitudformato">
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
                                                    <textarea class="form-control claseInput" id="txtobservacionesformato" rows="3"></textarea>   
                                                </div> 
                                            </div> 
                                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> 
                                              <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                            <div class="pull-left">
                                                                <button type="button" onclick="enviarFormato();" class="btn btn-success"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span>Guardar </span></button>
                                                             </div>                                                      
                                                    </div> 
                                              </div> <br>      
                                              <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                            <div class="pull-left">
                                                                <button type="button" onclick="cancelformato();" class="btn btn-danger" id="btncancelar"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></button>
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

                            <div class="panel panel-default  panel-table m-b-0 " id="paneldetallerequerimientoidformato">
                                <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                          <div class="panel-heading">
                                              <h5 class="text-danger m-b-18"><strong>DETALLE DEL FORMATO</strong></h5>
                                            </div>
                                          <div class="panel-body">
                                            <div class="table-responsive">
                                              <div id="tbl_detalleingresosid" class="dataTables_wrapper form-inline" role="grid">
                                                <table id="tabledetalleformatoid" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                  <thead class="text-center font-table">
                                                    <tr class="bg-primary">
                                                      <th class="text-center" width="5%">Nº</th>
                                                      <th class="text-center" width="15%">FECHA</th>
                                                      <th class="text-center" width="30%">PRODUCTO</th>
                                                      <th class="text-center" width="15%">CANTIDAD</th>
                                                      <th class="text-center" width="20%">SOLICITANTE</th>
                                                      <th class="text-center" width="10%">ESTADO</th>
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
                <h4 id="titleModule" class="modal-title text-center text-primary font-16"><b>LISTADO DE PRODUCTOS -REQUERIMIENTOS</b></h4>
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
                                          <th class="text-center" width="50%">PRODUCTO</th>
                                          <th class="text-center" width="10%">UMA</th>
                                          <th class="text-center" width="10%">TIPO</th>
                                          <th class="text-center" width="10%">EXISTENCIA</th>
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



            <!-- Modal LISTA DE PRODUCTOS FORMATOS -->
       
        <div class="modal fade bd-example-modal-lg" id="modal_buscarproductoformato" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">  
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">
                    <i class="zmdi zmdi-close"></i>
                  </span>
                </button> 
                <h4 id="titleModule" class="modal-title text-center text-primary font-16"><b>LISTADO DE PRODUCTOS PARA FORMATO</b></h4>
              </div>
              <div class="modal-body">
               <div class="row">
                <div class="col-md-12 col-sm-12  col-lg-12">
                       <div class="panel-body">
                                <div class="table-responsive">
                                  <div id="tbl_buscarproductoformato" class="dataTables_wrapper form-inline" role="grid">
                                    <table id="tablebuscarproductoformato" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                      <thead class="text-center font-table">
                                        <tr class="bg-primary">
                                          <th class="text-center" width="5%">Nº</th>
                                          <th class="text-center" width="15%">COD</th>
                                          <th class="text-center" width="50%">PRODUCTO</th>
                                          <th class="text-center" width="10%">UMA</th>
                                          <th class="text-center" width="10%">TIPO</th>
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
        <!-- #END# MODAL LISTA DE PRODUCTOS  FORMATOS-->


        <!--INICIO MODAL CREAR ANALISTA DE LINEA-->
        <div class="modal fade bd-example-modal-lg" id="modal_crearanalistadelinea" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">  
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
                            <h4 class="text-center text-primary font-14" id="titleanalista"><strong>Crear Analista de Linea</strong></h4>
                          </div>
                        <div class="panel-body">
                         <div class="row">
                              <!-- <div class="col-lg-1"></div> -->
                              <div class="col-lg-12">
                                <form class="form" id="form_crearanalista" method="POST" autocomplete="off" action="javascript:void(0);">
                                  <input class="form-control" type="hidden" id="txtidpersonal" name="txtidpersonal">
                                  <input class="form-control" type="hidden" id="txtcontrolpersonal" name="txtcontrolpersonal" value="0">
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
                                                                      
                           
                                      <div class="clearfix m-t-30">
                                        <div class="pull-right">
                                          <button type="submit" class="btn btn-outline-primary" id="agregarpersonal"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> Guardar</span></button>
                                          <button type="submit" class="btn btn-outline-primary" id="updatepersonal" style="display: none;"></button>
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
                <div class="col-lg-1"></div>
              </div>
              <div class="modal-footer"></div>
            </div>
          </div>
        </div>
      </div>
        <!--FIN  MODAL CREAR ANALISTA DE LINEA-->


            <!--INICIO MODAL CREAR ANALISTA DE TURNO-->
        <div class="modal fade bd-example-modal-lg" id="modal_crearanalistadeturno" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">  
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
                            <h4 class="text-center text-primary font-14" id="titleanalistaturno"><strong>Crear Analista de Turno</strong></h4>
                          </div>
                          <div class="panel-body">
                         <div class="row">
                              <!-- <div class="col-lg-1"></div> -->
                              <div class="col-lg-12">
                                <form class="form" id="form_crearanalistaturno" method="POST" autocomplete="off" action="javascript:void(0);">
                                  <input class="form-control" type="hidden" id="txtidpersonalt" name="txtidpersonalt">
                                  <input class="form-control" type="hidden" id="txtcontrolpersonalt" name="txtcontrolpersonalt" value="0">
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
                                                <input class="form-control vld" type="text" id="txtdnit" name="txtdnit" minlength="8" maxlength="8" onkeypress="SoloNum()" required>
                                               
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
                                                <input class="form-control vld" type="text" id="txtnombret" name="txtnombret" required>
                                               
                                              </div>
                                          </div> 
                                         </div> 
                                      </div> 


                                      <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label>Centro de Consumo </label>
                                            <select class="form-control" name="cboconsumot" id="cboconsumot" data-live-search="true" data-size="5" required>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                                                      
                           
                                      <div class="clearfix m-t-30">
                                        <div class="pull-right">
                                          <button type="submit" class="btn btn-outline-primary" id="agregarpersonalt"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> Guardar</span></button>
                                          <button type="submit" class="btn btn-outline-primary" id="updatepersonalt" style="display: none;"></button>
                                          <a class="btn btn-outline-danger" data-dismiss="modal" id="cancelpersonalt" onclick="cancelPersonalturno();"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></a>
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
        <!--FIN  MODAL CREAR ANALISTA DE TURNO-->


       

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