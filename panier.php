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
	$veri = -1;
	foreach($_SESSION['panier'] as $k => $v)
	{
		$veri = 1;
		$sql = "SELECT nom, prix, description, image FROM Item WHERE id='" . mysqli_real_escape_string($bdd, $k) . "'";
		$result = mysqli_query($bdd, $sql);
		while ($tmp = mysqli_fetch_assoc($result)) {
			$total += ($tmp['prix'] * $v);
			echo "<div class='additem'>";
			echo "Nom : " . htmlspecialchars($tmp['nom']) . "<br />";
			echo "Prix : " . htmlspecialchars($tmp['prix'])."€";
			echo "<br />Quantité : " . htmlspecialchars($_SESSION['panier'][$k])."<br />";
			echo "<br /><a href='panier.php?id=" . $k . "'><span class='btn'>>Retirer du panier</span></a><br /><br />";
			echo "</div>";
			echo "<br />";
		}
		mysqli_free_result($result);
	}
	if ($veri === 1)
	{
		echo "<div class='info'><br />Total :" . htmlspecialchars($total) . "€<br /></div>";
		echo "<form method='POST' action='val_cmd.php'><br />";
		echo "<input class='btn' type='submit' name='submit' value='Valider panier'>";
		echo "<h4>/!\Définitif/!\</h4>";
	}
	else
		echo "<div class='info'>Panier vide.</div><br />";
}
else
	echo "<div class='info'>Panier vide.</div><br />";
?>
<?PHP
include("footer.php");
?>
