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
echo '<a href="index.php"><IMG SRC="https://www.freelogoservices.com/api/main/ph/zjHl2lgef9cYrQL0JFa7kzbw2vuErRBKmhzI0Dd9OXdE9g5shnN1i...Bv9ettdV9dsBUGw0pY"><a /> <br \>';
echo "<a href='users/modif.php'><span class='btn'>>Mes informations</span></a>";
?>
<br />
<br />
<br />
<a href="panier.php"><span class="btn">>Mon panier</span></a>
<br />
<br />
<br />
<a href="users/logout.php"<span class="btn">>Déconnexion</span></a>
<br />
<br />
<?PHP
}
else
{
?>
<br />
<a href='index.php'><IMG SRC="https://www.freelogoservices.com/api/main/ph/zjHl2lgef9cYrQL0JFa7kzbw2vuErRBKmhzI0Dd9OXdE9g5shnN1i...Bv9ettdV9dsBUGw0pY"><a />
<br />
<a href="users/create.php"> <span class="btn">>Inscription</span></a>
<br />
<br />
<br />
<a href="users/login.php"><span class="btn">>Connexion</span></a>
<br />
<br />
<br />
<a href="panier.php"><span class="btn">> Mon Panier</span><br /></a>
<br />
<?PHP
}
?>
</header>
<?php
include __DIR__ . '/config/bdd.php';
if (isset($_GET['itad']))
{
	$itpad = mysqli_real_escape_string($bdd, $_GET['itad']);
	$req = "DELETE FROM Categories WHERE id='" . $itpad . "'";
	mysqli_query($bdd, $req);
}
if (!$_GET['p'])
	header("Location: index.php");
else
{
	$p = mysqli_real_escape_string($bdd, $_GET['p']);
	$sql = "SELECT id, nom, prix, description, image FROM Item WHERE image='" . $p . "'";
	$result = mysqli_query($bdd, $sql);
	while ($tmp = mysqli_fetch_assoc($result)) {
		$img = $tmp['image'];
		$nom = $tmp['nom'];
		$description = $tmp['description'];
		$prix = $tmp['prix'];
		$id = $tmp['id'];
	}
	mysqli_free_result($result);
	echo "<img style='height:300' src='http://" . htmlspecialchars($img) . "'><br />";
	echo "<p class='descrip'>Nom : " . htmlspecialchars($nom) . "<br />";
	echo "Prix : " . htmlspecialchars($prix) . "€<br />";
	echo "Description : " . htmlspecialchars($description) . "</p>";
	?>
<form method="POST" action=addpanier.php >
<input type="text" name="qte" value="">
<?PHP
echo "<input type='hidden' name='id' value= '" . $id . "'>";
?>
<input class='bton' type='submit' name='submit' value='Ajouter au panier'>
</form>
<?PHP
}
if (isset($_SESSION['admin']))
{?>
	<form action='categories.php' method='POST'>
		<input type='text' name='cate'>
	<?php echo "<input type='hidden' name='id' value= '" . $id . "'>";?>
	<input class='bton' type='submit' name='submit' value='ajouter une categorie'>
</form>
<?php
	$sql2 = "SELECT id, nom_categories FROM Categories WHERE item_id='" . $id . "'";
	$result2 = mysqli_query($bdd, $sql2);
	while ($tmp2 = mysqli_fetch_assoc($result2)) {
		echo "<br /><a class='bton' href=produit.php?itad=" . $tmp2['id'] . ">supprimer " . htmlspecialchars($tmp2['nom_categories']) . "</a><br />";
	}
	mysqli_free_result($result2);
}
include("footer.php");
?>
