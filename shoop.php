<div id="shoop">
<?php
include __DIR__ . '/config/bdd.php';
if (isset($_POST['submit']) && $_POST['submit'] === "Filtrer" && $_POST['Categories'] !== "")
{
	$c = mysqli_real_escape_string($bdd, $_POST['Categories']);
	$sql = "SELECT i.image, i.nom, i.prix, i.description FROM Item i INNER JOIN Categories c ON i.id = c.item_id WHERE c.nom_categories = '" . $c . "'";
	$result = mysqli_query($bdd, $sql);
	while ($tmp = mysqli_fetch_assoc($result)) {
		$img = $tmp['image'];
		$nom = $tmp['nom'];
		$description = $tmp['description'];
		$prix = $tmp['prix'];
	echo "<a href='produit.php?p=" . $img . "'><img style='height:300' src='http://" . $img . "'></a><br />";
	echo "Nom : " . $nom . "<br />";
	echo "prix : " . $prix . "<br />";
	echo "Description : " . $description;
	echo "<br />----------------------------------------<br />";
	}
	mysqli_free_result($result);
}
else
{
?>
<a href="produit.php?p=5.196.225.53/img/klim-aim.png"><img style="height:200px" src="http://5.196.225.53/img/klim-aim.png" alt="nouveau produit"></a>
<a href="produit.php?p=5.196.225.53/img/klim-chroma.png"><img style="height:200px" src="http://5.196.225.53/img/klim-chroma.png" alt="produit en solde"></a>
<?PHP
}
?>
<form method="POST" action="index.php" >
<SELECT name="Categories">
<OPTION>
<?PHP
	$cat = array();
	$sql2 = "SELECT nom_categories FROM Categories";
	$result2 = mysqli_query($bdd, $sql2);
	while ($tmp2 = mysqli_fetch_assoc($result2)) {
		$is = 0;
		foreach($cat as $v)
		{
			if ($v === $tmp2['nom_categories'])
				$is = 1;
		}
		if ($is === 0)
		{
			array_push($cat, $tmp2['nom_categories']);
			echo "<OPTION>" . $tmp2['nom_categories'];
		}
	}
?>
</SELECT>
<input type='submit' name='submit' value='Filtrer'>
<?PHP
?>
<?PHP
?>
</div>
</body>
</html>
