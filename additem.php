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
else
{
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
}
?>
