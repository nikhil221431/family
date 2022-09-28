<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Datagrid Solutions</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/feather/feather.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/mdi/css/materialdesignicons.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/ti-icons/css/themify-icons.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/typicons/typicons.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/simple-line-icons/css/simple-line-icons.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/css/vendor.bundle.base.css');?>">
	<!-- endinject -->
	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="<?php echo base_url('assets/js/select.dataTables.min.css');?>">
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?php echo base_url("assets/vendors/select2/select2.min.css");?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css");?>">

	
	<link rel="stylesheet" href="<?php echo base_url('assets/css/vertical-layout-light/style.css');?>">
  <script src="<?php echo base_url('assets/vendors/js/vendor.bundle.base.js');?>"></script>
  <script src="<?php echo base_url('assets/js/datatable/jquery.dataTables.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/datatable/dataTables.bootstrap4.min.js');?>"></script>

	<style>
		.dataTables_filter {
			text-align : right;
		}
	</style>
</head>
<body>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="<?php echo site_url('Family/familyinfo');?>">
            Datagrid Solutions
          </a>
          <a class="navbar-brand brand-logo-mini" href="<?php echo site_url('Family/familyinfo');?>">
            <img src="<?php echo base_url('assets/images/logo-mini.svg');?>" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Welcome, <span class="text-black fw-bold"><?php echo $this->session->userdata('username');?></span></h1>
            <h3 class="welcome-sub-text">Software Development Company</h3>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="<?php echo base_url('assets/images/faces/face8.jpg');?>" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="<?php echo base_url('assets/images/faces/face8.jpg');?>" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold"><?php echo $this->session->userdata('username');?></p>
                <p class="fw-light text-muted mb-0"><?php echo $this->session->userdata('email'); ?></p>
              </div>
              <a class="dropdown-item" href="<?php echo site_url("Family/logoutuser");?>" qid="logout"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url("Family/familyinfo");?>">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Family</span>
            </a>
          </li>
        </ul>
      </nav>