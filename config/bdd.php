<?php
$bdd = mysqli_connect(null, 'root', 'bdroot', 'shoop', 0, '/Users/vguillem/goinfre/mamp/mysql/tmp/mysql.sock');
if(!$bdd)
die("connection failed: " . mysqli_connect_error());
?>
