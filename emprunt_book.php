<?php
include "header.php";
?>

<h1> Vous allez emprunter un livre</h1>

<?php

$id=$_GET['id'];
$date_emprunt=date("Y-m-d");
$date_retour=$_POST['date_retour'];
$name_user=$_POST['name_user'];
$name_book=$_POST['name'];

//verification dans user
$query="SELECT * FROM user ";
$statement = $pdo->query($query);
$users = $statement->fetchAll();
//{ }

$id_user=0;
foreach($users as $valuser){
    if(strcmp($valuser['name'], $name_user)==0){
        $id_user=$valuser['iduser'];    
    }
}
switch($id_user){
    case 0:
        echo "Merci de vous inscrire avant d'emprunter.<br>
        Le lien pour vous inscrire:<br><hr>";
        ?>
        <a href="form_insert_user.php">s'inscrire</a>
        <?php
        break;
    default:
    //verification dans book
        $query="SELECT name FROM book WHERE idbook=$id";
        $statement = $pdo->query($query);
        $books = $statement->fetch();
        //{ }

        if(strcmp($books['name'], $name_book) !=0){
            echo "Avertissement !<br>Vous avez essayer de modifier le nom du livre.<br>
            L'emprunt tiendra compte que du nom de base du livre, Merci!!<br><hr>";
        }

        //verification que ce livre n'est pas emprunté par la même personne
        $query="SELECT * FROM emprunt WHERE book_idbook=$id AND user_iduser=$id_user ";
        $statement = $pdo->query($query);
        $emprunt = $statement->fetch();

        if(!(empty($emprunt))){
        echo "Ce livre est déjà emprunté par la même personne !";
        }
        else{

        //if($id_user!=0 && $verif_idbook!=0){

        $statement=$pdo->prepare("INSERT INTO `emprunt` (`user_iduser`, `book_idbook`, `date_emprunt`, `date_retour`) VALUES (:id_user, :id, :date_emprunt, :date_retour)");
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->bindValue(':id_user', $id_user, \PDO::PARAM_INT);
        $statement->bindValue(':date_retour', $date_retour, \PDO::PARAM_STR);
        $statement->bindValue(':date_emprunt', $date_emprunt, \PDO::PARAM_STR);
        $statement->execute();
    
        //header('location:read_book.php');
        echo "Emprunt effectué avec succes!";

}




    
   // }
    /*else{
        echo "Il se trouve que : <br><hr>";
        echo "1 - Le livre que vous voulez emprunter n'existe pas, choisissez un livre en cliquant sur le lien ci-dessous. Merci!! <br>";
        ?>
        <a href="read_book.php">La liste des livres disponnibles</a>
        <?php
        echo "<br><hr>ou<br><hr>";
        echo "2 - Vous n'êtes pas inscrit ! <br> Pour pouvoir emprunter, inscrivez-vous d'abord en cliquant sur le lien ci-dessous. Merci!! <br>";
        ?>
        <a href="form_insert_user.php">Je m'inscris</a>
    <?php } */
}





