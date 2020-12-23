<?php
include_once "../database/CRUD.php";  //CRUD file
$eventid = isset($_GET['EventID']) ? $_GET['EventID'] : '';  //get event id to delete

$deleteEvent = new CRUD();  //CRUD object
$eventtoDelete = $deleteEvent->selectParticularEvent($eventid); // select event to delete
if($eventtoDelete){  //selection success
    $row = mysqli_fetch_array($eventtoDelete);
    $image = $row['Logo_name'];   // get old hub image
    $path = "../eventFlyers/".$image;  // get path
    unlink ($path); //remove path
    /* delete event */
    $delete = $deleteEvent->deleteEvent($eventid);  
    $delete1 = $deleteEvent->deleteRegisteredEvent($eventid);
    if($delete){  //deletion successful
        echo "<script> alert('EVENT DELETED!');
        window.location.href='editEvents.php';</script>";
    }else{
        echo "<script> alert('EVENT DELETION UNSUCCESSFUL!');
        window.location.href='editEvents.php';</script>";
    }
}


?>