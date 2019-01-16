<?php

include "index.php";

if (isset($_GET['id'])){
    $id= $_GET['id'];}


$sql= "SELECT hiking.* FROM hiking where id='$id'";
$sel = $conn->query($sql);

$selection=$sel->fetch_assoc();





function changerData ($id)
{

    if (isset($_POST['name'])){
    $name= $_POST['name'];}

    if (isset($_POST['distance'])){
    $distance= $_POST['distance'];}

    if (isset($_POST['difficulty'])){
        $difficulty= $_POST['difficulty'];}

    if (isset($_POST['duration'])){
    $duration= $_POST['duration'];}

    if (isset($_POST['height_difference'])){
    $denivele=$_POST['height_difference'];}

    global $conn;



    $aJour= "UPDATE hiking set  
              `name`='$name',
              difficulty='$difficulty',
              distance='$distance', 
              duration='$duration', 
              height_difference='$denivele' 
               
              where id = $id";


    $conn->query($aJour);
   /* echo $aJour;
    echo $conn->error;*/
}

if (isset ($_POST['name'])){

    changerData($id);

}


?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Mettre à jour</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?php echo $selection['name']?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile" <?php if ($selection['difficulty']== 'très facile'){echo "selected";}?>>Très facile</option>
				<option value="facile" <?php if ($selection['difficulty']== 'facile'){echo "selected";}?>>Facile</option>
				<option value="moyen" <?php if ($selection['difficulty']== 'moyen'){echo "selected";}?>>Moyen</option>
				<option value="difficile" <?php if ($selection['difficulty']== 'difficile'){echo "selected";}?>>Difficile</option>
				<option value="très difficile" <?php if ($selection['difficulty']== 'très difficile'){echo "selected";}?>>Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?php echo $selection['distance']?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?php echo $selection['duration']?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?php echo $selection['height_difference']?>">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>







