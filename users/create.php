<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/touch.css">
<link rel="stylesheet" type="text/css" href="../style/footer.css">
</head>
<body class="body">
<header>
<?php
session_start();
if (isset($_SESSION['loged']) && $_SESSION['loged'] == true)
{
echo "Mon compte : <a href='users/modif.php'>" . $_SESSION['firstname'] . "</a>";
?>
<a href="panier.php">  Voir panier</a>
<a href="users/logout.php">Deconnexion</a>
<?PHP
if (isset($_SESSION['admin']))
echo "<a href='admin/admin.php'>administration</a>";
}
else
{
?>
<br />
<a href='/00/index.php'><IMG SRC="https://www.freelogoservices.com/api/main/ph/zjHl2lgef9cYrQL0JFa7kzbw2vuErRBKmhzI0Dd9OXdE9g5shnN1i...Bv9ettdV9dsBUGw0pY"><a />
<br />
<a href="./login.php">Connexion</a>
<a href="panier.php">Voir panier</a>
<?PHP
}
?>
</header>
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
<br /> 
<a href='../index.php'>Accueil<a/>
</form>
</body>
</html>
<?php
}
?>