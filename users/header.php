<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/touch.css">
<link rel="stylesheet" type="text/css" href="../style/footer.css">
</head>
<body style="width: 900px;margin-left:30%;">
<header>
<?php
if (isset($_SESSION['loged']) && $_SESSION['loged'] == true)
{
echo '<a href="../index.php"><IMG SRC="https://www.freelogoservices.com/api/main/ph/zjHl2lgef9cYrQL0JFa7kzbw2vuErRBKmhzI0Dd9OXdE9g5shnN1i...Bv9ettdV9dsBUGw0pY"><a /> <br \>';
echo "<a href='modif.php'>" ."<span class=btn>>Mon compte</span></a>";
?>
<br \>
<br \>
<a href="logout.php">Déconnexion</a>
<?PHP
if (isset($_SESSION['admin']))
echo "<a href='admin/admin.php'><span class='btn'>>Administration</span></a><br />";
}
else
{
?>
<br />
<a href='../index.php'><IMG SRC="https://www.freelogoservices.com/api/main/ph/zjHl2lgef9cYrQL0JFa7kzbw2vuErRBKmhzI0Dd9OXdE9g5shnN1i...Bv9ettdV9dsBUGw0pY"><a />
<br />
<?PHP
}
?>
</header>