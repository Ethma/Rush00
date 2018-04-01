<?PHP
include __DIR__ . '/../config/bdd.php';
session_start();
if ($_SESSION['loged'])
{
if (isset($_POST['submit']) && $_POST['submit'] === "Supprimer")
{
	$req = "DELETE FROM Users WHERE id='" . $_SESSION['userid'] . "'";
	mysqli_query($bdd, $req);
	header("Location: logout.php");
}
if (isset($_POST['oldpw']) && isset($_POST['newpw']) && isset($_POST['submit']) && $_POST['submit'] === "OK")
{
	$passwd = hash('whirlpool', $_POST['newpw']);
	$oldpasswd = hash('whirlpool', $_POST['oldpw']);
	$req = "SELECT passwd FROM Users WHERE id='" . $_SESSION['userid'] . "'";
	$result = mysqli_query($bdd, $req);
	while ($tmp = mysqli_fetch_assoc($result)) {
		if ($tmp['passwd'] === $oldpasswd)
		{
			$sql = "UPDATE Users SET passwd='" . $passwd . "' WHERE id='" . $_SESSION['userid'] . "'";
			$result2 = mysqli_query($bdd, $sql);
			mysqli_free_result($result2);
			header("Location: ../index.php");
		}
	}
	$error = "Ancien pass incorrect.";
	mysqli_free_result($result);
}
?>
<html><body>
<?php if (!(empty($error))) {echo $error;}?>
<form method="POST" action="modif.php" >
Ancien mot de passe: <input type='password' name='oldpw' value=''/>
<br />
Nouveau mot de passe: <input type='password' name='newpw' value=''/>
<br />
<input type='submit' name='submit' value='OK'>
</form>
<form method="POST" action="modif.php" >
<input type='submit' name='submit' value='Supprimer'>
</form>
</html></body>
<?PHP
}
else
	header("Location: ../index.php");
?>