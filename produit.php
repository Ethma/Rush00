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
echo '<a href="http://127.0.0.1:8083/00/index.php"><IMG SRC="https://www.freelogoservices.com/api/main/ph/zjHl2lgef9cYrQL0JFa7kzbw2vuErRBKmhzI0Dd9OXdE9g5shnN1i...Bv9ettdV9dsBUGw0pY"><a /> <br \>';
echo "Mon compte : <a href='users/modif.php'>" . $_SESSION['firstname'] . "</a>";
?>
<br \>
<br \>
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
<a href='http://127.0.0.1:8083/00/index.php'><IMG SRC="https://www.freelogoservices.com/api/main/ph/zjHl2lgef9cYrQL0JFa7kzbw2vuErRBKmhzI0Dd9OXdE9g5shnN1i...Bv9ettdV9dsBUGw0pY"><a />
<br />
<a href="users/create.php">Inscription</a>
<a href="users/login.php">Connexion</a>
<a href="panier.php">Voir panier</a>
<?PHP
}
?>
</header>
<?php
include __DIR__ . '/config/bdd.php';
if (isset($_GET['itad']))
{
	$itpad = mysqli_real_escape_string($bdd, $_POST['itpad']);
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
	echo "<img style='height:300' src='http://" . $img . "'><br />";
	echo "Nom : " . $nom . "<br />";
	echo "prix : " . $prix . "<br />";
	echo "Description : " . $description;
	?>
<form method="POST" action=addpanier.php >
<input type="text" name="qte" value="">
<?PHP
echo "<input type='hidden' name='id' value= '" . $id . "'>";
?>
<input type='submit' name='submit' value='Ajouter au panier'>
</form>
<?PHP
}
if (isset($_SESSION['admin']))
{?>
	<form action='categories.php' method='POST'>
		<input type='text' name='cate'>
	<?php echo "<input type='hidden' name='id' value= '" . $id . "'>";?>
	<input type='submit' name='submit' value='ajouter une categorie'>
</form>
<?php
	$sql2 = "SELECT id, nom_categories FROM Categories WHERE item_id='" . $id . "'";
	$result2 = mysqli_query($bdd, $sql2);
	while ($tmp2 = mysqli_fetch_assoc($result2)) {
		echo "<a href=produit.php?itad=" . $tmp2['id'] . ">supprimer " . $tmp2['nom_categories'] . "</a><br />";
	}
	mysqli_free_result($result2);
}
include("footer.php");
?>