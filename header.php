<?php
// CONNEXION À LA BASE DE DONNÉES AVEC PDO
include 'connec.php';
$pdo = new \PDO(DSN, USER, PASS);

@$val_recherche=$_POST['recherche'];
@$val_search=$_POST['search'];
session_start();




if(isset($val_search) && !empty(trim($val_recherche))){
  //requette
  $query="SELECT * FROM book WHERE name LIKE '%$val_recherche%'";
  $query_book="SELECT b.name FROM book as b 
  INNER JOIN author as a ON b.author_idauthor = a.idauthor
  WHERE a.name LIKE '%$val_recherche%' OR b.name LIKE '%$val_recherche%'";

  $statement=$pdo->prepare($query);
  $statement->setFetchMode(PDO::FETCH_ASSOC);
  $statement->execute();
  $books=$statement->fetchAll();
  $affiche_resultat="oui";
  //var_dump($book_author);
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="header.css" media="screen"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Ma blbliothèque</title>
</head>



<?php


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
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="login.php">HOME</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link active" href="read_category.php?name=category"><i class="fa-solid fa-layer-group"></i> categorie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="read_book.php?name=book"><i class="fa-light fa-book"></i> Book</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="read_author.php?name=author"><i class="fa-solid fa-at"></i> Author</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="read_user.php?name=author"><i class="fa-solid fa-user"></i> User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="read_emprunt.php?name=emprunt">Emprunts</a>
        </li>
 
      </ul> 
      <?php
      if(isset($_SESSION['login'])){ ?>
        <button class="btn btn-secondary"  type="button">
          <a href="deconnexion.php">Deconnexion</a>
        </button>
    <?php
      } ?>
      <form class="d-flex" role="search" action="" method="post">
        <input class="form-control me-2" type="search" name="recherche" value="<?php echo $val_recherche ?>" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" name="search" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<?php
if(@$affiche_resultat== "oui"){?>
<div class="div_resultat">
    <?php
    //{}
    if(empty($books)){ ?>
    <div class="resultat2"> 
    <?php
      echo "Aucun resultat pour votre recherche!";
    }
    else{?>
      
      <div class="resultat1"> 
        <div class="titre_resultat">
        <h2> Les résultats de votre recherche : </h2>
        </div>
      
      <?php
      foreach($books as $list_book){?>
          
           <a href="read_book.php?id=<?=$list_book['idbook']?>">Nom: <?=$list_book['name']?>  Catégorie: <?=$list_book['category_idcategory']?>  </a>
          
        <?php
        echo "<br><hr>";
      }?>
      
      </div>
      <?php

    }
    
    ?>
</div>
<?php } ?>
