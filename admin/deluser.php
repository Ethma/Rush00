<?php
session_start();
include __DIR__ . '/../header.php';
include __DIR__ . '/../config/bdd.php';
if (!$_SESSION['admin'])
	header("Location: index.php");
if(isset($_POST['id']))
{
	if (isset($_POST['submit']) && $_POST['submit'] === 'Suprimer Utilisateur')
	{
		$sql = "DELETE FROM Users WHERE id='" . $_POST['id'] . "'";
		$result = mysqli_query($bdd, $sql);
		mysqli_free_result($result);
	}
	else if (isset($_POST['submit']) && $_POST['submit'] === 'Modifier Utilisateur')
	{
		if (!empty($_POST['passwd']))
	}

$req = "SELECT firstname, lastname, email, passwd, id FROM Users WHERE id='" . $_GET['id'] . "'";
$res = mysqli_query($bdd, $req);
while ($tmp = mysqli_fetch_assoc($res)) {
echo "<form method='POST' action='deluser.php' >";
echo "<input type='text' name='firstname' value='" . $tmp['firstname'] . "'>";
echo "<input type='text' name='lastname' value='" . $tmp['lastname'] . "'>";
echo "<input type='text' name='email' value='" . $tmp['email'] . "'>";
echo "<input type='text' name='email' value=''>";
echo "<input type='hidden' name='id' value='" . $tmp['id'] . "'/>";
echo "<input type='submit' name='submit' value='Modifier Utilisateur'>";
echo "</form> <br />";
echo "<form method='POST' action='deluser.php' >";
echo "<input type='hidden' name='id' value='" . $tmp['id'] . "'/>";
echo "<input type='submit' name='submit' value='Suprimer Utilisateur'>";
echo "</form> <br />";

}
}
mysqli_free_result($res);
include("footer.php");
?>
