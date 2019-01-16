<?php
/**** Supprimer une randonnée ****/

include "index.php";
include "read.php";


function supprimer()
{

    $ID= $_GET['id'];

    global $conn;
    $effacer= "DELETE from hiking where id= $ID";
    $conn->query($effacer);
}
supprimer();






