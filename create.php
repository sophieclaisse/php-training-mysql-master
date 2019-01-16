<?php
include "index.php";





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

	<h1>Ajouter</h1>

	<form action="create.php" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="text" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>

<?php



function newData()
{

    $name= $_POST['name'];
    $difficulty= $_POST['difficulty'];
    $distance= $_POST['distance'];
    $duration=$_POST['duration'];
    $denivele=$_POST['height_difference'];


    global $conn;


    $requete = "INSERT INTO hiking (`name`, `difficulty`, `distance`, `duration`, `height_difference`) VALUES (?,?,?,?,?)";

    $stmt = $conn->prepare($requete);
    $stmt->bind_param("ssisi", $name, $difficulty, $distance, $duration, $denivele);
    $stmt->execute();
    $stmt->close();



}

if (isset($_POST['name'])){
    newData();
}
