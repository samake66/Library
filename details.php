

<?php

include "header.php";

//requette
$statement1=$pdo->query("select * from category");
$statement2=$pdo->query("select * from book");
$statement3=$pdo->query("select * from author");
$statement4=$pdo->query("select * from user");

//Recupere
$category=$statement1->fetchAll(PDO::FETCH_ASSOC);
$book=$statement2->fetchAll(PDO::FETCH_ASSOC);
$author=$statement3->fetchAll(PDO::FETCH_ASSOC);

$user=$statement4->fetchAll(PDO::FETCH_ASSOC);

//{}

foreach($category as $valcat){
    if(strcmp($_GET['name'], $valcat['name']) == 0){
        ?>
        La catégorie du livre : <?= $valcat['name'];
    }
}
foreach($book as $valbook){
    if(strcmp($_GET['name'], $valbook['name']) == 0){
        
        
        //requete nom category
        $idcat=$valbook['category_idcategory'];
        $statement=$pdo->query("select name from category where idcategory=$idcat");
        $name_cat=$statement->fetch(PDO::FETCH_ASSOC);
        //requette nom auteur
        $idaut=$valbook['author_idauthor'];
        $statement=$pdo->query("select name from author where idauthor=$idaut");
        $name_aut=$statement->fetch(PDO::FETCH_ASSOC);
        
    ?>
    
    <div class="div_home">
        <div class="div_book_details">
            <div class="col" >
                <img class="div_img_details" src="<?=$valbook['link_image']?>" alt="<?=$valbook['link_image']?>">
            </div>
            <div>
                <a href="details.php?name=<?=$valbook['name']?>"><?=$valbook['name']?></a>
            </div>
            <div >
                (Catégorie: <?=$name_cat['name'] ?>, Auteur: <?=$name_aut['name'] ?>)
            </div>
        </div>
   
    </div> 
    <?php }
}
foreach($author as $valauthor){
    if(strcmp($_GET['name'], $valauthor['name']) == 0){
        ?>
        L'auteur s'appelle  : <?= $valauthor['name'];
    }
}

foreach($user as $valuser){
    if(strcmp($_GET['name'], $valuser['name']) == 0){
        ?>
        L'utilisateur s'appelle  : <?= $valuser['name'] ?> ,son mail: <?= $valuser['email']?> et sa date de naissance: <?= $valuser['birthday'];
    }
}
?>

<?php
/*
$id_book = $_GET['id_book']-1;
$monbook = $book[$id_book];

$id_author = $_GET['id_author']-1;
$monauthor = $category[$id_author];

?>


Vous êtes sur le livre : <?= $monbook['name']?>
Vous êtes sur l' auteur : <?= $monauthor['name']?> */

//{}