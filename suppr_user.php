<?php

include "header.php";

//requette suppression
$id=$_GET['id'];


$query="SELECT * FROM emprunt WHERE user_iduser='$id' ";
$statement = $pdo->query($query);
$emprunt = $statement->fetch();

//{ }
if(empty($emprunt)){
    $pdo->exec("DELETE FROM user  WHERE iduser=$id");
    header('location:read_user.php');
}
else{
    echo "Cet utilisateur a un emprunt en cours, donc ne peut être supprimer.<br>
    Merci de retourner le livre emprunté avant!";
}



