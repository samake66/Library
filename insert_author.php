<?php

include "header.php";

$query = "SELECT * FROM author";
$statement = $pdo->query($query);
$authors = $statement->fetchAll();
$nom=trim($_POST['name']);
//{}
$val=0;
foreach($authors as $valaut){ 
    if((strcmp($nom, $valaut['name']))==0){
        $val=1;
    }
}
if($val==0){
    $query = "INSERT INTO `author` (`name`) VALUES (:nom)";
    $statement=$pdo->prepare($query);
    $statement->bindValue(':nom',$nom, \PDO::PARAM_STR);
    $statement->execute();
}


header('location:read_author.php');
