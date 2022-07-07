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
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="widget widget-tile-2 bg-info m-b-30">
              <div class="wt-content p-a-20 p-b-60">
                <div class="wt-title">Usuarios</div>
                <div id="usuarios">
                  
                </div><br><br>
                <!-- <div class="wt-number">Registrados: 11</div><br><br> -->
                <!--<div class="wt-text">Actualizado: 11:26 AM</div>-->
              </div>
              <div class="wt-icon">
                <i class="zmdi zmdi-account"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="widget widget-tile-2 bg-danger m-b-30">
              <div class="wt-content p-a-20 p-b-60"  style="margin-bottom: -30px">
                <div class="wt-title">CONTROL DE ACCESO</div>
                <div id="gerencias">
                  
                </div>
              </div>
              <div class="wt-icon">
                <i class="zmdi zmdi-accounts"></i>
              </div>
            </div>
          </div>
          <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="widget widget-tile-2 bg-warning m-b-30">
              <div class="wt-content p-a-20 p-b-60">
                <div class="wt-title">CONRATOS</div>
                <div class="wt-number">Regitrados: 123</div><br><br>
                <div class="wt-text">Actualizado: 11:26 AM</div>
              </div>
              <div class="wt-icon">
                <i class="zmdi zmdi-tablet"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="widget widget-tile-2 bg-primary m-b-30">
              <div class="wt-content p-a-20 p-b-60">
                <div class="wt-title">Uso del CPU</div>
                <div class="wt-number">12%</div><br>
                <div class="wt-text">Actualizado: 11:26 AM</div>
              </div>
              <div class="wt-icon">
                <i class="zmdi zmdi-settings"></i>
              </div>
            </div>
          </div> -->
        </div>
        <div class="row">
          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
          <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
            <div class="table-responsive">
                <?php if($_SESSION['idPerfil'] == 1){ ?>
                <div id="tbl_resumenCargo" class="dataTables_wrapper form-inline" role="grid">
                      <!--<table id="lista_trabajador" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                                                            
                      </table>-->
                </div>
                <?php 
                    }
                ?>
            </div>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        </div>
      </div>

      <div class="site-footer">
        2019 © Sistema
      </div>
    </div>
    
    <!-- FOOTER -->
    <?php footerAdmin($data); ?>
  </body>

<!-- Mirrored from big-bang-studio.com/cosmos/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:53:30 GMT -->
</html>