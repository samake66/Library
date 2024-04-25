<?php

include "header.php";

//requette suppression
$id=$_GET['id'];

$query="SELECT * FROM emprunt WHERE book_idbook='$id' ";
$statement = $pdo->query($query);
$emprunt = $statement->fetch();

//{ }
if(empty($emprunt)){
    $pdo->exec("DELETE FROM book  WHERE idbook=$id");
    header('location:read_book.php');
}
else{
    echo "Ce livre est emprunté, donc ne peut être supprimer.<br>";
}


