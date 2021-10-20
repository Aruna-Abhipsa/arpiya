<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Arpiya Aircon | Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.png" type="image/x-icon" />	
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom style -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script>

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert.css">
    <script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <img src="<?php echo base_url(); ?>assets/images/logo.png" class="img-circle" alt="User Image" />
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <span class="nav-headtext">Arpiya Aircon</span>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav"> 
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="<?php echo base_url();?>logout" ><i class="fa fa-fw fa-sign-out"></i>Sign out</a> 
              </li>
            </ul>
          </div>

        </nav>
      </header>