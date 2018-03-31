<?PHP
opcache_reset();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="./style/touch.css">
<link rel="stylesheet" type="text/css" href="./style/footer.css">
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
<a href="users/create.php">Inscription</a>
<a href="users/login.php">Connexion</a>
<a href="panier.php">Voir panier</a>
<ul id=menu>
			<li><h2>Gaming</h2>
					<ul id=menu1>
						<li><a href='http://127.0.0.1:8083/00/produit.php?p=img/new.png'>Clavier<a /></li>
						<li>Souris</li>
						<li>Casques</li>
					</ul>
				</li>
<?PHP
}
?>
</header>
