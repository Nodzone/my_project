<?php 
print_r ($_SESSION['sid']);
include_once 'config/db.php';
include_once 'modal/index.php';

$show = new Manage_Index();

$find_ourwork_coop = $show->find_ourwork_coop();
$ourwork_first = $show->find_ourwork();
$ourwork_num = $show->all_ourwork_coop();
$news_coop = $show->find_news();

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="img/icons/LOGO-bru.ico"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BRU Coop-Education</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
          integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
          integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
          integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  
  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt&display=swap" rel="stylesheet" type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/coop.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
  .responsive {
  width: 100%;
  height: auto;
}
  </style>
</head>

<body id="page-top">

<?php include "body/header.php" ?>

      <!-- Header -->
      <header class="masthead">
        <div class="container">
          <div class="intro-text">
            <div class="intro-lead-in">    </div>
          <div class="intro-heading text-uppercase">  </div>
            <!--<a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>-->
          </div>
        </div>
      </header>

      <!-- Services -->
      <?php include "body/service.php" ?>
      <!-- News Activity  แก้ไขส่วนนี้ แล้ว ดึง ข้อมูล Modal มาใช้-->
      <?php include "body/ourwork.php" ?>
      <?php include "body/news.php" ?>

      <!-- About -->
      <?php include "body/about.php" ?>
      

      <!-- Team -->
      <!-- <?php // include "body/other.php" ?> -->
      <!-- ourwork -->
      

      <!-- Doc Download -->
      <?php include "body/doc.php" ?>
      
      <!-- Contact -->
      <?php include "body/contact.php" ?>
      

      <!-- Footer -->
      <?php include "body/footer.php" ?>

      

      
     

      <!-- Bootstrap core JavaScript -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Plugin JavaScript -->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Contact form JavaScript -->
      <script src="js/jqBootstrapValidation.js"></script>
      <script src="js/contact_me.js"></script>

      <!-- Custom scripts for this template -->
      <script src="js/agency.min.js"></script>

</body>

</html>
