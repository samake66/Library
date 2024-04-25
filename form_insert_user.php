<?php
include "header.php";
?>
<h1>Ajouter un utilisateur</h1>
<div class="div_user">
<form class="row g-3" action="insert_user.php" method="POST">
    <div class="mb-3">
        <label>Nom de l'utilisateur :</label>
        <input name="name" id="id" type="text" required="required"/>
    </div>
    <div class="mb-3">
        <label>Date de naissance :</label>
        <input name="birthday" id="id" type="date" required="required"/>
    </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Email :</label>
    <input type="email" name="email" class="mail" id="exampleFormControlInput1" placeholder="name@">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Mot de passe :</label>
    <input type="password" name="password" class="password" id="inputPassword2" placeholder="Password">
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-primary mb-3">Ajouter</button>
  </div>
  </div>
</form>
