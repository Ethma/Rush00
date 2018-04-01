<?PHP
include __DIR__ . '/../config/bdd.php';
if (!(empty($_POST['firstname'])) && !(empty($_POST['passwd'])) && !(empty($_POST['lastname'])) && !(empty($_POST['mail'])) && !(empty($_POST['submit'])) && $_POST['submit'] === "OK")
{
	header("Location: ../index.php");
	$firstname = mysqli_real_escape_string($bdd, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($bdd, $_POST['lastname']);
	$mail = mysqli_real_escape_string($bdd, $_POST['mail']);
	$passwd = hash('whirlpool', $_POST['passwd']);
	$req = "INSERT INTO Users (firstname, lastname, email, passwd) VALUES('" . $firstname . "', '" . $lastname . "', '" . $mail . "', '" .$passwd . "')";
	$result = mysqli_query($bdd, $req);
	mysqli_free_result($result);
}
else
{
	if (isset($_POST['submit']) && $_POST['submit'] === "OK")
	{
		if (empty($_POST['firstname']))
			echo "Champ Prenom manquant. <br />";
		if (empty($_POST['lastname']))
			echo "Champ Nom manquant. <br />";
		if (empty($_POST['mail']))
			echo "Champ Mail manquant. <br />";
		if (empty($_POST['passwd']))
			echo "Champ Password manquant. <br />";
	}
?>
<html><body>
<form method="POST" action=create.php >
Prenom: <input type='text' name='firstname' value=''/>
<br />
Nom: <input type='text' name='lastname' value=''/>
<br />
Adresse mail: <input type='text' name='mail' value=''/>
<br />
Mot de passe: <input type='password' name='passwd' value=''/>
<br />
<input type='submit' name='submit' value='OK'>
</form>
</body>
</html>
<?php
}
?>
