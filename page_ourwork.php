<?php 
include_once 'config/db.php';

include_once 'modal/ourwork.php';

$show = new Ourwork_Show($_GET['ourwork']);
$find_ourwork_coop = $show->find_Ourwork();
// echo "<pre>"; print_r($find_ourwork_coop); echo "</pre>"; 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="img/icons/LOGO-bru.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>OURWORK - Story</title>

  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>

  <script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>

  <!-- Google Plus -->
  <script src="https://apis.google.com/js/platform.js" async defer></script>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet'
    type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt&display=swap" rel="stylesheet" type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/coop.css" rel="stylesheet">
  <!-- <link href="css/bootstrap-social.css" rel="stylesheet"> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
  <meta property="og:url" content="localhost/ce/page_ourwork.php" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="OURWORK - Story" />
  <meta property="og:description" content="TEST Story" />
  <meta property="og:image" content="img/ourwork/qqq.png" />

</head>

<body id="page-top" style="background-color:#FFFCFF;">

  <script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0&appId=417127265672815&autoLogAppEvents=1">
  </script>

  <div class="header">
    <nav class="navbar navbar-dark navbar-dark fixed-top" id="mainNav" style="background-color:#712E91;">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">สหกิจศึกษา BRU</a>
        <button class="btn btn-outline-warning" onClick="location.href='login/login.php'">ระบบสหกิจ</button>

      </div>
  </div>
  </nav>
  </div> <br><br><br>


  <section>
    <div class="container" align="center">
      <?
           if($find_ourwork_coop){
            foreach ($find_ourwork_coop as $val){
              $ourwork_id = !empty($val['ourwork_id'])? $val['ourwork_id'] : '';
              $ourwork_title = !empty($val['ourwork_title'])? $val['ourwork_title'] : '';
              $ourwork_photo = !empty($val['ourwork_photo'])? $val['ourwork_photo'] : '';
              $ourwork_detail = !empty($val['ourwork_detail'])? $val['ourwork_detail'] : '';
              $ourwork_create_date = !empty($val['ourwork_create_date'])? $val['ourwork_create_date'] : '';
              $ourwork_create_by = !empty($val['ourwork_create_by'])? $val['ourwork_create_by'] : '';
              
            ?>
      <H1><?php echo $ourwork_title; ?></H1> <br> <br>
      <img class="img-fluid" src="<?php echo "img/ourwork/".$ourwork_photo; ?>" alt=""> <br> <br>



    </div>
    <div align="center">
      <h5>
        <center> <?php echo $ourwork_detail; ?> </center>
      </h5>
      <div align=>
        <font color="blank">เขียนโดย : <?php echo $ourwork_create_by; ?> </font>
      </div>
    </div>

    <?php }} ?>
  </section>
  <!-- Share Socail  -->
  <div class="row">
    <?
           if($find_ourwork_coop){
            foreach ($find_ourwork_coop as $val){
              $ourwork_id = !empty($val['ourwork_id'])? $val['ourwork_id'] : '';
              
              
            ?>
    <div class="col-auto">
      <div class="line-it-button" data-lang="eng" data-type="share-a" data-ver="3"
        data-url="http://coopbru.emozerorise.com/page_ourwork.php?ourwork=<? echo $ourwork_id ;?>" data-color="default"
        data-size="large" data-count="true" style="display: none;"></div>
      <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer">
      </script>
    </div>
    <div class="col-auto">
      <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button"
        data-url="http://coopbru.emozerorise.com/page_ourwork.php?ourwork=<? echo $ourwork_id ;?>" data-size="large"
        data-lang="en" data-show-count="false">Tweet</a>
      <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
    <div class="col-auto">
      <div id="fb-root">
        <div class="fb-share-button"
          data-href="http://coopbru.emozerorise.com/page_ourwork.php?ourwork=<? echo $ourwork_id ;?>"
          data-layout="button" data-size="large">
          <a target="_blank"
            href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.bru.ac.th%2F&amp;src=sdkpreparse"
            class="fb-xfbml-parse-ignore">Share</a></div>
      </div>
    </div>
    <?php }} ?>
  </div>

  <!-- Footer   -->
  <footer class="footer" style="background-color:#712E91;">
    <div class="container " color="#fffff">
      <div class="row">
        <div class="col-md-4">
          <span class="copyright">
            <font color="#ffffff">ติดตามเพิ่มเติมได้ที่นี่เลย</font>
          </span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">

            <li class="list-inline-item">
              <a
                href="https://www.facebook.com/%E0%B8%AA%E0%B8%AB%E0%B8%81%E0%B8%B4%E0%B8%88%E0%B8%A8%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2-%E0%B8%A1%E0%B8%AB%E0%B8%B2%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B8%A5%E0%B8%B1%E0%B8%A2%E0%B8%A3%E0%B8%B2%E0%B8%8A%E0%B8%A0%E0%B8%B1%E0%B8%8F%E0%B8%9A%E0%B8%B8%E0%B8%A3%E0%B8%B5%E0%B8%A3%E0%B8%B1%E0%B8%A1%E0%B8%A2%E0%B9%8C-1034200213256831/">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </footer>

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