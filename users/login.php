<?PHP
include __DIR__ . '/../config/bdd.php';
include ('auth.php');
if (isset($_POST['login']) && isset($_POST['passwd']) && isset($_POST['submit']) && $_POST['submit'] === "OK")
{
	$_SESSION['loged'] = auth($_POST['login'], $_POST['passwd'], $bdd);
	if($_SESSION['loged'])
		header("Location: ../index.php");
}
if (isset($_POST['submit']))
	echo "Login Error <br />";
echo "<html><body>";
echo '<form method="post" action=login.php >';
echo "Identifiant: <input type='text' name='login' value=''/>";
echo "<br />";
echo "Mot de passe: <input type='password' name='passwd' value=''/>";
echo "<br />";
echo "<input type='submit' name='submit' value='OK'>";
echo "<br \>";
echo "</form>";
echo "</html></body>";
?>
