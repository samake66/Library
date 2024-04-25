
<?php

include "header.php";
//{ }
//requette create
$nom=$_POST['name'];
$nom_category=trim($_POST['name_category']);
$nom_author=trim($_POST['name_author']);
$image=$_POST['image'];


$query="SELECT idauthor FROM author WHERE name='$nom_author' ";
$statement = $pdo->query($query);
$id_author = $statement->fetch();


$query="SELECT idcategory FROM category WHERE name='$nom_category' ";
$statement = $pdo->query($query);
$id_category = $statement->fetch();

$verif_book=0;
$query="SELECT * FROM book WHERE name='$nom' ";
$statement = $pdo->query($query);
$books = $statement->fetchAll();


if(!empty($books)){
    echo "ce livre existe déjà !";
}
else{
    $id1=$id_author['idauthor'];
$id2=$id_category['idcategory'];

$statement=$pdo->prepare("INSERT INTO `book` (`name`, `author_idauthor`, `category_idcategory`, `link_image`) VALUES (:nom, :id1, :id2, :image)");
$statement->bindValue(':nom', $nom, \PDO::PARAM_STR);
$statement->bindValue(':id2', $id2, \PDO::PARAM_INT);
$statement->bindValue(':id1', $id1, \PDO::PARAM_INT);
$statement->bindValue(':image', $image, \PDO::PARAM_STR);
$statement->execute();



header('location:read_book.php');
}



