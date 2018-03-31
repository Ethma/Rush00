<html>
<head>
<link rel="stylsheet" href="style/css.css?<?php echo time(); ?>" type="text/css">
</head>
<body>
<header>
<?php
session_start();
if (isset($_SESSION['loged']) && $_SESSION['loged'] == true)
{
echo "Mon compte : <a href='users/modif.php'>" . $_SESSION['firstname'] . "</a>";
?>
<a href="panier.php">  Voir panier</a>
<a href="users/logout.php">Deconnexion</a>
<?PHP
if (isset($_SESSION['admin']))
echo "<a href='admin/admin.php'>administration</a>";
}
else
{
?>
<a href="users/create.php">Inscription</a>
<a href="users/login.php">Connexion</a>
<a href="panier.php">Voir panier</a>
<?PHP
}
?>
</header>
