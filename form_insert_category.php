<?php
    include "header.php";
?>

<h1>Ajouter une catégorie</h1>
<form action="insert_category.php" method="POST">
    <ul>
        <li>
            <label>Nom du category :</label>
            <input name="name" id="id" type="text" required="required"/>
        </li>
    </ul>
    <button type="submit" class="btn btn-success">Ajouter</button>
</form>

