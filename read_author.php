

<?php

include "header.php";

?>
<div class="p-3 mb-2 bg-secondary text-white">
<div class="position-relative py-2 px-4 text-bg-secondary border border-secondary rounded-pill" style="text-align: center">
<h2>La liste des authors</h2> <svg width="1em" height="1em" viewBox="0 0 16 16" class="position-absolute top-100 start-50 translate-middle mt-1" fill="var(--bs-secondary)" xmlns="http://www.w3.org/2000/svg"><path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/></svg>
</div>
<?php

//requette
$statement3=$pdo->query("select * from author");

//recupere
$author=$statement3->fetchAll(PDO::FETCH_ASSOC);
?>

<ul class="list-group">
<?php
foreach($author as $valaut){ ?>
    <li class="list-group-item">
    <div class="container text-center">
        <div class="row justify-content-md-center">
            <div class="col col-lg-2">
                <a href="details.php?name=<?=$valaut['name']?>"><?=$valaut['name']?></a>
            </div>
            <div class="col col-lg-2">
                <button type="button" class="btn btn-danger"><a href="suppr_author.php?id=<?=$valaut['idauthor']?>">Supprimer</a></button>
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
        <a href="form_insert_author.php?id=<?=$valaut['idauthor']?>">Ajouter</a>
    </button>
</div>
</div>