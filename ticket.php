<?php
include_once './template/head.html';
include_once './template/foot.html';

session_start();

// var_dump($_REQUEST);
// var_dump($_SESSION);
// var_dump($_COOKIE);

$nTotalPanier = "";
foreach ($_REQUEST as $key => $value){
  $nTotalPanier +=  $value;
};

?>

<div class="container">
  <span>
    <div class="container-colonne">
      <div class="container">
        <h3>Ticket de caisse</h3>
      </div>
      <div class="fruits">
      <div class="liste container">
        <?php
        foreach ($_REQUEST as $key => $value){
        echo 
        '
          <div class="article hidden">
            <label class="list-name">'.$key.'</label>
            <label class="list-prix">'.$value.' euros</label>
          </div> 
        ';
        }
        ?>  
        </div>
      </div>
      <div class="container">
        <p>Total : <?= $nTotalPanier ?> euros</p>
      </div>
    </div>
  </span>

  
  <form action="./index.php" method="post">
      <input type="hidden" name="restart" value="1" />
      <button class="btn" type="submit">Quitter</button>
  </form>
</div>