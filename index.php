<?php
include_once './template/head.html';
include_once './template/foot.html';

session_start();

// var_dump($_SESSION);
// var_dump($_COOKIE['user_id']);
// var_dump($_REQUEST);

if (isset($_COOKIE['user_id']) == null || isset($_REQUEST['delete_id']) != false) {
    // var_dump($_SESSION);
    session_destroy();
};

?>

<div class="container-colonne">

    <h1 class="home-titre">Boutique</h1>
    
    <?php
    if (isset($_SESSION["pseudo"]) != false) {
          ?>

          <form data-connect="enter" action="./panier.php" method="post">
            <h3 class="titre">Connexion :</h3>

            <label class="titre" for="enter-pseudo">Pseudo :</label>
            <input id="enter-pseudo" class="" type="text" name="pseudo">
            <div class="container home-btn">
                  <button class="btn button home-enter" type="submit">Entrez</button>
            </div>
            
      </form>
      <form action="./index.php" method="post">
            <input type="hidden" name="delete_id" value="1" />
            <div class="container btn-quit-panier">
            <button class="btn reload" type="submit">Quitter la session (cliquez 2 fois)</button>
            </div>
      </form>
      
      <?php 
      } else {
      ?>
      <form data-connect="register" action="./panier.php" method="post">
            <h3 class="titre">Enregistrement :</h3>      

            <label class="titre" for="register-pseudo">Pseudo :</label>
            <input id="register-pseudo" class="red" type="text" name="pseudo">

            <label class="titre" for="register-mail">Mail :</label>
            <input id="register-mail" class="red" type="text" name="mail">
            <div class="container home-btn">
                  <button class="btn button home-register hidden" type="submit">S'enregister</button>
            </div>
            
      </form>
      <?php
      }
      ?>
  
</div>




