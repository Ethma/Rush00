<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/touch.css">
<link rel="stylesheet" type="text/css" href="../style/footer.css">
</head>
<body class="body">
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
<br />
<a href='/00/index.php'><IMG SRC="https://www.freelogoservices.com/api/main/ph/zjHl2lgef9cYrQL0JFa7kzbw2vuErRBKmhzI0Dd9OXdE9g5shnN1i...Bv9ettdV9dsBUGw0pY"><a />
<br />
<a href="./create.php">Inscription</a>
<a href="panier.php">Voir panier</a>
<?PHP
}
?>
</header>
<?PHP
include __DIR__ . '/../config/bdd.php';
include ('auth.php');
if (isset($_POST['login']) && isset($_POST['passwd']) && isset($_POST['submit']) && $_POST['submit'] === "OK")
{
	$_SESSION['loged'] = auth($_POST['login'], $_POST['passwd'], $bdd);
	if($_SESSION['loged'])
		header("Location: ../index.php");
}
if (isset($_POST['submit']))
	echo "Login Error <br />";
echo "<html><body>";
echo '<form method="post" action=login.php >';
echo "Identifiant: <input type='text' name='login' value=''/>";
echo "<br />";
echo "Mot de passe: <input type='password' name='passwd' value=''/>";
echo "<br />";
echo "<input type='submit' name='submit' value='OK'>";
echo "<a href='../index.php'>Accueil<a/>";
echo "</form>";
echo "</html></body>";
?>
