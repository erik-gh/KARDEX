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
                      <i class="zmdi zmdi-accounts-list-alt"></i>CONTROL DE REQUERIMIENTOS</a>
                  </li>
                  <li class="">
                    <a href="#tab-ConfirReq" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-view-module"></i>CONFIRMAR DESPACHO</a> 
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
                                      <div class="col-md-12 col-sm-12">

                                          <div class="panel panel-default  panel-table m-b-0 " id="paneldetallerequerimiento">
                                            <div class="panel-heading ">
                                              <h4 class="text-center text-danger font-18"><strong>TOTAL DE REQUERIMIENTOS</strong></h4>
                                            </div>
                                            <div class="panel-body">
                                              <div class="table-responsive">
                                                <div id="tbl_totalingresos" class="dataTables_wrapper form-inline" role="grid">
                                                  <table id="tableTotalRequerimientos" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                    <thead class="text-center font-table">
                                                      <tr class="bg-primary">
                                                        <th class="text-center" width="5%">Nº</th>
                                                        <th class="text-center" width="8%">CENTRO DE CONSUMO</th>
                                                        <th class="text-center" width="8%">N°Orden</th>
                                                        <th class="text-center" width="9%">CREADO</th>
                                                        <th class="text-center" width="8%">PROCESADO</th>
                                                        <th class="text-center" width="8%">DESPACHADO</th>
                                                        <th class="text-center" width="6%">PRIORIDAD</th>
                                                        <th class="text-center" width="10%">ESTADO</th>
                                                        <th class="text-center" width="20%">&nbsp;&nbsp;ACCI&Oacute;N&nbsp;&nbsp;</th>
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

                       


                       



                        <div class="row">
                        
                          <div class="col-md-8 col-sm-8">
                              <div class="row">
                                <div class="panel panel-primary  panel-table m-b-0 " id="paneldetallerequerimientoid">
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
                                                          <th class="text-center" width="34%">PRODUCTO</th>
                                                          <th class="text-center" width="8%">CANTIDAD</th>
                                                          <th class="text-center" width="8%">SA</th>
                                                          <th class="text-center" width="8%">A</th>
                                                          <th class="text-center" width="8%">SB</th>
                                                          <th class="text-center" width="8%">B</th>
                                                          <th class="text-center" width="8%">SC</th>
                                                          <th class="text-center" width="8%">C</th>
                                                          
                                                         
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

                                <div class="panel panel-primary  panel-table m-b-0 " id="paneldetallerequerimientoidaprobado">
                                    <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                              <div class="panel-heading">
                                                  <h5 class="text-danger m-b-18"><strong>DETALLE DEL REQUERIMIENTO APROBADO</strong></h5>
                                                </div>
                                              <div class="panel-body">
                                                <div class="table-responsive">
                                                  <div id="tbl_detalleingresosidaprobado" class="dataTables_wrapper form-inline" role="grid">
                                                    <table id="tabledetallerequerimientoidaprobado" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                      <thead class="text-center font-table">
                                                        <tr class="bg-primary">
                                                          <th class="text-center" width="5%">Nº</th>
                                                          <th class="text-center" width="10%">COD</th>
                                                          <th class="text-center" width="34%">PRODUCTO</th>
                                                          <th class="text-center" width="8%">CANTIDAD</th>
                                                          <th class="text-center" width="8%">A</th>
                                                          <th class="text-center" width="8%">B</th>
                                                          <th class="text-center" width="8%">C</th>
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

                              </div>
                          </div>


                          <div class="col-md-4 col-sm-4">

                             <div class="panel panel-primary panel-table m-b-0" id="panelsolicitante">
                                            <div class="panel-heading">
                                              <h5 class="text-black m-b-18"><strong>DATOS DEL SOLICITANTE</strong></h5>
                                            </div>
                                            <div class="panel-body">
                                              <div class="row">
                                                <!-- <div class="col-lg-1"></div> -->
                                                <div class="col-lg-12">
                                                  <form class="form" id="form_requerimiento" method="POST" autocomplete="off" action="javascript:void(0);">
                                                    <input class="form-control" type="hidden" id="txtIdrequerimiento" name="txtIdrequerimiento">
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
                                                                   <input class="form-control" disabled="false" type="text" id="txtproceso" name="txtproceso" required>
                                                                 
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
                                                              <label>N.de Orden</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-home"></span>
                                                                    </button>
                                                                  </span>
                                                                  <input class="form-control" disabled="false" type="text" id="norden" name="norden" required>                                                               
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
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-home"></span>
                                                                    </button>
                                                                  </span>
                                                                  <input class="form-control" disabled="false" type="text" id="alinea" name="alinea" required>                                                               
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div> 

                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Fase</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-home"></span>
                                                                    </button>
                                                                  </span>
                                                                  <input class="form-control" disabled="false" type="text" id="fase" name="fase" required>                                                               
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div> 

                                                         <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Usuario Crea</label>
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
                                                              <label>Observaciones</label>
                                                                
                                                                  <textarea class="form-control claseInput" disabled="false" id="txtobservaciones" rows="3"></textarea>
                                                                 
                                                                
                                                            </div> 
                                                           </div> 
                                                        </div>

                                                           <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Actividad</label>
                                                                
                                                                  <textarea class="form-control claseInput" disabled="false" id="txtactividad" rows="3"></textarea>
                                                                 
                                                                
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
                                                                                <button type="button" id="btnrequerimiento" onclick="InsertarDetalleRequerimiento();" class="btn btn-success"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span>Atender Requerimiento</span></button>
                                                                             </div>                                                      
                                                                    </div>  

                                                                  <div class="col-md-4 col-sm-4">
                                                                          <div class="pull-left">
                                                                              <button type="button" onclick="cancelcRequerimiento();" class="btn btn-danger" id="btncancelar"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></button>
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


                <div role="tabpanel" class="tab-pane fade " id="tab-ConfirReq">
                    <div class="container-fluid">
                      <div class="panel panel-primary" id="panelboton">
                        <div class="panel-heading">
                          <h5 class="text-black m-b-18"><strong>CONFIRMAR DESPACHO</strong></h5> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              <div class="col-md-12 col-sm-12">

                                 <div class="row">  
                                      <div class="col-md-12 col-sm-12">

                                          <div class="panel panel-default  panel-table m-b-0 " id="paneldetallerequerimientoconfirmar">
                                            <div class="panel-heading ">
                                              <h4 class="text-center text-danger font-18"><strong>TOTAL DE REQUERIMIENTOS - DESPACHAR</strong></h4>
                                            </div>
                                            <div class="panel-body">
                                              <div class="table-responsive">
                                                <div id="tbl_totalreque" class="dataTables_wrapper form-inline" role="grid">
                                                  <table id="tableTotalRequerimientosconfirmar" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                    <thead class="text-center font-table">
                                                      <tr class="bg-primary">
                                                        <th class="text-center" width="5%">Nº</th>
                                                        <th class="text-center" width="10%">CENTRO DE CONSUMO</th>
                                                        <th class="text-center" width="10%">CREADO</th>
                                                        <th class="text-center" width="10%">PROCESADO</th>
                                                        <th class="text-center" width="10%">DESPACHADO</th>
                                                        <th class="text-center" width="10%">PRIORIDAD</th>
                                                        <th class="text-center" width="10%">ESTADO</th>
                                                        <th class="text-center" width="20%">&nbsp;&nbsp;ACCI&Oacute;N&nbsp;&nbsp;</th>
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

                       


                       



                        <div class="row">
                        
                          <div class="col-md-8 col-sm-8">
                              <div class="row">
                                <div class="panel panel-primary  panel-table m-b-0 " id="paneldetallerequerimientoidconfirmar">
                                    <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                              <div class="panel-heading">
                                                  <h5 class="text-danger m-b-18"><strong>DETALLE DEL REQUERIMIENTO</strong></h5>
                                                </div>
                                              <div class="panel-body">
                                                <div class="table-responsive">
                                                  <div id="tbl_detalleingresosid" class="dataTables_wrapper form-inline" role="grid">
                                                    <table id="tabledetallerequerimientoidconfirmar" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                      <thead class="text-center font-table">
                                                        <tr class="bg-primary">
                                                          <th class="text-center" width="5%">Nº</th>
                                                          <th class="text-center" width="34%">PRODUCTO</th>
                                                          <th class="text-center" width="8%">CANTIDAD</th>
                                                          <th class="text-center" width="8%">SA</th>
                                                          <th class="text-center" width="8%">A</th>
                                                          <th class="text-center" width="8%">SB</th>
                                                          <th class="text-center" width="8%">B</th>
                                                          <th class="text-center" width="8%">SC</th>
                                                          <th class="text-center" width="8%">C</th>
                                                          
                                                         
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

                                <div class="panel panel-primary  panel-table m-b-0 " id="paneldetallerequerimientoidaprobadoconfirmar">
                                    <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                              <div class="panel-heading">
                                                  <h5 class="text-danger m-b-18"><strong>DETALLE DEL REQUERIMIENTO APROBADO</strong></h5>
                                                </div>
                                              <div class="panel-body">
                                                <div class="table-responsive">
                                                  <div id="tbl_detalleingresosidaprobado" class="dataTables_wrapper form-inline" role="grid">
                                                    <table id="tabledetallerequerimientoidaprobadoconfirmar" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                      <thead class="text-center font-table">
                                                        <tr class="bg-primary">
                                                          <th class="text-center" width="5%">Nº</th>
                                                          <th class="text-center" width="34%">PRODUCTO</th>
                                                          <th class="text-center" width="8%">CANTIDAD</th>
                                                          <th class="text-center" width="8%">A</th>
                                                          <th class="text-center" width="8%">B</th>
                                                          <th class="text-center" width="8%">C</th>
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

                              </div>
                          </div>


                          <div class="col-md-4 col-sm-4">

                             <div class="panel panel-primary panel-table m-b-0" id="panelsolicitanteconfirmar">
                                            <div class="panel-heading">
                                              <h5 class="text-black m-b-18"><strong>DATOS DEL SOLICITANTE</strong></h5>
                                            </div>
                                            <div class="panel-body">
                                              <div class="row">
                                                <!-- <div class="col-lg-1"></div> -->
                                                <div class="col-lg-12">
                                                  <form class="form" id="form_requerimiento" method="POST" autocomplete="off" action="javascript:void(0);">
                                                    <input class="form-control" type="hidden" id="txtIdrequerimiento2" name="txtIdrequerimiento2">
                                                    <input class="form-control" type="hidden" id="txtcontrolrequerimiento2" name="txtcontrolrequerimiento2" value="0">
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
                                                                   <input class="form-control" disabled="false" type="text" id="txtproceso2" name="txtproceso2" required>
                                                                 
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
                                                                  <input class="form-control" disabled="false" type="text" id="txtcentroconsumo2" name="txtcentroconsumo2" required>                                                               
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div> 


                                                        <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>N.de Orden</label>
                                                                 <div class="input-group">
                                                                   <span class="input-group-btn">
                                                                    <button  class="btn btn-default" type="button"> <span class="glyphicon glyphicon-home"></span>
                                                                    </button>
                                                                  </span>
                                                                  <input class="form-control" disabled="false" type="text" id="norden2" name="norden2" required>                                                               
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

                                                                 <input class="form-control" disabled="false" type="text" id="txtsolicitante2" name="txtsolicitante2" required>
                                                                 
                                                                </div>
                                                            </div> 
                                                           </div> 
                                                        </div>    

                                                        

                                                         <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                              <div class="form-group">
                                                              <label>Observaciones</label>
                                                                
                                                                  <textarea class="form-control claseInput" disabled="false" id="txtobservaciones2" rows="3"></textarea>
                                                                 
                                                                
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
                                                                                <button type="button" id="btnrequerimientoconfirmar" onclick="ConfirmarDespachoRequerimiento();" class="btn btn-success"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span>Despachar Requerimiento</span></button>
                                                                             </div>                                                      
                                                                    </div>  

                                                                  <div class="col-md-4 col-sm-4">
                                                                          <div class="pull-left">
                                                                              <button type="button" onclick="cancelcRequerimientoConfirmar();" class="btn btn-danger" id="btncancelar"><i class="zmdi zmdi-close zmdi-hc-fw m-r-5"></i><span>Cancelar</span></button>
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

           <!-- Modal ANULAR REQUERIMIENTO -->
       
        <div class="modal fade bd-example-modal-lg" id="modal_anularrequerimiento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">  
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
                            <h4 class="text-center text-danger font-14" id="titleP"><strong>DESEA ANULAR ESTE REQUERIMIENTO?</strong></h4>
                          </div>
                          <div class="panel-body">
                                <div class="row">
                                    <!-- <div class="col-lg-1"></div> -->
                                    <div class="col-lg-12">
                                      <form class="form" id="form_anularrequerimiento" method="POST" autocomplete="off" action="javascript:void(0);">
                                        <input class="form-control" type="hidden" id="txtidrequerimiento" name="txtidrequerimiento">
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
        <!-- #END# MODAL FIN ANULAR REQUERIMIENTO-->
       



       

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