<?php
include("header.php");
?>
<?PHP
if ($_POST['submit'] && $_POST['submit'] === "Ajouter au panier")
{
	$qte = 0;
	if ($_POST['qte'])
		$qte = intval($_POST['qte']);
	if ($qte > 0)
	{
		if (!isset($_SESSION['panier']))
			$_SESSION['panier'] = array();
		if (!isset($_SESSION['panier'][$_POST['id']]))
			$_SESSION['panier'][$_POST['id']] = 0;
		$_SESSION['panier'][$_POST['id']] += $qte;
		echo "<br />";
		echo "Votre sélection a été ajoutée au panier.";
	}
	else
		echo "Rien n'a été ajouté au panier.";
}
else
	header("Location: index.php");
include("footer.php");
?>
