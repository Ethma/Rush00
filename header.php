<?PHP
opcache_reset();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="./style/touch.css">
<link rel="stylesheet" type="text/css" href="./style/footer.css">
</head>
<body style="width: 600px;margin: auto;">
<header>
<?php
session_start();
if (isset($_SESSION['loged']) && $_SESSION['loged'] == true)
{
echo '<a href="http://127.0.0.1:8083/00/index.php"><IMG SRC="https://www.freelogoservices.com/api/main/ph/zjHl2lgef9cYrQL0JFa7kzbw2vuErRBKmhzI0Dd9OXdE9g5shnN1i...Bv9ettdV9dsBUGw0pY"><a /> <br \>';
echo "Mon compte : <a href='users/modif.php'>" . $_SESSION['firstname'] . "</a>";
?>
<br \>
<br \>
<a href="panier.php"><span class="btn">>Voir panier</span></a>
<a href="users/logout.php"<span class="btn">>Déconnexion</span></a>
<?PHP
if (isset($_SESSION['admin']))
echo "<a href='admin/admin.php'><span class='btn'>>Administration</span></a><br />";
}
else
{
?>
<br />
<a href='http://127.0.0.1:8083/00/index.php'><IMG SRC="https://www.freelogoservices.com/api/main/ph/zjHl2lgef9cYrQL0JFa7kzbw2vuErRBKmhzI0Dd9OXdE9g5shnN1i...Bv9ettdV9dsBUGw0pY"><a />
<br />
<a href="users/create.php"> <span class="btn">>Inscription</span></a>
<a href="users/login.php"><span class="btn">>Connexion</span></a>
<a href="panier.php"><span class="btn">>Panier</span><br /></a>
<br />
<br />
<?PHP
}
?>
</header>
