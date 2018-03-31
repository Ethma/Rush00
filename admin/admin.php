<?php
include __DIR__ . '/../config/bdd.php';
if (!$_SESSION['admin'])
	header("Location: index.php");
?>
<a href="additem.php">add item</a>
<a href="deluser.php">Suprimer utilisateur</a>
<a href="cmd.php">Voir commande</a>
