<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Films</title>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  
</head>
<body>
<?php
include("../scripts/dbConnect.php");

$actorSql = 'SELECT `name` FROM `actor`';

echo '<form name = "actor" method="get" action ="../scripts/getFilmsByActor.php">';

echo "<select name='name'><option> Выбрать актера </option>";

foreach($db->query($actorSql) as $row) {
    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
}

echo "</select>";
echo '<input type="submit" value="ОК"><br>'
?>

<div id = "response"></div>


<script>
  var servRes = document.querySelector("#response");
  document.forms.actor.onsubmit = function(e){
    e.preventDefault(); // отмена перехода по юрл
    var userChoise = document.forms.actor.name.textContent;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', "../scripts/getFilmsByActor.php" + "name" + userChoise);

    xhr.onreadystatechange = function(){
      if(xhr.readystate === 4 && xhr.status === 200){
        servRes.textContent = xhr.responseText;
      }
    }

    xhr.send();


  };
</script>
</body>
</html>



