<?PHP
include __DIR__ . '/../config/bdd.php';
if ($_POST['nom'] && $_POST['prix'] && $_POST['description'] && $_POST['submit'] && $_POST['submit'] === "OK")
{
	$nom = mysqli_real_escape_string($bdd, $_POST['nom']);
	$prix = floatval($_POST['prix']);
	$description = mysqli_real_escape_string($bdd, $_POST['description']);
	$img = mysqli_real_escape_string($bdd, $_POST['img']);
	$req = "INSERT INTO Item (nom, prix, description, image) VALUES('" . $nom . "', '" . $prix . "', '" . $description . "', '" . $img . "')";
	$result = mysqli_query($bdd, $req);
	mysqli_free_result($result);
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
			$sql = "UPDATE Users SET prix='" .$prix . "'WHERE id='" . $id . "'";
			mysqli_query($bdd, $sql);
		}
		if (!(empty($_POST['description'])))
		{
			$description = mysqli_real_escape_string($bdd, $_POST['description']);
			$sql = "UPDATE Users SET description='" .$description . "'WHERE id='" . $id . "'";
			mysqli_query($bdd, $sql);
		}
		if (!(empty($_POST['image'])))
		{
			$image = mysqli_real_escape_string($bdd, $_POST['image']);
			$sql = "UPDATE Users SET image='" .$image . "'WHERE id='" . $id . "'";
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
			echo "Champ Nom manquand. <br />";
		if (!$_POST['prix'])
			echo "Champ Prix manquand. <br />";
		if (!$_POST['description'])
			echo "Champ description manquand. <br />";
	}
?>
<html><body>
<form method="POST" action="additem.php" >
Nom : <input type='text' name='nom' value=''/>
<br />
Prix: <input type='text' name='prix' value=''/>
<br />
description: <input type='text' name='description' value=''/>
<br />
image (url): <input type='text' name='img' value=''/>
<br />
<input type='submit' name='submit' value='OK'>
</form>
</body>
</html>
<?php
$req = "SELECT id, nom, prix, description, image FROM Item";
$res = mysqli_query($bdd, $req);
while ($tmp = mysqli_fetch_assoc($res)) {
echo "<form method='POST' action='additem.php' >";
echo "Prenom :<input type='text' name='nom' value='" . $tmp['nom'] . "'><br />";
echo "Nom :<input type='text' name='prix' value='" . $tmp['prix'] . "'><br />";
echo "Email :<input type='text' name='description' value='" . $tmp['description'] . "'><br />";
echo "Email :<input type='text' name='image' value='" . $tmp['image'] . "'><br />";
echo "<input type='hidden' name='id' value='" . $tmp['id'] . "'/>";
echo "<input type='submit' name='submit' value='Modifier Item'>";
echo "</form> <br />";
echo "<form method='POST' action='additem.php' >";
echo "<input type='hidden' name='id' value='" . $tmp['id'] . "'/>";
echo "<input type='submit' name='submit' value='Suprimer Item'>";
echo "</form> <br />";
}
mysqli_free_result($res);
?>
