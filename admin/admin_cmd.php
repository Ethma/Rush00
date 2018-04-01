<?php
session_start();
include __DIR__ . '/../header.php';
include __DIR__ . '/../config/bdd.php';
if (!$_SESSION['admin'])
	header("Location: index.php");
else if (isset($_POST['id']))
{
	$id = mysqli_real_escape_string($bdd, $_POST['id']);
	$sql = "DELETE FROM Commande WHERE id='" . $id . "'";
	mysqli_query($bdd, $sql);
}
else if (isset($_GET['id']))
{
	$total = 0;
	$id = mysqli_real_escape_string($bdd, $_GET['id']);
	$req = "SELECT item_id, qte FROM Commande WHERE id='" . $id . "'";
	$res = mysqli_query($bdd, $req);
	while ($t = mysqli_fetch_assoc($res)) {
		$sql = "SELECT nom, prix, description, image FROM Item WHERE id='" . $t['item_id'] . "'";
		$result = mysqli_query($bdd, $sql);
		while ($tmp = mysqli_fetch_assoc($result)) {
			$total += ($tmp['prix'] * $t['qte']);
			echo "Nom : " . $tmp['nom'] . "<br />";
			echo "prix : " . $tmp['prix'] . "<br />";
			echo "<br />quantite : " . $t['qte'];
			echo "<br />.......................<br />";
		}
		mysqli_free_result($result);
	echo "<br />Total :" . $total . "<br />";
	}
?>
<form method="POST" action="admin_cmd.php" >
<?php echo "<input type='hidden' name='id' value='" .  $_GET['id'] . "'>";?>
<input type='submit' name='submit' value='Commande traitee'>
</form>
<?PHP
}
?>
