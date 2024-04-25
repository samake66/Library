

<?php
// CONNEXION À LA BASE DE DONNÉES AVEC PDO
include "header.php";
?>
<h1> Vous allez faire un emprunt</h1>
<?php

//requette create
$id=$_GET['id'];
$name=$_GET['name'];
$query="SELECT b.name FROM book as b WHERE b.idbook = $id";
$statement=$pdo->query($query);
$nom_book=$statement->fetch();
?>

<form action='emprunt_book.php?id=<?=$id?>' method="POST">
    <ul>
        <li>
            <label>Votre Nom:</label>
            <input name="name_user"  type="text" value="<?=$name?>" required="required"/>
        </li>
        <li>
            <label>Nom du book :</label>
            <input name="name"  type="text" value="<?=$nom_book['name']?>" required="required"/>
        </li>
        <li>
            <?php
            $date_min=date("Y-m-d");
            $val=date("m") + 3;
            $date_max=date("Y"."0".$val."-d");
            ?>
            <label>Date de retour :</label>
            <input name="date_retour" type="date" min="<?=$date_min?>" max="<?=$date_max?>" required="required"/>
        </li>
        
    </ul>
    <button type="submit" class="btn btn-success">Valider</button>
</form>

