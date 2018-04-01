<a href='../index.php'>Accueil</a>
<?php
if($_POST['submit'])
{
	$conn = mysqli_connect(null, 'root', 'bdroot', NULL, 0, '/Users/vguillem/goinfre/mamp/mysql/tmp/mysql.sock');
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "CREATE DATABASE IF NOT EXISTS shoop";
	if (mysqli_query($conn, $sql)) {
		echo "Database created successfully\n";
	} else {
		echo "Error creating database: " . mysqli_error($conn);
	}
	mysqli_close($conn);
	$bdd = mysqli_connect(null, 'root', 'bdroot', 'shoop', 0, '/Users/vguillem/goinfre/mamp/mysql/tmp/mysql.sock');
	if(!$bdd)
		die("connection failed: " . mysqli_connect_error());
	$req = mysqli_query($bdd, 'CREATE TABLE IF NOT EXISTS Users (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, email VARCHAR(50), passwd VARCHAR(128))');
	mysqli_free_result($req);
	$req = mysqli_query($bdd, 'CREATE TABLE IF NOT EXISTS Item (id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, nom VARCHAR(30) NOT NULL, prix float NOT NULL, description VARCHAR(255), image varchar(255) DEFAULT NULL)');
	mysqli_free_result($req);
	$req = mysqli_query($bdd, 'CREATE TABLE IF NOT EXISTS Admin (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, users_id INT(6) NOT NULL)');
	mysqli_free_result($req);
	$req = mysqli_query($bdd, 'CREATE TABLE IF NOT EXISTS Categories (id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, item_id INT(10) NOT NULL, nom_categories VARCHAR(30))');
	mysqli_free_result($req);
	$req = mysqli_query($bdd, 'CREATE TABLE IF NOT EXISTS Commande (id INT(10) UNSIGNED, user_id INT(10) NOT NULL, item_id INT(10) NOT NULL, qte INT(10))');
	mysqli_free_result($req);
	$sql = "INSERT INTO Item (nom, prix, description, image)
		VALUES ('Blackwidow', '150', 'Razer BlackWidow Chroma V2 (2017) - Clavier Gaming Mécanique, Rétro-Éclairage RGB - Green Switch (Tactile & Clicky) - AZERTY-Layout', '5.196.225.53/img/razer-blackwidow.png');";
	$sql .= "INSERT INTO Item (nom, prix, description, image)
		VALUES ('Mamba', '80', 'RAZER Mamba Tournament Edition - Éclairage RGB Souris Gaming Mouse, Capteur 16.000 dpi, 9 Boutons Programmables', '5.196.225.53/img/razer-mamba.png');";
	$sql .= "INSERT INTO Item (nom, prix, description, image)
		VALUES ('skill', '26', 'KLIM Skill Souris Gamer Haute Précision - Nouveauté - USB Filaire - DPI ajustables - Boutons Programmables - Confortable pour toute taille de main - Excellent grip Noir', '5.196.225.53/img/klim-skill.png');";
	$sql .= "INSERT INTO Item (nom, prix, description, image)
		VALUES ('puma', '60', 'KLIM Puma - Micro Casque Gamer - NOUVEAU - Son 7.1 - Audio Très Haute Qualité - Vibrations intégrées - Comfortable - Parfait pour Gaming PC et PS4', '5.196.225.53/img/klim-puma.png');";
	$sql .= "INSERT INTO Item (nom, prix, description, image)
		VALUES ('mantis', '40', 'KLIM Mantis - Micro Casque Gamer - USB 7.1 - Haute Qualité - Pour Gaming PC PS4 ', '5.196.225.53/img/klim-mantis.png');";
	$sql .= "INSERT INTO Item (nom, prix, description, image)
		VALUES ('Impact', '40', 'KLIM IMPACT - Casque gamer USB - Son 7.1 Surround + Isolation - Audio Haute Qualité + Fortes Basses - Micro Casque Gaming Jeux Vidéo pour PC PS4', '5.196.225.53/img/klim-impact.png');";
	$sql .= "INSERT INTO Item (nom, prix, description, image)
		VALUES ('Domination', '60', 'KLIM Domination - Clavier Mécanique AZERTY RGB - NOUVEAU - Blue Switches - Frappe Rapide, Précise, Agréable - Garantie 5 ans - Gaming Clavier - PERSONNALISATION DES COULEURS TOTALES', '5.196.225.53/img/klim-domination.png');";
	$sql .= "INSERT INTO Item (nom, prix, description, image)
		VALUES ('Chroma', '30', 'KLIM Chroma Clavier Gamer AZERTY FRANÇAIS Filaire USB - Haute Performance - [ Version 2018 ] Éclairé chromatique Gaming Noir RGB PC Windows, Mac ', '5.196.225.53/img/klim-chroma.png');";
	$sql .= "INSERT INTO Item (nom, prix, description, image)
		VALUES ('AIM', '25', 'KLIM AIM Chroma RGB Gaming Mouse - NEW - PRECISE - Wired USB - Adjustable 500 to 7000 DPI - Programmable Buttons - Comfortable for all hand sizes - Ambidextrous Excellent grip Gamer Gaming', '5.196.225.53/img/klim-aim.png');";
	$sql .= "INSERT INTO Item (nom, prix, description, image)
		VALUES ('Electra-v2', '60', 'Le casque-micro Razer Electra v2 est destiné à ceux qui jouent tout le temps et partout : connectez-le simplement au port Jack audio 3.5 mm de votre PC, de votre ordinateur portable, de votre tablette ou de votre smartphone', '5.196.225.53/img/razer-tiamat.png');";
	$sql .= "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('1', 'clavier');";
	$sql .= "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('2', 'souris');";
	$sql .= "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('3', 'souris');";
	$sql .= "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('4', 'casque');";
	$sql .= "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('5', 'casque');";
	$sql .= "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('6', 'casque');";
	$sql .= "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('7', 'clavier');";
	$sql .= "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('8', 'clavier');";
	$sql .= "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('9', 'souris');";
	$sql .= "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('10', 'casque');";
	$sql .= "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('1', 'razer');";
	$sql .= "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('2', 'razer');";
	$sql .= "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('3', 'Klim');";
	$sql .= "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('4', 'Klim');";
	$sql .= "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('5', 'Klim');";
	$sql .= "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('6', 'Klim');";
	$sql .= "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('7', 'Klim');";
	$sql .= "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('8', 'Klim');";
	$sql .= "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('9', 'Klim');";
	$sql .= "INSERT INTO Categories (item_id, nom_categories)
		VALUES ('10', 'razer');";
	$sql .= "INSERT INTO Users (firstname, lastname, email, passwd)
		VALUES ('admin', 'admin', 'admin', '6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94');";
	$sql .= "INSERT INTO Admin (users_id)
		VALUES ('1');";
	if (mysqli_multi_query($bdd, $sql)) {
		    echo "insert ok \n";
	} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($bdd);
	}
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
