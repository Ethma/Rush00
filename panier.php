<html>
<head>
<link rel="stylesheet" type="text/css" href="style/touch.css">
<link rel="stylesheet" type="text/css" href="style/footer.css">
</head>
<body class="body">
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
<a href="users/logout.php"><span class='btn'>>Déconnexion</span></a>
<br />
<br />
<br />
<a href="panier.php"><span class='btn'>>Mettre à jour mon panier</span></a>
<br />
<?PHP
if (isset($_SESSION['admin']))
echo "<a href='admin/admin.php'>Administration</a>";
}
else
{
?>
<a href='index.php'><IMG SRC="https://www.freelogoservices.com/api/main/ph/zjHl2lgef9cYrQL0JFa7kzbw2vuErRBKmhzI0Dd9OXdE9g5shnN1i...Bv9ettdV9dsBUGw0pY"><a />
<br />
<a href="users/create.php">Inscription</a>
<a href="users/login.php">Connexion</a>
<?PHP
}
?>
</header>
</html>
<?PHP
include __DIR__ . '/config/bdd.php';
if (isset($_GET['id']))
{
	unset($_SESSION['panier'][$_GET['id']]);
}
$total = 0;
if (isset($_SESSION['panier'])) {
	foreach($_SESSION['panier'] as $k => $v)
	{
		$sql = "SELECT nom, prix, description, image FROM Item WHERE id='" . $k . "'";
		$result = mysqli_query($bdd, $sql);
		while ($tmp = mysqli_fetch_assoc($result)) {
			$total += ($tmp['prix'] * $v);
			echo "Nom : " . $tmp['nom'] . "<br />";
			echo "prix : " . $tmp['prix'] . "<br />";
			echo "Description : " . $tmp['description'];
			echo "<br />quantite : " . $_SESSION['panier'][$k];
			echo "<br />.......................<br />";
			echo "<a href='panier.php?id=" . $k . "'>Vider mon panier</a>";
		}
		mysqli_free_result($result);
	}
	echo "<br />Total :" . $total . "<br />";
}
else
echo "Panier vide.";
?>
<form method="POST" action="val_cmd.php" >
<input type='submit' name='submit' value='Sauvegarder panier'>
<form method="POST" action="confirm.php" >
<input type='submit' name='submit' value='Valider panier'>
<?PHP
include("footer.php");
?>