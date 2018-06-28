<?php
include_once './template/head.html';
include_once './template/foot.html';

session_start();

// var_dump($_REQUEST);
// var_dump($_SESSION);

$securCook = setcookie('user_id' , $_REQUEST['pseudo'], time() + 60, null, null, false, true);

$sPseudo = "";
$sMail = "";
$aFruits = [ 
  'Poire' => '2', 
  'Cerise' => '3', 
  'Raisin' => '5', 
  'Citron' => '4', 
  'Orange' => '4', 
  'Ananas' => '6', 
  'Melon' => '4', 
  'Banane' => '2', 
];

if (isset($_SESSION['pseudo']) != false) {
  if ($_REQUEST['pseudo'] != $_SESSION['pseudo']) {
    header("Location:index.php");
  }
} else {
  if (isset($_REQUEST['pseudo']) != false) {
    $_SESSION['pseudo']=$_REQUEST['pseudo'];
  }
  if (isset($_REQUEST["mail"]) != false) {
    $_SESSION['mail']=$_REQUEST['mail'];
  }
}

$sPseudo = $_SESSION["pseudo"];
$sMail = $_SESSION["mail"];


?>
<div class="container">
  <form action="./index.php" method="post">
      <input type="hidden" name="restart" value="1" />
      <div class="container btn-quit-panier">
        <button class="btn" type="submit">Quitter</button>
      </div>
  </form>
  <h1 class="titre">Bienvenue : <?= $sPseudo ?></h1>
</div>

<div class="container">
  <div class="fruits">
    <?php
    foreach ($aFruits as $key => $value){
    echo '<div class="button" data-fruit="'.$key.'" data-prix="'.$value.'">
    <img src="./img/'.$key.'.png" alt="'.$key.'">
    <label>'.$value.' euros</label>
    </div>';
    }
    ?>  
    
  </div>
</div>

<div class="container">
  <form id="panier" action="./ticket.php" method="post">
    <div class="liste container">
      <div class="article hidden">
        <input type="hidden" name="">
        <label class="list-name" for=""></label>
        <label class="list-prix" for=""></label>
        
      </div> 
    </div>
    <div class="container">
      <button class="btn hidden" type="submit">Valider mon panier</button>
    </div>
  </form>
  
</div>

<div class="container">
  
</div>