<?php
session_start();
unset($_SESSION['loged']);
unset($_SESSION['firstname']);
unset($_SESSION['userid']);
unset($_SESSION['admin']);
header("Location: ../index.php");
?>
