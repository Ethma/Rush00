<html>
<head>
<link rel="stylesheet" type="text/css" href="style/touch.css">
<link rel="stylesheet" type="text/css" href="style/footer.css">
</head>
<body style="width: 900px;margin-left:30%;">
<header>
<?php
session_start();
if (isset($_SESSION['loged']) && $_SESSION['loged'] == true)
{
echo '<a href="index.php"><IMG SRC="https://www.freelogoservices.com/api/main/ph/zjHl2lgef9cYrQL0JFa7kzbw2vuErRBKmhzI0Dd9OXdE9g5shnN1i...Bv9ettdV9dsBUGw0pY"><a /> <br \>';
echo "<a href='users/modif.php'>" ."<span class=btn>>Mon compte</span></a><br />";
?>
<br \>
<br \>
<a href="users/logout.php"><span class='btn'>>Déconnexion</span></a>
<br />
<br />
<br />
<a href="panier.php"><span class='btn'>>Mettre à jour mon panier</span></a>
<br />
<br />
<?PHP
if (isset($_SESSION['admin']))
echo "<br /><a href='admin/admin.php'><span class='btn'>>Administration</span></a><br /><br />";
}
else
{
?>
<a href='index.php'><IMG SRC="https://www.freelogoservices.com/api/main/ph/zjHl2lgef9cYrQL0JFa7kzbw2vuErRBKmhzI0Dd9OXdE9g5shnN1i...Bv9ettdV9dsBUGw0pY"><a />
<br />
<br />
<br />
<a href="users/create.php"> <span class="btn">>Inscription</span></a>
<br />
<br />
<br />
<a href="users/login.php"><span class="btn">>Connexion</span></a>
<br />
<br />
<br />
<a href="panier.php"><span class="btn">>Mon Panier</span><br /></a>
<br />
<br />
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
			echo "<br /><a href='panier.php?id=" . $k . "'><span class='btn'>>Retirer du panier</span></a><br /><br />";
		}
		mysqli_free_result($result);
	}
	echo "<br />Total :" . $total . "<br />";
	echo "<form method='POST' action='confirm.php' >";
	echo "<input type='submit' name='submit' value='Valider panier'>";
}
else
echo "Panier vide.";
?>
<?PHP
include("footer.php");
?>
