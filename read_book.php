
<?php

include "header.php";

?>
<div class="titre" style="text-align: center">
<h1>La liste des livres</h1>
</div>
<?php
//recuperation du mail de l'utilisateur
@$mail=$_GET['email'];
//requette
$statement2=$pdo->query("select * from book");
//Recupere
$book=$statement2->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="row row-cols-1 row-cols-md-4 g-4">
<?php
foreach($book as $valbook){ ?>
    <?php
        //requete nom category
        $idcat=$valbook['category_idcategory'];
        $statement=$pdo->query("select name from category where idcategory=$idcat");
        $name_cat=$statement->fetch(PDO::FETCH_ASSOC);
        //requette nom auteur
        $idaut=$valbook['author_idauthor'];
        $statement=$pdo->query("select name from author where idauthor=$idaut");
        $name_aut=$statement->fetch(PDO::FETCH_ASSOC);
        
    ?>

  <div class="col">
  <img src="<?=$valbook['link_image']?>" alt="<?=$valbook['link_image']?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><a href="details.php?name=<?=$valbook['name']?>"><?=$valbook['name']?></a></h5>
    <p class="card-text">(Catégorie: <?=$name_cat['name'] ?>, Auteur: <?=$name_aut['name'] ?>)</p>
    <a href="form_update_book.php?id=<?=$valbook['idbook']?>" class="btn btn-primary">Modifier</a>
    <a href="panier.php?id=<?=$valbook['idbook']?>&amp;email=<?=$mail?>" class="btn btn-primary">Ajouter au panier</a>
    <a href="suppr_book.php?id=<?=$valbook['idbook']?>" class="btn btn-primary" >Suppr</a>
  </div>
  </div>

    <?php

} ?>
</div>
<?php

?>
<div class="titre">
  <button class="btn btn-secondary"  type="button">
    <a href="form_insert_book.php?id=<?=$valbook['idbook']?>">Ajouter</a>
  </button>
</div>
