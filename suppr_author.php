<?php

include "header.php";


//requette suppression
$id=$_GET['id'];

$query="SELECT * FROM book WHERE author_idauthor='$id' ";
$statement = $pdo->query($query);
$books = $statement->fetch();

//{ }
if(empty($books)){
    $pdo->exec("DELETE FROM author  WHERE idauthor=$id");
    header('location:read_author.php');
}
else{
    echo "Cet auteur est associé à un livre, donc ne peut être supprimer.<br>";

}

