<?php

include "header.php";

//requette suppression
$id=$_GET['id'];


$query="SELECT * FROM book WHERE category_idcategory='$id' ";
$statement = $pdo->query($query);
$book = $statement->fetch();

//{ }
if(empty($book)){
    $pdo->exec("DELETE FROM category  WHERE idcategory=$id");
    header('location:read_category.php');
}
else{
    echo "Cette categorie est associée a un livre donc ne peut être supprimer.<br>
    Si vous souhaitez tout de même la supprimée,<br> merci de modifier la catégorie du livre auquel elle est associé en cliquant sur le boutton ci_dessous!<br>";
    ?>
   
   <button type="button" class="btn btn-warning">
    <a href="read_book.php">Modifier la catégorie</b></a>
</button>
    <?php }

