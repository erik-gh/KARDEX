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
                    <a href="#tab-rotulo01" role="tab" data-toggle="tab" aria-expanded="true">
                      <i class="zmdi zmdi-view-module"></i>Rotulo # 01</a>
                  </li>

                  <!--li class="">
                    <a href="#tab-tmateriales" role="tab" data-toggle="tab" aria-expanded="false">
                      <i class="zmdi zmdi-refresh"></i>TRAZABILIDAD DE MATERIAL</a>
                  </li -->

                                    
                </ul>

                <div class="tab-content">
                  

                  <div role="tabpanel" class="tab-pane fade active in" id="tab-rotulo01">
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <div class="panel panel-primary panel-table m-b-0">
                          <div class=" panel-heading">
                            <h5 class="text-black m-b-18"><strong>FORMATO IDENTIFICACION DE PALLET</strong></h5> 
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <!-- <div class="col-lg-1"></div> -->
                              <div class="col-lg-8">
                                <form class="form" id="form_rotulo01" method="POST" autocomplete="off" action="javascript:void(0);">
                                  <input class="form-control" type="hidden" id="txtrotulo" name="txtrotulo">
                                  <input class="form-control" type="hidden" id="txtcontrolrotulo" name="txtcontrolrotulo" value="0">
                                  <div class="panel panel-default">
                                    <div class="panel-body">
                                      <!-- <h5 class="text-blue-grey m-b-15"><strong>DATOS PERSONALES</strong></h5> -->
                                      
                                      <div class="row">
                                          
                                          <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">                                              
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


                                         <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                <div class="clearfix m-t-30">
                                                  <div class="pull-left ">
                                                    <button type="submit" onclick="MostrarCantidades(),buttonconsultastock();" class="btn btn-outline-primary" id="btnconsulta"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> CONSULTAR</span></button>
                                                    
                                                  </div>
                                              </div>
                                         </div> 


                                      </div>

                                      <div class="row">
                        
                                          <div class="col-md-12 col-sm-12">

                                            <div class="panel panel-default  panel-table m-b-0 " id="panelstock">
                                              <div class="panel-heading ">
                                                <div class="row">
                                                         <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                            <div class="form-group">
                                                              <label>Stock en  A:</label>
                                                             <div class="input-group-prepend">
                                                                <input class="form-control vld claseInput" disabled type="number" id="txtA" name="txtserie" required>
                                                            </div>
                                                            </div>
                                                          </div>  

                                                           <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                            <div class="form-group">
                                                              <label>Fraccionar A:</label>
                                                             <div class="input-group-prepend">
                                                                <input class="form-control vld claseInput" type="number" id="txtrA" name="txtserie" required>
                                                            </div>
                                                            </div>
                                                          </div> 

                                                           <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                              <div class="clearfix m-t-30">
                                                                <div class="pull-left ">
                                                                  <button type="submit" onclick="pdfRotuloPallet('A');" class="btn btn-outline-success" id="btnconsulta"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> GENERAR PDFs</span></button>
                                                                  
                                                                </div>
                                                              </div>
                                                            </div> 
                                                  </div> 

                                                  <div class="row">
                                                         <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                            <div class="form-group">
                                                              <label>Stock en  B:</label>
                                                             <div class="input-group-prepend">
                                                                <input class="form-control vld claseInput" disabled type="number" id="txtB" name="txtserie" required>
                                                            </div>
                                                            </div>
                                                          </div>  

                                                           <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                            <div class="form-group">
                                                              <label>Fraccionar B:</label>
                                                             <div class="input-group-prepend">
                                                                <input class="form-control vld claseInput" type="number" id="txtrB" name="txtserie" required>
                                                            </div>
                                                            </div>
                                                          </div> 

                                                           <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                              <div class="clearfix m-t-30">
                                                                <div class="pull-left ">
                                                                  <button type="submit" onclick="pdfRotuloPallet('B');" class="btn btn-outline-success" id="btnconsulta"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> GENERAR PDFs</span></button>
                                                                  
                                                                </div>
                                                              </div>
                                                            </div> 
                                                  </div> 

                                                  <div class="row">
                                                         <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                            <div class="form-group">
                                                              <label>Stock en  C:</label>
                                                             <div class="input-group-prepend">
                                                                <input class="form-control vld claseInput" disabled type="number"  id="txtC" name="txtserie" required>
                                                            </div>
                                                            </div>
                                                          </div>  

                                                           <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                            <div class="form-group">
                                                              <label>Fraccionar C:</label>
                                                             <div class="input-group-prepend">
                                                                <input class="form-control vld claseInput" type="number" id="txtrC" name="txtserie" required>
                                                            </div>
                                                            </div>
                                                          </div> 

                                                           <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                              <div class="clearfix m-t-30">
                                                                <div class="pull-left ">
                                                                  <button type="submit" onclick="pdfRotuloPallet('C');" class="btn btn-outline-success" id="btnconsulta"><i class="zmdi zmdi-check zmdi-hc-fw m-r-5"></i><span> GENERAR PDFs</span></button>
                                                                  
                                                                </div>
                                                              </div>
                                                            </div> 
                                                  </div> 
                                                <h4 class="text-center text-danger font-18"><strong>STOCK</strong></h4>
                                              </div>
                                              <div class="panel-body">
                                                <div class="table-responsive">
                                                  <div id="tbl_tstock" class="dataTables_wrapper form-inline" role="grid">
                                                    <table id="tableStocks" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                      <thead class="text-center font-table">
                                                        <tr class="bg-primary">
                                                          
                                                          <th class="text-center" width="60%">PRODUCTO</th>   
                                                          <th class="text-center" width="10%">A</th>
                                                          <th class="text-center" width="10%">B</th>
                                                          <th class="text-center" width="10%">C</th>
                                                          <th class="text-center" width="10%">TOTAL</th>
                                                          
                                                          
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
   
    <!-- FOOTER -->
    <?php footerAdmin($data); ?>
  </body>



<!-- Mirrored from big-bang-studio.com/cosmos/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:53:30 GMT -->
</html>