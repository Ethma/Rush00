<?php
include("header.php");
include __DIR__ . '/config/bdd.php';
if (isset($_POST['submit']) && isset($_SESSION['loged']))
{
	if (!isset($_SESSION['cmd']))
	{
		$sql = "INSERT INTO Commande (user_id) VALUE('" . $_SESSION['userid'] . "')";
		$res = mysqli_query($bdd, $sql);
		$id = mysqli_insert_id($bdd);
		$_SESSION['cmd'] = $id;
		mysqli_free_result($res);
	}
	else
	{
		$id = $_SESSION['cmd'];
		$sql = "DELETE FROM Panier WHERE id='" . $id . "'";
		$result2 = mysqli_query($bdd, $sql);
	}
	if (isset($_SESSION['panier'])){
		foreach($_SESSION['panier'] as $k => $v)
		{
			$sql = "INSERT INTO Panier (id, item_id, qte) VALUE('" . $id . "', '" . $k . "', '" . $v . "')";
			$result = mysqli_query($bdd, $sql);
		}
	}
}
else
	echo "Connectez vous pour valider votre panier.";
include("footer.php");
?>
