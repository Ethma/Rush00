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
		echo "Votre Selection a ete ajoute au panier.";
	}
	else
		echo "pas ajoute.";
}
else
	header("Location: index.php");
include("footer.php");
?>
