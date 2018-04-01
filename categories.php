<?php
include __DIR__ . '/config/bdd.php';
if (isset($_POST['submit']) && $_POST['submit'] === 'ajouter une categorie' && !(empty($_POST['cate'])) && !(empty($_POST['id'])))
{
	$cate = mysqli_real_escape_string($bdd, $_POST['cate']);
	$id = intval($_POST['id']);
	$req = "INSERT INTO Categories (item_id, nom_categories) VALUES('" . $id . "', '" . $cate . "')";
	$result = mysqli_query($bdd, $req);
	mysqli_free_result($result);
}
header("Location: index.php");
?>