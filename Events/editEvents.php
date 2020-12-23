<?php
session_start();
include_once "../database/CRUD.php";   //CRUD FILE
/* Page Pagination */
$page = isset($_GET['page']) ? $_GET['page'] : '';
    if($page=="" || $page=="1"){
        $page1 = 0;
    }
    else{
        $page1 = ($page*5)-5;
    }
$viewEvent = new CRUD();  

$events_per_page = $viewEvent->Event_Limit($page1); //event limit per page
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
<title>Edit</title>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
        <?php
        
        if($_SESSION['ChairID']){
          include "../Chairperson/eventsNavbar.html";
        }
        else if($_SESSION['HubID']){
          include "../hubRepresentative/eventsNavbar.html";
        }
        else{
          include "../generalPublic/eventsNavbar.html";
        }
        ?>
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
                <li>Edit Events</li>
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
            <h2>Edit events</h2>
            <p class="large">Brief description of our upcoming events.
              </p>
          </div>
        </div>
      </div>
    </div>
    <?php

     while ($row = mysqli_fetch_array($events_per_page)){
       ?>
          <div class="row about_blog">
          <div class="col-lg-6 col-md-6 col-sm-12 about_feature_img padding_right_0">
              <div class="full text_align_center"> <?php echo "<img style='width: 100%;'class='img-responsive' src='../eventFlyers/". $row['Logo_name']."'>"; ?> alt="#" />?> </div>
            </div>
        <div class="col-lg-6 col-md-12 col-sm-12 about_cont_blog">
          <div class="full text_align_center">
            <h3 style="color: black;"><?php echo $row['Title']; ?></h3>
            <p style="color: black;"><?php echo $row['Description']; ?></p>
            <p style="color: black;"><?php echo "<b>Location:</b> ". $row['Venue']; ?></p>
            <p style="color: black;"><?php echo "<b>Time:</b> ". $row['StartTime']. " - ". $row['EndTime']. " GMT"; ?></p>
          </div>
          <div class="full text_align_center">
          <a href="updateEvents.php?EventID=<?php echo $row['EventID']; ?>" class="btn main_bt">Update</a>
            <button class="btn btn-danger btn-sm delete" onclick="document.getElementById('id01').style.display='block'" >Delete</button> 
          </div>
          
        </div>
      </div>
      <br><br>
      <!-- a confirmation box for deleting of events -->
      <div id="id01" class="modal" style="width: 40%; margin: auto;">
        
        <div class="full text_align_center" style=" background-color: grey; height: 120px;  ">
        
            <h5>Are you sure you want to delete this event ?</h5>
            <br><br>
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn" style="width:50%; color: white; background-color: black; height: 40px; float: left;">Cancel</button>
              <a href="deleteEvent.php?EventID=<?php echo $row['EventID']; ?>" ><button style="width:50%; height: 40px; color: white; background-color: black;" >Delete</button></a>
        </div>
      </div>
      <?php
     }

    
     ?>


        
</div>
<?php
  /* Getting page count from total records per page / 5 */
$allEvents = $viewEvent->allEvents();
if($allEvents){
  $count = mysqli_num_rows($allEvents);
  $per_page = ceil($count / 5);
  echo "<div  style='width: 70%; margin: auto; text-align: center;'>";
  for($b = 1; $b <=$per_page; $b++){
      ?> <a style='font-size: 30px;color: white;'href="editEvents.php?page=<?php echo $b; ?>">
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
