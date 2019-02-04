<?php
//Check if credentials are valid
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") { //VERIFFIE ENVOIR FORMULAIRE

    if ((!filter_var($_POST['username'], FILTER_SANITIZE_STRING) === false) && (!filter_var($_POST['password'], FILTER_SANITIZE_STRING) === false)) { //FILTRES SECURITE

        global $conn;

        $Log = $_POST['username'];
        $Pass = $_POST['password'];

        $PasswordV= SHA1($Pass);



        $user= "SELECT * FROM `user` where username='$Log' and password = '$PasswordV' ";
        $sel = $conn->query($user);

        $row = $sel->fetch_assoc();

        if(isset($row['id']))
        {
          echo 'Le mot de passe est valide !';
          $_SESSION['userId'] = $row['id'];
          header ("Location: read.php");


        } else {
            echo 'Le mot de passe est invalide.';

        }

    }else{
        echo 'Le mot de passe est invalide.';
    }
}

