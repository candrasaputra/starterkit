<header class="main-header">
  <!-- Logo -->
  <a href="https://pedasabis.com" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>SS</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">PEDASABIS <strong>SS</strong></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="navbar-custom-menu">
      <?php
      $user = $this->ion_auth->user()->row();
       ?>
      <ul class="nav navbar-nav">

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url('assets/img/usr/default.jpg'); ?>" class="user-image" alt="User Image" />
            <span class="hidden-xs"><?php echo $user->first_name; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo base_url('assets/img/usr/default.jpg'); ?>" class="img-circle" alt="User Image" />
              <p>
                <small>Terakhir Login Kemaren</small>
              </p>
            </li>

            <!-- Menu Footer-->

            <li class="user-footer">
              <div class="pull-left">
                <a href="<?php echo base_url()?>profile" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="<?php echo base_url()?>logout" class="btn btn-default btn-flat">Keluar</a>
              </div>
            </li>
          </ul>
        </li>
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>