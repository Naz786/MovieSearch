<?php
include_once "session.php";
//destroys session
session_destroy();

header("location:logoutt.php");

?>