<?php require_once("../private/includes/initialize.php"); ?>
<?php error_reporting(0); ?>
<?php
$randomStringTwo =  generateRandomString();

      redirect_to("login.php?session_id=$randomStringTwo");

?>
