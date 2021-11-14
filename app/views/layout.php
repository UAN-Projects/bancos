<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $class?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="shortcut icon" href="assets/images/favicon.ico">

  <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.min.css")?>" />
  <link rel="stylesheet" href="<?= base_url("assets/css/icons.min.css")?>" />
  <link rel="stylesheet" href="<?= base_url("assets/libs/pnotify/pnotify.custom.css")?>" />
  <link rel="stylesheet" href="<?= base_url("assets/libs/select2/select2.min.css")?>" />
  <link rel="stylesheet" href="<?= base_url("assets/libs/datatables/dataTables.bootstrap4.css")?>" />

  <link rel="stylesheet" href="<?= base_url("assets/css/app.min.css")?>" />
  <link rel="stylesheet" href="<?= base_url("assets/css/style.css")?>" />
</head>
<body class="center-menu">

  <!-- Navigation Bar-->
  <header id="topnav">
    <?php if($this->session->tempdata('notify')): ?>
        <span id="notify"><?= $this->session->tempdata('notify'); ?></span>
    <?php endif; ?>


      <div class="navbar-custom">
          <div class="container-fluid">
              <ul class="list-unstyled topnav-menu float-right mb-0">

                  <li class="dropdown notification-list">
                      <!-- Mobile menu toggle-->
                      <a class="navbar-toggle nav-link">
                          <div class="lines">
                              <span></span>
                              <span></span>
                              <span></span>
                          </div>
                      </a>
                      <!-- End mobile menu toggle-->
                  </li>

                  <li class="dropdown notification-list">
                      <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                          <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                          <span class="pro-user-name ml-1">
                              <?= $this->ion_auth->user()->row()->first_name; ?>
                                <i class="mdi mdi-chevron-down"></i> 
                          </span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                          <!-- item-->
                          <a href="javascript:void(0);" class="dropdown-item notify-item">
                              <i class="remixicon-account-circle-line"></i>
                              <span>Perfil</span>
                          </a>
                          <a href="<?= base_url('basecontroller/generateToken'); ?>" class="dropdown-item notify-item">
                              <i class="remixicon-account-circle-line"></i>
                              <span>Gerer Token</span>
                          </a>
                          <div class="dropdown-divider"></div>

                          <!-- item-->
                          <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item notify-item">
                              <i class="remixicon-logout-box-line"></i>
                              <span>Logout</span>
                          </a>

                      </div>
                  </li>            

              </ul>

              <!-- LOGO -->
              <div class="logo-box">
                  <a href="<?= base_url(); ?>" class="logo text-center">
                      <span class="logo-lg">
                          <img src="assets/images/logo-light.png" alt="" height="20">
                      </span>
                      <span class="logo-sm">
                          <img src="assets/images/logo-sm.png" alt="" height="24">
                      </span>
                  </a>
              </div>

              <div class="clearfix"></div>
          </div>
      </div>
      <!-- end Topbar -->

      <div class="topbar-menu">
          <div class="container-fluid">
              <div id="navigation">
                  <!-- Navigation Menu-->
                  <ul class="navigation-menu">
                  
                  <?php if(!$isAdmin) { ?>
                    <li class="has-submenu">
                        <a href="#">
                            <i class="remixicon-stack-line"></i>Configurações <div class="arrow-down"></div>
                        </a>
                        <ul class="submenu">
                            <li class="has-submenu">
                                <a href="#">Controle de Acesso <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="<?= base_url('user'); ?>">Utilizadores</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('permissoes'); ?>">Permissões</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                  <?php } ?>

                      <li class="has-submenu">
                            <a href="<?= base_url(); ?>">
                                <i class="remixicon-dashboard-line"></i>Dashboard <div class="arrow-down"></div>
                            </a>
                      </li>

                      <li class="has-submenu">
                          <a href="#">
                              <i class="remixicon-stack-line"></i> Bancos <div class="arrow-down"></div>
                          </a>
                          <ul class="submenu">
                              <li>
                                  <a href="<?= base_url('banco'); ?>"> Bancos </a>
                              </li>
                              <li>
                                  <a href="<?= base_url('conta'); ?>"> Contas </a>
                              </li>
                          </ul>
                      </li>

                  </ul>
                  <!-- End navigation menu -->

                  <div class="clearfix"></div>
              </div>
              <!-- end #navigation -->
          </div>
          <!-- end container -->
      </div>
      <!-- end navbar-custom -->

  </header>
  <!-- End Navigation Bar-->

  <!-- ============================================================== -->
  <!-- Start Page Content here -->
  <!-- ============================================================== -->

  <div class="wrapper">
      <div class="container-fluid">
        <div class="mb-3"></div>
        <?php $this->load->view("$class/$method"); ?>
      </div> <!-- end container -->
  </div>
  <!-- end wrapper -->

  <!-- ============================================================== -->
  <!-- End Page content -->
  <!-- ============================================================== -->

  <!-- Footer Start -->
  <footer class="footer">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-6">
                  2016 - 2019 &copy; Minton theme by <a href="#">Coderthemes</a> 
              </div>
              <div class="col-md-6">
                  <div class="text-md-right footer-links d-none d-sm-block">
                      <a href="javascript:void(0);">About Us</a>
                      <a href="javascript:void(0);">Help</a>
                      <a href="javascript:void(0);">Contact Us</a>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  <!-- end Footer -->

<div class="rightbar-overlay"></div>
<script src="<?= base_url("assets/js/vendor.min.js")?>"></script>
<script src="<?= base_url("assets/libs/jquery-knob/jquery.knob.min.js")?>"></script>
<script src="<?= base_url("assets/libs/peity/jquery.peity.min.js")?>"></script>
<script src="<?= base_url("assets/libs/jquery-sparkline/jquery.sparkline.min.js")?>"></script>
<script src="<?= base_url("assets/libs/pnotify/pnotify.custom.js")?>"></script>
<script src="<?= base_url("assets/libs/select2/select2.min.js")?>"></script>
<script src="<?= base_url("assets/libs/datatables/jquery.dataTables.min.js")?>"></script>
<script src="<?= base_url("assets/libs/datatables/dataTables.bootstrap4.js")?>"></script>
<script src="<?= base_url("assets/js/pages/datatables.init.js")?>"></script>

<script src="<?= base_url("assets/js/pages/dashboard-1.init.js")?>"></script>
<script src="<?= base_url("assets/js/app.min.js")?>"></script>
<script src="<?= base_url("assets/js/script.js")?>"></script>

<?php if(validation_errors() ) { ?>
    <?php if( $method == 'index' ) { ?>
    <script>
        $(document).ready(function(){
            $("#createModalId").click();
        });
    </script>
    <?php } else if($method == 'update') { ?>
    <script>
        $(document).ready(function(){
            $("#updateModal<?= $row->id?>").click();
        });
    </script>
    <?php } ?>
<?php } ?>

</body>
</html>