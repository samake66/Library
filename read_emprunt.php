<?php
include "header.php";
?>
<div class="p-3 mb-2 bg-secondary text-white">
    <h2>La liste des emprunts:</h2>
    <?php
        $query="SELECT  * FROM emprunt";
        $statement=$pdo->query($query);
        $emprunt=$statement->fetchAll();

        //{ }
        ?>
       
        <?php
        foreach($emprunt as $valemprunt){
            //user
            $valuser=$valemprunt['user_iduser'];
            $query="SELECT name FROM user WHERE iduser=$valuser";
            $statement=$pdo->query($query);
            $user=$statement->fetch();
            //book
            $val=$valemprunt['book_idbook'];
            $query="SELECT b.name, b.author_idauthor, b.category_idcategory FROM book as b WHERE b.idbook=$val";
            $statement=$pdo->query($query);
            $book=$statement->fetch();
            //category
            $idcat=$book['category_idcategory'];
            $query2="SELECT name FROM category WHERE idcategory=$idcat";
            $statement2=$pdo->query($query2);
            $category=$statement2->fetch();
            //author
            $idaut=$book['author_idauthor'];
            $query3="SELECT name FROM author WHERE idauthor=$idaut";
            $statement3=$pdo->query($query3);
            $author=$statement3->fetch();
            ?>
            <ul class="list-group">
                <li class="list-group-item disabled" aria-disabled="true">
            <?php
                echo "le livre (".$book['name'].") emprunter par (".$user['name'].") qui a pour auteur (".$author['name'].") et catégorie (".$category['name'].") doit être retourner le (".$valemprunt['date_retour'].")";
            ?>
                </li>
            <?php
        
       } ?>
        </div>
</div>