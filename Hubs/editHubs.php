<?php
session_start();
include_once "../database/CRUD.php";   //CRUD file
/* Page Pagination */
$page = isset($_GET['page']) ? $_GET['page'] : '';   
    if($page=="" || $page=="1"){
        $page1 = 0;
    }
    else{
        $page1 = ($page*5)-5;
    }
$viewHub = new CRUD();   // CRUD object 

$hubs_per_page = $viewHub->Hub_Limit($page1);   // hub limit per page
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>About</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- site icons -->
<link rel="icon" href="../images/fevicon/fevicon.png" type="image/gif" />
<!-- bootstrap css -->
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<!-- Site css -->
<link rel="stylesheet" href="../css/style.css" />
<!-- responsive css -->
<link rel="stylesheet" href="../css/responsive.css" />
<!-- colors css -->
<link rel="stylesheet" href="../css/colors1_dark.css" />
<!-- custom css -->
<link rel="stylesheet" href="../css/custom.css" />
<!-- wow Animation css -->
<link rel="stylesheet" href="../css/animate.css" />
</head>
<body id="default_theme" class="it_service about">
<!-- loader -->
<div class="bg_load"> <img class="loader_animation" src="../images/loaders/loader_1.png" alt="#" /> </div>
<!-- end loader -->
<!-- header -->
<header id="default_header" class="header_style_1">
  <!-- end header top -->
  <!-- header bottom -->
  <div class="header_bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
          <!-- logo start -->
          <div class="logo"> <a href="it_home.html"><img src="../images/logos/logo.JPG" alt="logo" /></a> </div>
          <!-- logo end -->
        </div>
        <?php include "../Chairperson/hubNavbar.html" ?>
      </div>
    </div>
  </div>
  <!-- header bottom end -->
</header>
<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title"><?php echo "@".$_SESSION["Username"]; ?></h1>
              <ol class="breadcrumb">
                <li>Edit Hubs</li>
                <li class="active"><a href="../Chairperson/logout.php">Logout</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end inner page banner -->
<!-- section -->
<div class="section padding_layout_1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="main_heading text_align_center">
            <h2>Know Our Hubs</h2>
            <p class="large">Brief description of our member hubs.
              </p>
          </div>
        </div>
      </div>
    </div>
    <?php
    /* Display hubs from database */
     while ($row = mysqli_fetch_array($hubs_per_page)){   
       ?>
          <div class="row about_blog">
          <div class="col-lg-6 col-md-6 col-sm-12 about_feature_img padding_right_0">
              <div class="full text_align_center"> <?php echo "<img style='width: 100%;'class='img-responsive' src='../hubLogos/". $row['Logo_name']."'>"; ?> alt="#" />?> </div>
            </div>
        <div class="col-lg-6 col-md-12 col-sm-12 about_cont_blog">
          <div class="full text_align_center">
            <h3 style="color: black;"><?php echo $row['Company_name']; ?></h3>
            <p style="color: black;"><?php echo $row['Description']; ?></p>
            <p style="color: black;"><?php echo "Location: ". $row['Address']; ?></p>
            <p style="color: black;"><?php echo "Contact: ". $row['Telephone']; ?></p>
            <?php $mail = "mailto:".$row['Gmail'];?>
            <p style="color: black;"><?php echo "Email: <a style='color: blue;'href='$mail'>".$row['Gmail']."</a>"; ?></p>
          </div>
          <div class="full text_align_center">
            <a href="updateHub.php?HubID=<?php echo $row['HubID']; ?>" class="btn main_bt">Update</a>   <!-- update button -->
            <button class="btn btn-danger btn-sm delete" onclick="document.getElementById('id01').style.display='block'" >Remove</button> <!-- delete button -->
          </div>
          
        </div>
      </div>
      <br><br>
      <!-- a confirmation box for deleting of hubs -->
      <div id="id01" class="modal" style="width: 40%; margin: auto;">
        
        <div class="full text_align_center" style=" background-color: grey; height: 150px;  ">
        
            <h5>Are you sure you want to remove this Hub ?</h5>
            <br><br>
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn" style="width:50%; color: white; background-color: black; height: 40px; float: left;">Cancel</button>
              <a href="deleteHub.php?HubID=<?php echo $row['HubID']; ?>" ><button style="width:50%; height: 40px; color: white; background-color: black;" >Delete</button></a>
        </div>
      </div>
      <?php
     }

     ?>
</div>
<?php
  /* Getting page count from total records per page / 5 */
  $allHubs = $viewHub->allHubs();
  if($allHubs){
    $count = mysqli_num_rows($allHubs);
    $per_page = ceil($count / 5);
    echo "<div  style='width: 70%; margin: auto; text-align: center;'>";
    for($b = 1; $b <=$per_page; $b++){
        ?> <a style='font-size: 30px;color: white;'href="editHubs.php?page=<?php echo $b; ?>">
          <?php echo "&laquo; ". $b." &raquo; ";?></a> <?php
    }
    echo "</div>";
  }
  ?>

    
<!-- js section -->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- menu js -->
<script src="../js/menumaker.js"></script>
<!-- wow animation -->
<script src="../js/wow.js"></script>
<!-- custom js -->
<script src="../js/custom.js"></script>

</body>
</html>
