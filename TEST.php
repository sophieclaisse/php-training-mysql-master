<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 15/01/2019
 * Time: 15:57
 */


//FILTRES DE VALIDATION

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

    if (isset($_POST['difficulty']) ){
        $difficulty= $_POST['difficulty'];}

    if (isset($_POST['duration']) ){
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

if ((isset ($_POST['name']) && (!filter_var($_POST['distance'], FILTER_VALIDATE_INT) === false)) && (!filter_var($_POST['distance'], FILTER_VALIDATE_INT) === false) && (!filter_var($_POST['distance'], FILTER_VALIDATE_INT) === false)){

    changerData($id);

}

/*
if (!filter_var($int, FILTER_VALIDATE_INT) === false) {
    echo("Integer is valid");
} else {
    echo("Integer is not valid");
}

*/

