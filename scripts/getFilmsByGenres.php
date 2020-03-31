<?php 
include("dbConnect.php");

$name = $_GET['name'];

$stmt = $db->prepare("SELECT * from `FILM` where `ID_FILM` IN (SELECT `FID_FILM` from `FILM_GENRE` where `FID_Genre` = (SELECT `ID_Genre` FROM `genre` WHERE `title` = ?));");
$stmt->execute(array($name));

print "<table border='1'><tr><caption> Фильмы с жанром $name <br></caption><th> Film </th></tr>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print "<tr><td>$row[name]</td></tr>";
}
?>