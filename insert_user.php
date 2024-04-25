
<?php

include "header.php";

//requette create
$nom=$_POST['name'];
$birthday=$_POST['birthday'];
$mail=$_POST['email'];
$password=$_POST['password'];

//{ }
$query="SELECT email FROM user ";
$statement=$pdo->prepare($query);
$statement->execute();
$emails= $statement->fetchAll();

$verif_mail=0;
foreach($emails as $email){
    if(strcmp($email['email'], $mail)==0){
        $verif_mail=1;?>
        <?php
    
    }
}
switch($verif_mail){
    case 0:
        $statement=$pdo->prepare("INSERT INTO `user` (`name`, `birthday`, `email`, `password`) VALUES (:nom, :birthday, :mail, :password )");
        $statement->bindValue(':nom', $nom, \PDO::PARAM_STR);
        $statement->bindValue(':birthday', $birthday, \PDO::PARAM_STR);
        $statement->bindValue(':mail', $mail, \PDO::PARAM_STR);
        $statement->bindValue(':password', $password, \PDO::PARAM_STR);
        $statement->execute();
        header('location:login.php');
        break;
    default:
        echo "cet identifiant existe déjà.<br> Merci de choisir un autre !<br><hr>";?>
    <?php

}
