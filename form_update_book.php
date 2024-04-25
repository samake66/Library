
<?php
// CONNEXION À LA BASE DE DONNÉES AVEC PDO
include "header.php";

?>
<h1> Modification :</h1>
<?php

//recuperation du nom du livre 
$idbook=$_GET['id']; 
$query="SELECT b.name, b.author_idauthor FROM book as b WHERE b.idbook=$idbook";
$statement=$pdo->query($query);
$nom_book=$statement->fetch();

//recuperation du nom de l'auteur
$id_aut=$nom_book['author_idauthor'];
$query="SELECT a.name FROM author as a WHERE a.idauthor=$id_aut";
$statement=$pdo->query($query);
$nom_author=$statement->fetch();


?>

<form action="update_book.php?id=<?=$idbook?>" method="POST">
    <ul>
        <li>
            <label>Nom du book :</label>
            <input name="name"  type="text" value="<?=$nom_book['name']?>" required="required"/>
        </li>
        <li>
            <?php 

            $query = "SELECT * FROM category";
            $statement = $pdo->query($query);
            $categories = $statement->fetchAll();
            //{}
            ?>
            <label>Choisissez une categorie:</label>
            <select id="name_category" name="name_category">
            <?php 
            foreach($categories as $valcat){?>
                <option value="<?=$valcat['name']?>"><?=$valcat['name']?></option>
            <?php } ?>
            </select>
        </li>
        <li>
            <label>Auteur du book :</label>
            <input name="name_author" type="text" value="<?=$nom_author['name']?>" required="required"/>
        </li>
    </ul>
    <button type="submit" class="btn btn-success">Modifier</button>
</form>
<?php
