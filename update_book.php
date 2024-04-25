
<?php

include "header.php";

//requette create
$id=$_GET['id'];
$nom=$_POST['name'];
$nom_category=trim($_POST['name_category']);
$nom_author=trim($_POST['name_author']);

//verification de l'auteur dans la liste des auteurs
$query="SELECT name FROM author ";
$statement = $pdo->query($query);
$all_author = $statement->fetchAll();

 //verification du book dans la liste des books
$query="SELECT idbook FROM book WHERE name='$nom' ";
$statement = $pdo->query($query);
$id_book = $statement->fetch();

$verif_book=0;
if($id_book != false){
    $verif_book=1;
}
switch($verif_book){
    case 0:
        echo "ce livre n'existe pas, merci de choisir un autre livre .";
        break;
    default:

        $idbook=$id_book['idbook'];
$verif_author=0;
foreach($all_author as $author){
    if(strcmp($author['name'], $nom_author) == 0){
        $verif_author=1;
        
        //header('location:form_update_book.php');
    }
}

switch($verif_author){ 
    case 0:
        echo "cet auteur n'existe pas, merci de choisir un autre auteur .";
        break;
    
    default:
    //author
        $query="SELECT idauthor FROM author WHERE name='$nom_author' ";
        $statement = $pdo->query($query);
        $id_author = $statement->fetch();
        $idaut=$id_author['idauthor'];

        //category{}

        $query="SELECT idcategory FROM category WHERE name='$nom_category' ";
        $statement = $pdo->query($query);
        $id_category = $statement->fetch();

        $idcat=$id_category['idcategory'];

        $verifie=0;
        //verification dans book
        $query="SELECT * FROM book ";
        $statement = $pdo->query($query);
        $book = $statement->fetchAll();
        foreach($book as $valbook){
            if($valbook['idbook']== $id && $valbook['author_idauthor']== $idaut && $valbook['category_idcategory']==$idcat){ 
                $verifie=1;
            }
        }
        $query="SELECT name FROM book WHERE idbook-$idbook";
        $statement = $pdo->query($query);
        $books = $statement->fetch();
        //var_dump($books);
        //verification dans emprunt
        $query="SELECT * FROM emprunt WHERE book_idbook='$idbook' ";
        $statement = $pdo->query($query);
        $emprunt = $statement->fetchAll();
        if(!(empty($emprunt)) && (strcmp($books['name'], $nom))!= 0){
            $verifie=2;
        }
        

       

        switch($verifie){ 
            case 1:
                echo "Le livre ".$nom=$_POST['name']." existe déjà avec la même catégorie et le même auteur.";
                break;
            case 2:
                    echo "Le livre ".$nom=$_POST['name']." est emprunté par un utilisateur, vous ne pouvez donc pas modifier son nom<br> Seulement la catégorie et l'auteur.<br>Merci!!.";
                    break;
            default:
                $query="UPDATE `book` SET `idbook`= :idbook, `category_idcategory`= :idcat, `author_idauthor`= :idaut  WHERE idbook = $id ";
                $statement=$pdo->prepare($query);
                $statement->bindValue(':idcat', $idcat, \PDO::PARAM_INT);
                $statement->bindValue(':idaut', $idaut, \PDO::PARAM_INT);
                $statement->bindValue(':idbook', $idbook, \PDO::PARAM_INT);
                $statement->execute();

    
                header('location:read_book.php');
        }

}
}



