<?php session_start(); ?>
<?php include "includes/header.php"; ?>
<?php
session_unset();
// $_SESSION['username'] = null;
// $_SESSION['firstname'] = null;
// $_SESSION['lastname'] = null;
// $_SESSION['role'] = null;
header("Location: ../index.php")

?>
