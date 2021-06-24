<?php
include 'valid.php';
include('includes/header.php'); 
include('includes/navbar.php'); 
$username = $_GET['username'];
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                
                  <?php
                  include "include/conn.php";
                  
                  $query= "SELECT id FROM admin ORDER BY id";
                  $query_run = mysqli_query($connection,$query);
                  
                  $row=mysqli_num_rows($query_run);
                  
                  echo '<h1> '.$row.' </h1>';
                  ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Registered Teachers</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                
                <?php
                  include "include/conn.php";
                  
                  $query= "SELECT id FROM users ORDER BY id";
                  $query_run = mysqli_query($connection,$query);
                  
                  $row=mysqli_num_rows($query_run);
                  
                  echo '<h1> '.$row.' </h1>';
                  ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Feedback Received</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                     <?php
                  include "include/conn.php";
                  
                  $query= "SELECT id FROM feedback ORDER BY id";
                  $query_run = mysqli_query($connection,$query);
                  
                  $row=mysqli_num_rows($query_run);
                  
                  echo '<h1> '.$row.' </h1>';
                  ?>
                    
                </div>
                <div class="col">
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Replies</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><h1></h1></div>
                <?php
                  include "include/conn.php";
                  
                  $query= "SELECT id FROM feedback WHERE reply='' ";
                  $query_run = mysqli_query($connection,$query);
                  
                  $row=mysqli_num_rows($query_run);
                  
                  echo '<h1> '.$row.' </h1>';
                  ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->








  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>