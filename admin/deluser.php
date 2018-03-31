<?php
session_start();
include __DIR__ . '/../config/bdd.php';
if (!$_SESSION['admin'])
	header("Location: index.php");
if($_POST['id'])
{
	$sql = "DELETE FROM Users WHERE id='" . $_POST['id'] . "'";
	$result = mysqli_query($bdd, $sql);
	mysqli_free_result($result);
}
$req = "SELECT firstname, id FROM Users";
$res = mysqli_query($bdd, $req);
while ($tmp = mysqli_fetch_assoc($res)) {
echo "<form method='POST' action='deluser.php' >";
echo "Nom : " . $tmp['firstname'];
echo "<input type='hidden' name='id' value='" . $tmp['id'] . "'/>";
echo "<input type='submit' name='submit' value='Sup Utilisateur'>";
echo "</form> <br />";
}
mysqli_free_result($res);
include("footer.php");
?>
