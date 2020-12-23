<?php
session_start();
unset($_SESSION['ChairID']);
unset($_SESSION['Username']);
header("Location:../index.html");
?>