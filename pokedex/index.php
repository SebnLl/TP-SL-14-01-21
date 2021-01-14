<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Pokedex</title>
  </head>
  <body>
 <h1>My Pokedex</h1>

 <?php //nombre de pokemons
 {
 $link = mysqli_connect("localhost","root","","pokedex");
 }
 if(!$link){
 echo "Erreur : Impossible de se connecter à MySQL." .PHP_EOL;
 echo "Errno de débogage. :" .mysqli_connect_errno() .PHP_EOL;
 echo "Erreur de débogage. :" .mysqli_connect_error() .PHP_EOL;
 exit;
 }

 $req ="SELECT count(*) FROM pokemon;";

 $result = mysqli_query($link,$req);
 if($result){
 while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

 echo "There are"." ".$row["count(*)"]." "."pokemons from the database.";
 }
 mysqli_free_result($result);
 }
 mysqli_close($link);

 ?>

 <?php /*
 {
 $link = mysqli_connect("localhost","root","","pokedex");
 }
 if(!$link){
 echo "Erreur : Impossible de se connecter à MySQL." .PHP_EOL;
 echo "Errno de débogage. :" .mysqli_connect_errno() .PHP_EOL;
 echo "Erreur de débogage. :" .mysqli_connect_error() .PHP_EOL;
 exit;
 }

 $req ="SELECT identifier FROM pokemon WHERE base_experience > 200;";

   //SELECT * FROM pokemon WHERE base_experience > 200;

 $result = mysqli_query($link,$req);
 if($result){
 while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

 echo "<div class=super>".$row["identifier"]." "."</div>";
 }
 mysqli_free_result($result);
 }
 mysqli_close($link);

 */ ?>

 <table>
   <thead>
     <tr>
       <th>Sprite</th>
       <th>ID</th>
       <th>Name</th>
       <th>Height</th>
       <th>Weight</th>
       <th>Base exp</th>
     </tr>
   </thead>
   <tbody>
    <?php //tableau des pokemons
    {
    $link = mysqli_connect("localhost","root","","pokedex");
    }
    if(!$link){
    echo "Erreur : Impossible de se connecter à MySQL." .PHP_EOL;
    echo "Errno de débogage. :" .mysqli_connect_errno() .PHP_EOL;
    echo "Erreur de débogage. :" .mysqli_connect_error() .PHP_EOL;
    exit;
    }

    $req ="SELECT id, identifier, height, weight, base_experience
      FROM pokemon;";

      //SELECT * FROM pokemon WHERE base_experience > 200;

    $result = mysqli_query($link,$req);
    if($result){
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

    echo "<tr><td><img src='/pokedex/sprites/{$row["identifier"]}.png'></td>";
    echo "<td>".$row["id"]." "."</td>";
    echo "<td>".$row["identifier"]." "."</td>";
    echo "<td>".$row["height"]." "."</td>";
    echo "<td>".$row["weight"]." "."</td>";
    echo "<td>".$row["base_experience"]."</td></tr>";
    }
    mysqli_free_result($result);
    }
    mysqli_close($link);

    ?>
    </tbody>
  </table>
</body>
</html>
