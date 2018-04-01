<?php
include("header.php");
include __DIR__ . '/../config/bdd.php';
session_start();
if (!isset($_SESSION['admin']))
	header("Location: ../index.php");
else {
?>
<a href="additem.php"><span class='btn'>>Liste des produits</span></a></br />
</br />
</br />
<a href="modif_user.php"><span class='btn'>>Liste des utilisateurs</span></a><br />
</br />
</br />
<a href="cmd.php"><span class='btn'>>Liste des commandes</span></a>
<?php } ?>
