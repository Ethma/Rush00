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
	if (!empty($_POST['firstname']))
	{
		$firstname = mysqli_real_escape_string($bdd, $_POST['firstname']);
		$sql = "UPDATE Users SET firstname='" . $firstname . "' WHERE id='" . $_SESSION['userid'] . "'";
		$result = mysqli_query($bdd, $sql);
	}
	if (!empty($_POST['lastname']))
	{
		$lastname = mysqli_real_escape_string($bdd, $_POST['lastname']);
		$sql = "UPDATE Users SET lastname='" . $lastname . "' WHERE id='" . $_SESSION['userid'] . "'";
		$result = mysqli_query($bdd, $sql);
	}
	if (!empty($_POST['email']))
	{
		$email = mysqli_real_escape_string($bdd, $_POST['email']);
		$sql = "UPDATE Users SET email='" . $email . "' WHERE id='" . $_SESSION['userid'] . "'";
		$result = mysqli_query($bdd, $sql);
	}
	if (!empty($_POST['newpw']))
	{
		$newpw = hash('whirlpool', $_POST['newpw']);
		$sql = "UPDATE Users SET passwd='" . $newpw . "' WHERE id='" . $_SESSION['userid'] . "'";
		$result = mysqli_query($bdd, $sql);
	}
	echo "Compte mis à jour.";
}
?>
<html>
<body>
<a href="../panier.php"><span class="btn">>Accéder au panier</span></a>
<?PHP
if (isset($_SESSION['admin']))
	echo "<a href='../admin/admin.php'><span class='btn'>>Administration</span></a>";
?>
<a href="logout.php"<span class="btn">>Déconnexion</span></a>
<br /><br />
<div class='additem con'>
<form method="POST" action="modif.php" >
Nom :<input type='text' name='firstname' value=''/>
<br />
Prénom :<input type='text' name='lastname' value=''/>
<br />
Email :<input type='text' name='email' value=''/>
<br />
Nouveau mot de passe: <input type='password' name='newpw' value=''/>
<br />
<input class='bton' type='submit' name='submit' value='OK'>
</form>
<form method="POST" action="modif.php" >
<input class='bton' type='submit' name='submit' value='Supprimer'>
</form>
</div>
<br />
</body>
</html>
<?PHP
}
else
	header("Location: ../index.php");
?>