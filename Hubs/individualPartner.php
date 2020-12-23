<?php
session_start();
/* include relevant files */
require '../vendor/autoload.php';
include_once "../database/CRUD.php";

$hubid = isset($_GET['HubID']) ? $_GET['HubID'] : '';    //get a hub id
$userid = $_SESSION['UserID'];   //user id

$indPartner = new CRUD();   // CRUD object
$hubToPartner = $indPartner->selectParticularHub($hubid);  // select hub to partner  
$row = mysqli_fetch_array($hubToPartner);  
$name = $row['Company_name'];   //hub name

$newPartnership = $indPartner->addIndPartner($userid, $hubid);   // add partner

use \Mailjet\Resources; //mailjet API resources
if($newPartnership){   //if partnership formed
    echo "<script> alert('PARTNERSHIP REQUEST RECEIVED!');
    window.location.href='viewHubs.php';</script>";
    //send an email
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
                'Subject' => "Partnership Request.",
                'TextPart' => "Mailjet email",
                'HTMLPart' => "<h3>Dear ". $_SESSION['firstname'] ." ". $_SESSION['lastname'].",</h3> Thank you for showing interest in partnering with <b>". $name."</b>".
                " We will continue to interact and make arrangements shortly. Reply by confirming details shortly. 
                <p>Best,</p>
                <p>Ghana Hubs Network.</p>",
                
                'CustomID' => "AppGettingStartedTest"
                
            ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
}
else{  //partnership formed
    echo "<script> alert('PARTNERSHIP REQUEST UNSUCCESSFUL!');
    window.location.href='viewHubs.php';</script>";
}

?>