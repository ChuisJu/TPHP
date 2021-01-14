<?php $link = mysqli_connect("localhost", "root", "", "pokedex");
    if(!$link){
        echo "Erreur : Impossible de se connecter à MySQL." . PHP_EOL;
        echo "Errno de débogage : " . mysqli_connect_errno() . PHP_EOL;
        echo "Erreur de débogage : " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Pokedex</title>
  </head>
  <body>
 <h1>My Pokedex</h1>
 
    <?php

    $req1 = 'SELECT count(*) as total FROM pokemon;' ;
    $result1 = mysqli_query($link, $req1);

    $nbr = mysqli_fetch_array($result1, MYSQLI_ASSOC);

    echo"They are " . $nbr['total'] . " pokemons from the database.";
    echo"<table>";
    echo"<thead>";
    echo"<tr>";
    echo"<th>Sprite</th>";
    echo"<th>ID</th>";
    echo"<th>Name</th>";
    echo"<th>Height</th>";
    echo"<th>Weight</th>";
    echo"<th>Base exp</th>";
    echo"</thead>";
    $req = 'SELECT id, identifier, height, weight, base_experience  FROM pokemon;' ;
    $result = mysqli_query($link, $req);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){       
  
        echo"<tbody>";
        if($row['base_experience']>=200){
          echo"<tr class='super'>";
          echo'<td><img src="sprites/'. $row['identifier'] .'.png" alt="' . $row['identifier'] . '"></td>';
          echo"<td>" . $row['id'] . "</td>";
          echo"<td>" . $row['identifier'] . "</td>";
          echo"<td>" . $row['height'] . "</td>";
          echo"<td>" . $row['weight'] . "</td>";
          echo"<td>" . $row['base_experience'] . "</td>";
          echo"</tr>";
        }
        else{
          echo"<tr>";
          echo'<td><img src="sprites/'. $row['identifier'] .'.png" alt="' . $row['identifier'] . '"></td>';
          echo"<td>" . $row['id'] . "</td>";
          echo"<td>" . $row['identifier'] . "</td>";
          echo"<td>" . $row['height'] . "</td>";
          echo"<td>" . $row['weight'] . "</td>";
          echo"<td>" . $row['base_experience'] . "</td>";
          echo"</tr>";
        }
        echo"</tbody>";
      }
        
      echo"</table>";  
        
            
    ?>
  </body>
</html>
