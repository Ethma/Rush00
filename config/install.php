<?php
if($_POST['submit'])
{
	$conn = mysqli_connect(null, 'root', 'bdroot', NULL, 0, '/Users/mabessir/goinfre/mamp/mysql/tmp/mysql.sock');
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "CREATE DATABASE IF NOT EXISTS shoop";
	if (mysqli_query($conn, $sql)) {
		echo "Database created successfully";
	} else {
		echo "Error creating database: " . mysqli_error($conn);
	}
	mysqli_close($conn);

	$bdd = mysqli_connect(null, 'root', 'bdroot', 'shoop', 0, '/Users/mabessir/goinfre/mamp/mysql/tmp/mysql.sock');
	if(!$bdd)
		die("connection failed: " . mysqli_connect_error());
	$req = mysqli_query($bdd, 'CREATE TABLE IF NOT EXISTS Users (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(30) NOT NULL, LASTNAME VARCHAR(30) NOT NULL, email VARCHAR(50), passwd VARCHAR(128))');
	mysqli_free_result($req);

	$req = mysqli_query($bdd, 'CREATE TABLE IF NOT EXISTS Item (id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, nom VARCHAR(30) NOT NULL, prix float NOT NULL, description VARCHAR(255), image varchar(255) DEFAULT NULL)');
	mysqli_free_result($req);

	$req = mysqli_query($bdd, 'CREATE TABLE IF NOT EXISTS Admin (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, Users_id INT(6) NOT NULL)');
	mysqli_free_result($req);

	$req = mysqli_query($bdd, 'CREATE TABLE IF NOT EXISTS Categories (id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, item_id INT(10) NOT NULL, nom_categories VARCHAR(30))');
	mysqli_free_result($req);

	$req = mysqli_query($bdd, 'CREATE TABLE IF NOT EXISTS Commande (id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, user_id INT(10) NOT NULL)');
	mysqli_free_result($req);

	$req = mysqli_query($bdd, 'CREATE TABLE IF NOT EXISTS Panier (id INT(10) UNSIGNED, item_id INT(10) NOT NULL, qte INT(10))');
	mysqli_free_result($req);
}
else
{
?>
<form action="install.php" method="post">
<input style="height:100px;width:200px;margin-top:20%;margin-left:45%;" type="submit" name="submit" value="Installation" />
</form>
<?php
}
?>
