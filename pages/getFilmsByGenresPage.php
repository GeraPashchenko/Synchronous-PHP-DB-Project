<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Films</title>
</head>
<body>
<?php
include("../scripts/dbConnect.php");

$genreSql = 'SELECT `title` FROM `genre`';

echo '<form method="get" action= "../scripts/getFilmsByGenres.php">';

echo "<select name='name'><option> Выбрать жанр </option>";

foreach($db->query($genreSql) as $row) {
    echo "<option value='" . $row['title'] . "'>" . $row['title'] . "</option>";
}

echo "</select>";
echo '<input type="submit" value="ОК"><br>'
?>
</body>
</html>



