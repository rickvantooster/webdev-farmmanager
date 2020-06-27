<?php

$servername = "51.38.99.211";
$username="farmManager";
$userpassword="-lV8$@7jGnX/";
$dbname="farmmanager";
$charset = 'utf8mb4';

$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$servername;dbname=$dbname;charset=$charset;";
try {
     $pdo = new \PDO($dsn, $username, $userpassword, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$conn = mysqli_connect($servername, $username, $userpassword, $dbname);

if(!$conn){
  die("Connection failed: ".mysqli_connect_error());
  echo "Verbinding mislukt";
}
else {
  echo "Verbinding is gemaakt!";
}
 ?>
