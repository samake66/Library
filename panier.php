<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="header.css" media="screen"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Mon panier</title>
</head>

<?php
include "connec.php";
$pdo = new \PDO(DSN, USER, PASS);

session_start();

$mail=$_GET['email'];
$id_book=$_GET['id'];



//user
$query="SELECT * FROM user WHERE email='$mail' ";
$statement2=$pdo->query($query);
$user=$statement2->fetch(PDO::FETCH_ASSOC);
//le book
$query2="SELECT * FROM book WHERE idbook='$id_book' ";
$statement=$pdo->query($query2);
$valbook=$statement->fetch(PDO::FETCH_ASSOC);

 //requete nom category
 $idcat=$valbook['category_idcategory'];
 $statement=$pdo->query("select name from category where idcategory=$idcat");
 $name_cat=$statement->fetch(PDO::FETCH_ASSOC);
 //requette nom auteur
 $idaut=$valbook['author_idauthor'];
 $statement=$pdo->query("select name from author where idauthor=$idaut");
 $name_aut=$statement->fetch(PDO::FETCH_ASSOC);



?>
<div>
    <div>
        <h3>Votre panier (<?=$user['name'] ?>)</h3>
    </div>
    <div class="container text-center">
    <div class="row">
    <div class="col" style="text-align: left">
        <img class="img" src="<?=$valbook['link_image']?>" alt="<?=$valbook['link_image']?>">
        <a href="details.php?name=<?=$valbook['name']?>"><?=$valbook['name']?></a>
    </div>
    <div class="col">
    (Catégorie: <?=$name_cat['name'] ?>, Auteur: <?=$name_aut['name'] ?>)
    </div>
    <div class="col">
    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <button type="button" class="btn btn-danger"><a href="read_book.php?id=<?=$valbook['idbook']?>&amp;email=<?=$mail?>">Modifier</a></button>
        <button type="button" class="btn btn-outline-secondary"><a href="panier.php?id=<?=$valbook['idbook']?>">Supprimer</a></button>
    </div>
    </div>
  </div>
</div>
<div class="titre">
<button type="button" class="btn btn-outline-secondary">
    <a href="form_emprunt_book.php?id=<?=$id_book?>&amp;name=<?=$user['name']?>">Valider votre panier</a>
</button>
</div>
</div>

