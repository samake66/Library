
<?php

include "header.php";



//requette
$statement1=$pdo->query("select * from category");

//Recupere
$category=$statement1->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="div_author"></div>
<div class="p-3 mb-2 bg-secondary text-white">
<div class="position-relative py-2 px-4 text-bg-secondary border border-secondary rounded-pill" style="text-align: center">
<h2>La liste des catégories</h2> <svg width="1em" height="1em" viewBox="0 0 16 16" class="position-absolute top-100 start-50 translate-middle mt-1" fill="var(--bs-secondary)" xmlns="http://www.w3.org/2000/svg"><path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/></svg>
</div>


<ul class="list-group">
<?php
foreach($category as $valcat){ ?>
    <li class="list-group-item">
    <div class="container text-center">
        <div class="row justify-content-md-center">
            <div class="col col-lg-2">
            <a href="details.php?name=<?=$valcat['name']?>"><?=$valcat['name']?></a>
            </div>
            <div class="col col-lg-2">
                <button type="button" class="btn btn-danger"><a href="suppr_category.php?id=<?=$valcat['idcategory']?>">Supprimer</a></button>
            </div>
        </div>
    </div>
    </li>
    
    <?php

}
?>
</ul>
<div class="container text-center">
    <button type="button" class="btn btn-warning">
    <a href="form_insert_category.php?id=<?=$valcat['idcategory']?>"><b>Ajouter</b></a>
    </button>
</div>
</div>
</div>


