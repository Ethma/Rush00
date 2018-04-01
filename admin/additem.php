<?PHP
include("header.php");
session_start();
include __DIR__ . '/../config/bdd.php';
if(isset($_SESSION['admin']))
{
if ($_POST['nom'] && $_POST['prix'] && $_POST['description'] && $_POST['submit'] && $_POST['submit'] === "OK")
{
	$nom = mysqli_real_escape_string($bdd, $_POST['nom']);
	$prix = floatval($_POST['prix']);
	$description = mysqli_real_escape_string($bdd, $_POST['description']);
	$img = mysqli_real_escape_string($bdd, $_POST['img']);
	$req = "INSERT INTO Item (nom, prix, description, image) VALUES('" . $nom . "', '" . $prix . "', '" . $description . "', '" . $img . "')";
	if (mysqli_query($bdd, $req))
	{
		$lid = mysqli_insert_id($bdd);
		$sql = "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('" . $lid . "', 'new');";
		mysqli_query($bdd, $sql);
	}
}
else if (isset($_POST['submit']) && isset($_POST['id']))
{
	$id = mysqli_real_escape_string($bdd, $_POST['id']);
	if ($_POST['submit'] === 'Modifier Item')
	{
		if (!(empty($_POST['nom'])))
		{
			$nom = mysqli_real_escape_string($bdd, $_POST['nom']);
			$sql = "UPDATE Item SET nom='" .$nom . "'WHERE id='" . $id . "'";
			mysqli_query($bdd, $sql);
		}
		if (!(empty($_POST['prix'])))
		{
			$prix = floatval($_POST['prix']);
			$sql = "UPDATE Item SET prix='" .$prix . "'WHERE id='" . $id . "'";
			mysqli_query($bdd, $sql);
		}
		if (!(empty($_POST['description'])))
		{
			$description = mysqli_real_escape_string($bdd, $_POST['description']);
			$sql = "UPDATE Item SET description='" .$description . "'WHERE id='" . $id . "'";
			mysqli_query($bdd, $sql);
		}
		if (!(empty($_POST['image'])))
		{
			$image = mysqli_real_escape_string($bdd, $_POST['image']);
			$sql = "UPDATE Item SET image='" .$image . "'WHERE id='" . $id . "'";
			mysqli_query($bdd, $sql);
		}
	}
	if ($_POST['submit'] === 'Suprimer Item')
	{
		$sql = "DELETE FROM Item WHERE id='" . $id . "'";
		mysqli_query($bdd, $sql);
	}
}
	if ($_POST['submit'] && $_POST['submit'] === "OK")
	{
		if (!$_POST['nom'])
			echo "Champ Nom manquant. <br />";
		if (!$_POST['prix'])
			echo "Champ Prix manquant. <br />";
		if (!$_POST['description'])
			echo "Champ Description manquant. <br />";
		if (!$_POST['img'])
			echo "Champ Image manquant. <br />";
	}
?>
<html><body>
<?PHP
?><div class='additem'>
<form method="POST" action="additem.php" >
Nom : <input type='text' name='nom' value=''/>
<br />
Prix: <input type='text' name='prix' value=''/>
<br />
Description: <input type='text' name='description' value=''/>
<br />
Image (url): <input type='text' name='img' value=''/>
<br />
<input class='bton' type='submit' name='submit' value='OK'>
</form>
</div>
<br />
<?php
$req = "SELECT id, nom, prix, description, image FROM Item";
$res = mysqli_query($bdd, $req);
while ($tmp = mysqli_fetch_assoc($res)) {
echo "<div class='additem'>";
echo "<form method='POST' action='additem.php' >";
echo "Nom du produit :<input type='text' name='nom' value='" . htmlspecialchars($tmp['nom']) . "'><br />";
echo "Prix de vente :<input type='text' name='prix' value='" . htmlspecialchars($tmp['prix']) . "'><br />";
echo "Description du produit :<input type='text' name='description' value='" . htmlspecialchars($tmp['description']) . "'><br />";
echo "Image (url) :<input type='text' name='image' value='" . htmlspecialchars($tmp['image']) . "'><br />";
echo "<input type='hidden' name='id' value='" . htmlspecialchars($tmp['id']) . "'/>";
echo "<input class='bton' type='submit' name='submit' value='Modifier Item'>";
echo "</form> <br />";
echo "<form method='POST' action='additem.php' >";
echo "<input type='hidden' name='id' value='" . htmlspecialchars($tmp['id']) . "'/>";
echo "<input class='bton' type='submit' name='submit' value='Suprimer Item'>";
echo "</form> <br />";
echo "</div>";
echo "<br />";
}
mysqli_free_result($res);
}
else
	header("Location: ../index.php");
?>
</body>
</html>
