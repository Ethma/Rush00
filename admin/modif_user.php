<?php
include("header.php");
session_start();
include __DIR__ . '/../config/bdd.php';
if (!isset($_SESSION['admin']))
	header("Location: ../index.php");
else {
if(isset($_POST['id']))
{
	if (isset($_POST['submit']))
	{
		$id = mysqli_real_escape_string($bdd, $_POST['id']);
		if ($_POST['submit'] === 'Suprimer Utilisateur')
		{
			$sql = "DELETE FROM Users WHERE id='" . $_POST['id'] . "'";
			$result = mysqli_query($bdd, $sql);
			mysqli_free_result($result);
		}
		else if ($_POST['submit'] === 'Modifier Utilisateur')
		{
			if (!(empty($_POST['firstname'])))
			{
				$firstname = mysqli_real_escape_string($bdd, $_POST['firstname']);
				$sql = "UPDATE Users SET firstname='" .$firstname . "'WHERE id='" . $id . "'";
				mysqli_query($bdd, $sql);
			}
			if (!(empty($_POST['lastname'])))
			{
				$lastname = mysqli_real_escape_string($bdd, $_POST['lastname']);
				$sql = "UPDATE Users SET lastname='" .$lastname . "'WHERE id='" . $id . "'";
				mysqli_query($bdd, $sql);
			}
			if (!(empty($_POST['email'])))
			{
				$email= mysqli_real_escape_string($bdd, $_POST['email']);
				$sql = "UPDATE Users SET email='" .$email . "'WHERE id='" . $id . "'";
				mysqli_query($bdd, $sql);
			}
			if (!(empty($_POST['passwd'])))
			{
				$passwd = hash('whirlpool', $_POST['passwd']);
				$sql = "UPDATE Users SET passwd='" .$passwd . "'WHERE id='" . $id . "'";
				mysqli_query($bdd, $sql);
			}
		}
	}
}
else if (isset($_POST['submit']) && $_POST['submit'] === 'Creer Utilisateur')
{
	$firstname = mysqli_real_escape_string($bdd, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($bdd, $_POST['lastname']);
	$mail = mysqli_real_escape_string($bdd, $_POST['email']);
	$passwd = hash('whirlpool', $_POST['passwd']);
	$req = "INSERT INTO Users (firstname, lastname, email, passwd) VALUES('" . $firstname . "', '" . $lastname . "', '" . $mail . "', '" .$passwd . "')";
	mysqli_query($bdd, $req);
}
echo "<div class='additem'>";
echo "<form method='POST' action='modif_user.php' >";
echo "Prénom :<input type='text' name='firstname' value=''><br />";
echo "Nom :<input type='text' name='lastname' value=''><br />";
echo "Email :<input type='text' name='email' value=''><br />";
echo "Mot de passe :<input type='password' name='passwd' value=''><br />";
echo "<input type='submit' name='submit' value='Creer Utilisateur'>";
echo "</form> <br />";
echo "</div>";
echo "<br />";
$req = "SELECT firstname, lastname, email, id FROM Users";
$res = mysqli_query($bdd, $req);
while ($tmp = mysqli_fetch_assoc($res)) {
echo "<div class='additem'>";
echo "<form method='POST' action='modif_user.php' >";
echo "Prénom :<input type='text' name='firstname' value='" . htmlspecialchars($tmp['firstname']) . "'><br />";
echo "Nom :<input type='text' name='lastname' value='" . htmlspecialchars($tmp['lastname']) . "'><br />";
echo "Email :<input type='text' name='email' value='" . htmlspecialchars($tmp['email']) . "'><br />";
echo "Mot de passe :<input type='password' name='passwd' value=''><br />";
echo "<input type='hidden' name='id' value='" . $tmp['id'] . "'/>";
echo "<input type='submit' name='submit' value='Modifier Utilisateur'>";
echo "</form> <br />";
echo "<form method='POST' action='modif_user.php' >";
echo "<input type='hidden' name='id' value='" . $tmp['id'] . "'/>";
echo "<input type='submit' name='submit' value='Suprimer Utilisateur'>";
echo "</form> <br />";
echo "</div>";
echo "<br />";
}
mysqli_free_result($res);
include("footer.php");
}
?>
