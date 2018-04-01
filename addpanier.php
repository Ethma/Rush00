<?php
include("header.php");
?>
<?PHP
if (isset($_POST['submit']) && $_POST['submit'] === "Ajouter au panier")
{
	$qte = 0;
	if (isset($_POST['qte']))
		$qte = intval($_POST['qte']);
	if ($qte > 0)
	{
		if (!isset($_SESSION['panier']))
			$_SESSION['panier'] = array();
		if (!isset($_SESSION['panier'][$_POST['id']]))
			$_SESSION['panier'][$_POST['id']] = 0;
		$_SESSION['panier'][$_POST['id']] += $qte;
		echo "<br />";
		echo "<div class='pan'>Votre sélection a été ajoutée au panier.</div>";
	}
	else
		echo "<div class='info'>Rien n'a été ajouté au panier.</div>";
}
else
	header("Location: index.php");
include("footer.php");
?>
