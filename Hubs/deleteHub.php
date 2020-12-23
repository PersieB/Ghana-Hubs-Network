<?php
include_once "../database/CRUD.php";   //include CRUD file
$hubid = isset($_GET['HubID']) ? $_GET['HubID'] : '';   //get hub id

$deleteHub = new CRUD();   //CRUD object
$hubtoDelete = $deleteHub->selectParticularHub($hubid);   //select hub to delete
if($hubtoDelete){   //selection successful
    $row = mysqli_fetch_array($hubtoDelete);
    $image = $row['Logo_name'];      //get hub image
    $path = "../hubLogos/".$image;   //get image path
    unlink ($path);   //delete image from path
    $delete = $deleteHub->deleteHub($hubid);    //delete hub from database
    if($delete){   //deletion successful
        echo "<script> alert('HUB DELETED!');
        window.location.href='editHubs.php';</script>";
    }else{
        echo "<script> alert('HUB DELETION UNSUCCESSFUL!');
        window.location.href='editHubs.php';</script>";
    }
}


?>