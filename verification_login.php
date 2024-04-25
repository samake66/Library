<?php

include "connec.php";

session_start();
$pdo = new \PDO(DSN, USER, PASS);


$email=$_POST['email'];
$password=$_POST['password'];
$query="SELECT * FROM user WHERE email= :email";
$statement=$pdo->prepare($query);
$statement->bindValue(':email', $email, \PDO::PARAM_STR);
$statement->execute();
$user= $statement->fetchAll();

$query="SELECT * FROM user WHERE password= :password";
$statement=$pdo->prepare($query);
$statement->bindValue(':password', $password, \PDO::PARAM_STR);
$statement->execute();
$mot_pass= $statement->fetchAll();

if(empty($user)){
    echo "cet identifiant n'existe pas.<br> Réessayer <br><hr>";
    exit();

}
else{
    $_SESSION['login']= $email;


    if(empty($mot_pass)){
        echo "Mot de passe incorrect <br><hr>";
        exit();

    }
    else{
        $_SESSION['password']= $password;
        echo "vous êtes connecté !";
        header("location:read_book.php?email=$email");
    }

}
