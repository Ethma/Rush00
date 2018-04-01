<?php
include("header.php");
include __DIR__ . '/config/bdd.php';
if (isset($_POST['submit']) && isset($_SESSION['loged']))
{
	if ($_POST['submit'] === 'Sauvegarder panier')
	{
		if (isset($_SESSION['panier'])){
			$sql = "DELETE FROM Panier WHERE id='" . $_SESSION['userid'] . "'";
			mysqli_query($bdd, $sql);
			foreach($_SESSION['panier'] as $k => $v)
			{
				$sql = "INSERT INTO Panier (id, item_id, qte) VALUE('" . $_SESSION['userid'] . "', '" . $k . "', '" . $v . "')";
				mysqli_query($bdd, $sql);
			}
		}
	}
	else if ($_POST['submit'] === 'Valider panier')
	{
		if (isset($_SESSION['panier'])){
			$id = 0;
			$req = "SELECT id FROM Commande";
			$result = mysqli_query($bdd, $req);
			while ($tmp = mysqli_fetch_assoc($result)) {
				$id = $tmp['id'];
			}
			$id = $id + 1;
			mysqli_free_result($result);
			foreach($_SESSION['panier'] as $k => $v)
			{
				$sql = "INSERT INTO Commande (id, user_id, item_id, qte) VALUE('" . $id . "', '" . $_SESSION['userid'] . "', '" . $k . "', '" . $v . "')";
				mysqli_query($bdd, $sql);
				$sql2 = "DELETE FROM Panier WHERE id='" . $_SESSION['userid'] . "'";
				mysqli_query($bdd, $sql2);
				unset($_SESSION['panier']);
			}
		}
	}
}
else
	echo "Connectez vous pour valider votre panier.";
include("footer.php");
?>
