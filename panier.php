<?PHP
include("header.php");
include __DIR__ . '/../config/bdd.php';
	if (isset($_GET['id']))
	{
		unset($_SESSION['panier'][$_GET['id']]);
	}
	$total = 0;
	if (isset($_SESSION['panier'])) {
	foreach($_SESSION['panier'] as $k => $v)
	{
		$sql = "SELECT nom, prix, description, image FROM Item WHERE id='" . $k . "'";
		$result = mysqli_query($bdd, $sql);
		while ($tmp = mysqli_fetch_assoc($result)) {
		$total += ($tmp['prix'] * $v);
		echo "Nom : " . $tmp['nom'] . "<br />";
		echo "prix : " . $tmp['prix'] . "<br />";
		echo "Description : " . $tmp['description'];
		echo "<br />quantite : " . $_SESSION['panier'][$k];
		echo "<br />.......................<br />";
		echo "<a href='panier.php?id=" . $k . "'>Retirer du panier</a>";
		}
		mysqli_free_result($result);
	}
	echo "<br />Total :" . $total . "<br />";
	}
	else
	echo "Panier vide.";
	?>
<form method="POST" action="val_cmd.php" >
<input type='submit' name='submit' value='Valider pannier'>
<?PHP
include("footer.php");
?>
