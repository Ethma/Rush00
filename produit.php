<?php
include("header.php");
include __DIR__ . '/config/bdd.php';
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
	<?PHP
}
include("footer.php");
?>
