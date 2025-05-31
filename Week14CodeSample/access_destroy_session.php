<?php
session_start();

//Store values in session
$_SESSION['username'] = "Ed";
echo "Logged in as ". $_SESSION['username'];

unset ($_SESSION['username']);

session_destroy();

?>