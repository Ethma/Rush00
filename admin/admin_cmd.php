<?php
session_start();
include __DIR__ . '/../header.php';
include __DIR__ . '/../config/bdd.php';
if (!$_SESSION['admin'])
	header("Location: index.php");
if($_GET['id'])
{
	$total = 0;
	$req = "SELECT item_id, qte FROM Panier WHERE id='" . $_GET['id'] . "'";
	$res = mysqli_query($bdd, $req);
	while ($t = mysqli_fetch_assoc($res)) {
		$sql = "SELECT nom, prix, description, image FROM Item WHERE id='" . $t['item_id'] . "'";
		$result = mysqli_query($bdd, $sql);
		while ($tmp = mysqli_fetch_assoc($result)) {
			$total += ($tmp['prix'] * $t['qte']);
			echo "Nom : " . $tmp['nom'] . "<br />";
			echo "prix : " . $tmp['prix'] . "<br />";
			echo "Description : " . $tmp['description'];
			echo "<br />quantite : " . $t['qte'];
			echo "<br />.......................<br />";
		}
		mysqli_free_result($result);
	echo "<br />Total :" . $total . "<br />";
	}
?>
<form method="POST" action="val_cmd.php" >
<input type='submit' name='submit' value='Valider pannier'>
<?PHP
}
?>
