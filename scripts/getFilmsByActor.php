<?php 
include("dbConnect.php");

$name = $_GET['name'];

$stmt = $db->prepare("SELECT * FROM film WHERE ID_FILM IN (SELECT FID_FILM FROM FILM_ACTOR WHERE FID_Actor = (SELECT ID_Actor FROM Actor Where name = ?));");
$stmt->execute(array($name));

print "<table border='1'><tr><caption> Фильмы с актером $name <br></caption><th> Фильмы </th></tr>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print "<tr><td>$row[name]</td></tr>";
}
?>