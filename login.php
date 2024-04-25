<head>
<link rel="stylesheet" type="text/css" href="header.css" media="screen"/>
</head>
<div class="div_titre_login">
  <h1>Bienvenue sur Ma biblio </h1>
</div>
<div class="div_home">

<div class="div_user">
  <div>
    <h1>CONNEXION</h1>
  </div>

<form class="row g-3" action="verification_login.php" method="POST">
    
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Email :</label>
    <input type="email" name="email" class="mail" id="exampleFormControlInput1" placeholder="name@" required="required">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Mot de passe :</label>
    <input type="password" name="password" class="password" id="inputPassword2" placeholder="Password" required="required">
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-primary mb-3">CONNEXION</button>
  </div>
</form>
</div>


<div class="div_user">
  <div>
  <h1>INSCRIPTION</h1>
  </div>

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
</form>
</div>

</div>