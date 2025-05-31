<?php
session_start();

//Store values in session
$_SESSION['username'] = "Ed";

echo "Session started for". $_SESSION['username'];

?>