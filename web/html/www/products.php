<html>
<style>
   table,
   th,
   td {
     background-color:blue;
     padding: 10px;
     border: 1px solid black;
     border-collapse: collapse;
  }
</style>

<head>
<title>Catalogue WoodyToys</title>
</head>

<body>
<h1>Catalogue WoodyToys</h1>

<?php
// Charger les variables d'environnement
$dbname = getenv('MARIADB_DATABASE');
$dbuser = getenv('MARIADB_USER');
$dbpass = getenv('MARIADB_PASSWORD');
$dbhost = getenv('MARIADB_HOST');

// Connexion à la base de données
$connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to '$dbhost'");

// Sélection de la base de données
mysqli_select_db($connect, $dbname) or die("Could not open the database '$dbname'");

// Exécution de la requête SQL pour récupérer les produits
$result = mysqli_query($connect, "SELECT id, product_name, product_price FROM products");

?>

<table>
<tr>
 <th>Numéro de produit</th>
 <th>Descriptif</th>
 <th>Prix</th>
</tr>

<?php
// Affichage des résultats dans un tableau
while ($row = mysqli_fetch_array($result)) {
  printf("<tr><td>%s</td> <td>%s</td> <td>%s</td></tr>", $row[0], $row[1],$row[2]);
}
?>

</table>
</body>
</html>

