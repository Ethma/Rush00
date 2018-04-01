<?php
include("header.php");
session_start();
if (!isset($_SESSION['admin']))
	header("Location: ../index.php");
else {
include __DIR__ . '/../config/bdd.php';
echo "<h1>Liste des commandes utilisateur</h1>";
$cmd = array();
$sql = "SELECT * FROM Commande";
$result = mysqli_query($bdd, $sql);
while ($tmp = mysqli_fetch_assoc($result)) {
	$req = "SELECT firstname FROM Users WHERE id='" . $tmp['user_id'] . "'";
	$result2 = mysqli_query($bdd, $req);
	while ($tmp2 = mysqli_fetch_assoc($result2)) {
		$user = $tmp2['firstname'];
	}
	if (!(in_array($tmp['id'], $cmd)))
	{
		echo "<a class='btn' href='admin_cmd.php?id=" . $tmp['id'] . "'>" . $user . "</a><br /><br /><br />";
		array_push($cmd, $tmp['id']);
	}
}
}
?>
