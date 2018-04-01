<?php 
session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/touch.css">
<link rel="stylesheet" type="text/css" href="../style/footer.css">
</head>
<body class="adminpan">
<header>
<?php
if (isset($_SESSION['loged']) && $_SESSION['loged'] == true)
{
echo '<a href="../index.php"><IMG SRC="https://www.freelogoservices.com/api/main/ph/zjHl2lgef9cYrQL0JFa7kzbw2vuErRBKmhzI0Dd9OXdE9g5shnN1i...Bv9ettdV9dsBUGw0pY"><a /> <br \>';
echo "<a href='../users/modif.php'><span class='btn'>Mes informations</span></a>";
?>
<span></span>
<a href="../users/logout.php"><span class='btn'>Déconnexion</span></a>
<?PHP
if (isset($_SESSION['admin']))
echo "<a class='btn' href='admin.php'>Administration</a>";
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
}
else
{
?>
<a href='../index.php'><IMG SRC="https://www.freelogoservices.com/api/main/ph/zjHl2lgef9cYrQL0JFa7kzbw2vuErRBKmhzI0Dd9OXdE9g5shnN1i...Bv9ettdV9dsBUGw0pY"></a>
<br />
<?PHP
}
?>
</header>
