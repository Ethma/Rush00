<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/touch.css">
<link rel="stylesheet" type="text/css" href="../style/footer.css">
</head>
<body style="width: 900px;margin-left:30%;">
<header>
<?php
session_start();
if (isset($_SESSION['loged']) && $_SESSION['loged'] == true)
{
echo "Mon compte : <a href='users/modif.php'>" . htmlspecialchars($_SESSION['firstname']) . "</a>";
?>
<a href="panier.php"><span class='btn'>Votre panier</span></a>
<a href="users/logout.php"><span class='btn'>Déconnexion</span></a>
<?PHP
if (isset($_SESSION['admin']))
echo "<a href='admin/admin.php'>Administration</a>";
}
else
{
?>
<br />
<a href='../index.php'><IMG SRC="https://www.freelogoservices.com/api/main/ph/zjHl2lgef9cYrQL0JFa7kzbw2vuErRBKmhzI0Dd9OXdE9g5shnN1i...Bv9ettdV9dsBUGw0pY"><a />
<br />
<a href="./login.php"><span class='btn'>Connexion</span></a>
<br />
<br />
<br />
<a href="../panier.php"><span class='btn'>Accéder au panier</span></a>
<br />
<br />
<br />
<?PHP
}
?>
</header>
</html>
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
		echo "<div class='info'>";
		if (empty($_POST['firstname']))
			echo "Champ Prénom manquant. <br />";
		if (empty($_POST['lastname']))
			echo "Champ Nom manquant. <br />";
		if (empty($_POST['mail']))
			echo "Champ Mail manquant. <br />";
		if (empty($_POST['passwd']))
			echo "Champ mot de passe manquant. <br />";
		echo "</div>";
		echo "<br />";
	}
?>
<html><body>
<div class='con additem'>
<form method="POST" action=create.php >
Prénom: <input type='text' name='firstname' value=''/>
<br />
Nom: <input type='text' name='lastname' value=''/>
<br />
Adresse mail: <input type='text' name='mail' value=''/>
<br />
Mot de passe: <input type='password' name='passwd' value=''/>
<br />
<input type='submit' name='submit' value="OK">
<br /> 
</form>
</div>
</body>
</html>
<?php
}
?>
