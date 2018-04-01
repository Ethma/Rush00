<?php
include("header.php");
include __DIR__ . '/../config/bdd.php';
session_start();
if (!$_SESSION['admin'])
	header("Location: index.php");
?>
<a href="additem.php"><span class='btn'>>add item</span></a></br />
</br />
</br />
<a href="modif_user.php"><span class='btn'>>Suprimer utilisateur</span></a><br />
</br />
</br />
<a href="cmd.php"><span class='btn'>>Voir commande</span></a>
