<?php
include "index.php";
include "check_login.php";

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>

  <?php

  if ()
  echo "Bienvenue"

   ?>


  <a href="login.php">LOGIN UTILISATEUR</a>


  <a href="logout.php">LOG OUT</a>

    <h1>Liste des randonnées</h1>
    <table>

     <?php

     $selection= "SELECT * FROM hiking ";

     $sel = $conn->query($selection);


     while($row = $sel->fetch_assoc()) {


         ?> <a href="<?php echo 'delete.php?id='.$row['id'] ?>" >Supprimer</a>

         <?php  echo " - " . $row['id']." - " ?>

         <a href="<?php echo'update.php?id='. $row['id']?> "><?php echo $row['name'] ?></a>

         <?php echo " -  " . $row['difficulty'] ." -  " . $row['distance'] ." -  " . $row['duration'] ." -  " . $row['height_difference'] ."<br><br>";

     }
     /*echo"<pre>";
     print_r($Tab);
     echo"</pre>";*/

     if (isset($_SESSION['userId'])) {
        include "create.php";}
     ?>

  </body>
</html>
