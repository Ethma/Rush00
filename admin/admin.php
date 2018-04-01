<?php
include __DIR__ . '/../config/bdd.php';
session_start();
if (!$_SESSION['admin'])
	header("Location: index.php");
?>
<a href="additem.php">add item</a>
<a href="modif_user.php">Modifier utilisateur</a>
<a href="cmd.php">Voir commande</a>
