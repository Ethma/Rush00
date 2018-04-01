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
echo "<form method='POST' action='modif_user.php' >";
echo "<input type='text' name='firstname' value='" . $tmp['firstname'] . "'>";
echo "<input type='text' name='lastname' value='" . $tmp['lastname'] . "'>";
echo "<input type='text' name='email' value='" . $tmp['email'] . "'>";
echo "<input type='text' name='email' value=''>";
echo "<input type='hidden' name='id' value='" . $tmp['id'] . "'/>";
echo "<input type='submit' name='submit' value='Modifier Utilisateur'>";
echo "</form> <br />";
echo "<form method='POST' action='modif_user.php' >";
echo "<input type='hidden' name='id' value='" . $tmp['id'] . "'/>";
echo "<input type='submit' name='submit' value='Suprimer Utilisateur'>";
echo "</form> <br />";
}
mysqli_free_result($res);
include("footer.php");
?>
