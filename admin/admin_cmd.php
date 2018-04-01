<?php
include("header.php");
session_start();
include __DIR__ . '/../config/bdd.php';
if (!isset($_SESSION['admin']))
	header("Location: ../index.php");
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
	echo "<div class='additem'>";
	while ($t = mysqli_fetch_assoc($res)) {
		$itemid = mysqli_real_escape_string($bdd, $t['item_id']);
		$sql = "SELECT nom, prix, description, image FROM Item WHERE id='" . $itemid . "'";
		$result = mysqli_query($bdd, $sql);
		while ($tmp = mysqli_fetch_assoc($result)) {
			$total += ($tmp['prix'] * $t['qte']);
			echo "Nom : " . htmlspecialchars($tmp['nom']) . "<br />";
			echo "prix : " . htmlspecialchars($tmp['prix']) . "€<br />";
			echo "Quantité : " . htmlspecialchars($t['qte']) ."<br /><br />";
		}
		mysqli_free_result($result);
	}
	echo "<br /><h3>Total: " . htmlspecialchars($total) . "€</h3><br />";
	echo "</div>";
?>
<form method="POST" action="admin_cmd.php" >
<?php echo "<input type='hidden' name='id' value='" .  $_GET['id'] . "'>";?>
<br />
<input type='submit' class='btn' name='submit' value='Commande traitee'>
</form>
<?PHP
}
?>
