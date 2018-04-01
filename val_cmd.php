<?php
include("header.php");
include __DIR__ . '/config/bdd.php';
if (isset($_POST['submit']) && isset($_SESSION['loged']))
{
	if ($_POST['submit'] === 'Valider panier')
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
				$sql = "INSERT INTO Commande (id, user_id, item_id, qte) VALUE('" . $id . "', '" . mysqli_real_escape_string($bdd, $_SESSION['userid']) . "', '" . $k . "', '" . $v . "')";
				mysqli_query($bdd, $sql);
				unset($_SESSION['panier']);
			}
		}
	}
}
else
	echo "<br /><div class='info'>Connectez-vous pour valider votre panier.</div>";
include("footer.php");
?>
