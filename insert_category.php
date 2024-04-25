
<?php

include "header.php";

$query = "SELECT * FROM category";
$statement = $pdo->query($query);
$categories = $statement->fetchAll();
$nom=trim($_POST['name']);
var_dump($categories);
//{}
$val=0;
foreach($categories as $valcat){ 
    if((strcmp($nom, $valcat['name']))==0){
        $val=1;
    }
}
if($val==0){
    //requette create
        
    $statement2=$pdo->prepare("INSERT INTO `category` (`name`) VALUES (:nom)");
    $statement2->bindValue(':nom', $nom, \PDO::PARAM_STR);
    $statement2->execute();

}


header('location:read_category.php');