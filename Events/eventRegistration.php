<?php
session_start();
/* include files */
require '../vendor/autoload.php';
include_once "../database/CRUD.php";
$eventid = isset($_GET['EventID']) ? $_GET['EventID'] : '';   // event id

$userid = $_SESSION['UserID'];   //uderid

$Register = new CRUD();   // CRUD object
$event = $Register->selectParticularEvent($eventid);   // select event to register
$row = mysqli_fetch_array($event);  
/* Get event details */
$name = $row['Title'];
$date = $row['Date'];
$venue = $row['Venue'];
$start = $row['StartTime'];
$end = $row['EndTime'];

$myEvent = $Register->addRegisteredEvent($userid, $eventid);   //add user to event registration data


use \Mailjet\Resources; //mailjet API resources
if($myEvent){   
    echo "<script> alert('REGISTRATION SUCCESSFUL!');
    window.location.href='viewEvents.php';</script>"; 
    
    /* send email to confirm event registration */
    $mj = new \Mailjet\Client('3494195b708df1858f75020d3b2550ef','87913daad34c6e7b310b1259d9645b22',true,['version' => 'v3.1']);
    $body = [
        'Messages' => [
        [
            'From' => [
            'Email' => "lakeb6404@gmail.com",
           
            ],
            'To' => [
            [
                'Email' => "".$_SESSION['email']."",
                
                
            ]
            ],
            'Subject' => "Event Registration",
            'TextPart' => "Mailjet email",
            'HTMLPart' => "<h3>Dear ". $_SESSION['firstname'] ." ". $_SESSION['lastname'].",</h3> Thank you for showing interest in attending the <b>". $name."</b>,
            on ".$date." at ".$venue." from ".$start." to ".$end.
            " We will continue to interact and make arrangements shortly. Reply by confirming details shortly. 
            <p>Best,</p>
            <p>Ghana Hubs Network.</p>",
            
            'CustomID' => "AppGettingStartedTest"
            
        ]
        ]
    ];
    $response = $mj->post(Resources::$Email, ['body' => $body]);
}

if(!$myEvent){
    echo "<script> alert('REGISTRATION UNSUCCESSFUL!');
    window.location.href='viewEvents.php';</script>";
}
?>