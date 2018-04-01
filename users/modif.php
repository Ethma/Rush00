<?PHP
include("header.php");
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
if (isset($_POST['submit']) && $_POST['submit'] === "OK")
{
	if (isset($_POST['firstname']))
	{
		$firstname = mysqli_real_escape_string($bdd, $_POST['firstname']);
		$sql = "UPDATE Users SET firstname='" . $firstname . "' WHERE id='" . $_SESSION['userid'] . "'";
		$result = mysqli_query($bdd, $sql);
	}
	if (isset($_POST['lastname']))
	{
		$lastname = mysqli_real_escape_string($bdd, $_POST['lastname']);
		$sql = "UPDATE Users SET lastname='" . $lastname . "' WHERE id='" . $_SESSION['userid'] . "'";
		$result = mysqli_query($bdd, $sql);
	}
	if (isset($_POST['email']))
	{
		$email = mysqli_real_escape_string($bdd, $_POST['email']);
		$sql = "UPDATE Users SET email='" . $email . "' WHERE id='" . $_SESSION['userid'] . "'";
		$result = mysqli_query($bdd, $sql);
	}
	if (isset($_POST['newpw']))
	{
		$passwd = hash('whirlpool', $_POST['newpw']);
		$sql = "UPDATE Users SET password='" . $newpw . "' WHERE id='" . $_SESSION['userid'] . "'";
		$result = mysqli_query($bdd, $sql);
	}
	echo "compte mis a jour.";
}
?>
<html><body>
<?php if (!(empty($error))) {echo $error;}?>
<form method="POST" action="modif.php" >
Nom :<input type='text' name='firstname' value=''/>
<br />
Prenom :<input type='text' name='lastname' value=''/>
<br />
Email :<input type='text' name='email' value=''/>
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
