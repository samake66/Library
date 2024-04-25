<?php
    include "header.php";
?>

<h1> Ajouter un livre</h1>

<form action="insert_book.php" method="POST">
    <ul>
        <li>
            <label>Nom du book :</label>
            <input name="name" type="text" required="required"/>
        </li>
        <li>
            <?php 

            $query = "SELECT * FROM category";
            $statement = $pdo->query($query);
            $categories = $statement->fetchAll();
            //{}
            ?>
            <label for="category">Choisissez une categorie:</label>
            <select id="name_category" name="name_category">
            <?php 
            foreach($categories as $valcat){?>
                <option value="<?=$valcat['name']?>"><?=$valcat['name']?></option>
            <?php } ?>
            </select>
        </li>
        <li>
        <?php 

            $query = "SELECT * FROM author";
            $statement = $pdo->query($query);
            $author = $statement->fetchAll();
        ?>
        <label for="author">Choisissez un auteur:</label>
        <select id="name_author" name="name_author">
            <?php 
            foreach($author as $valaut){?>
            <option value="<?=$valaut['name']?>"><?=$valaut['name']?></option>
            <?php } ?>
        </select>           
        </li>
        <li>
            
            <label>Image du book :</label>
            <input name="image" type="text" >
        </li>
    </ul>
    <button type="submit" class="btn btn-success">Ajouter</button>
</form>


