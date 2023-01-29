<?php
if (isset($_POST['submit'])){
class classments
{
  public $seleccion;
  public $PTS;
  public $PAR;
  public $GAN;
  public $EMP;
  public $PER;
  public $GF;
  public $GC;
  public $DEF;
  public function __construct($seleccion, $PTS, $PAR, $GAN, $EMP,  $PER, $GF, $GC, $DEF)
  {
    $this->seleccion = $seleccion;
    $this->PTS = $PTS;
    $this->PAR = $PAR;
    $this->GAN = $GAN;
    $this->EMP = $EMP;
    $this->PER = $PER;
    $this->GF = $GF;
    $this->GC = $GC;
    $this->DEF = $DEF;
  }
}
$marroco = new classments("MARRUECOS", 0, 0, 0, 0, 0, 0, 0, 0);
$croatie = new classments("CROACIA", 0, 0, 0, 0, 0, 0, 0, 0);
$belgica = new classments("BELGICA", 0, 0, 0, 0, 0, 0, 0, 0);
$canada = new classments("CANADA", 0, 0, 0, 0, 0, 0, 0, 0);

// match 1

$marroco1=$_POST["marroc1"];
$croatie1=$_POST["croatie1"];
if($marroco1==0 && $croatie1==0){
  $marroco = new classments("MARRUECOS", 1, 1, 0, 1, 0,$marroco1, $croatie1, 0  );
  $croatie = new classments("CROACIA", 1, 1, 0, 1, 0, $croatie1,$marroco1, 0);
}
// empty
elseif ( empty($marroco1) && empty($croatie1)){}
// else
else if(empty($marroco1) || empty($croatie1) || $marroco1==0 || $croatie1==0){
 
  if(empty($marroco1) || $marroco1==0){
    $derant = 0 - $croatie1;
    $marroco = new classments("MARRUECOS", 0, 1, 0, 0, 1, 0, $croatie1, $derant  );
    $croatie = new classments("CROACIA", 3, 1, 1, 0, 0, $croatie1,0, -$derant);
  }
  elseif(empty($croatie1) || $croatie1==0){
    $derant = $marroco1 - 0;
    $marroco = new classments("MARRUECOS", 3, 1, 1, 0, 0,$marroco1, 0,$derant);
    $croatie = new classments("CROACIA", 0, 1, 0, 0, 1,0, $marroco1, -$derant);
  }
}
else{
  if($marroco1>$croatie1 ){
    $derant = $marroco1 -$croatie1;
    $marroco = new classments("MARRUECOS", 3, 1, 1, 0, 0,$marroco1, $croatie1,$derant);
    $croatie = new classments("CROACIA", 0, 1, 0, 0, 1,$croatie1, $marroco1, -$derant);
  }
  elseif($croatie1>$marroco1){
    $derant =$marroco1- $croatie1;
    $marroco = new classments("MARRUECOS", 0, 1, 0, 0, 1,$marroco1, $croatie1, $derant  );
    $croatie = new classments("CROACIA", 3, 1, 1, 0, 0, $croatie1,$marroco1, -$derant);
  }
  else{
    $marroco = new classments("MARRUECOS", 1, 1, 0, 1, 0,$marroco1, $croatie1, 0  );
    $croatie = new classments("CROACIA", 1, 1, 0, 1, 0, $croatie1,$marroco1, 0);
  }
}

// match 2

$canada1=$_POST["canada1"];
$belige1=$_POST["belige1"];
if( $canada1==0 && $belige1==0){
  $canada = new classments("CANADA", 1, 1, 0, 1, 0, $canada1, $belige1, 0);
  $belgica = new classments("BELGICA", 1, 1, 0, 1, 0, $belige1, $canada1, 0);
}
// empty
elseif (empty($canada1) && empty($belige1)) {}
// empty
else if(empty($canada1) || empty($belige1) || $canada1==0 || $belige1==0){
  
  if(empty($belige1) || $belige1==0){
    $derant = 0 - $canada1;
    $belgica = new classments("BELGICA", 0, 1, 0, 0, 1, 0, $canada1, $derant  );
    $canada= new classments("CANADA", 3, 1, 1, 0, 0, $canada1,0, -$derant);
  }
  elseif(empty($canada1) || $canada1==0){
    $belgica = new classments("BELGICA", 3, 1, 1, 0, 0,$belige1, 0 ,$belige1);
    $canada= new classments("CANADA", 0, 1, 0, 0, 1,0, $belige1, -$belige1);
  }
} else {
  if ($canada1 > $belige1) {
    $derant = $canada1 - $belige1;
    $canada = new classments("CANADA", 3, 1, 1, 0, 0, $canada1, $belige1, $derant);
    $belgica = new classments("BELGICA", 0, 1, 0, 0, 1, $belige1, $canada1, -$derant);
  }
   elseif ($belige1 > $canada1) {
    $derant = $belige1 - $canada1;
    $canada = new classments("CANADA"   , 0 , 1 , 0 , 0, 1  , $canada1 , $belige1 , -$derant );
    $belgica = new classments("BELGICA" , 3 , 1 , 1 , 0 , 0 , $belige1 , $canada1 ,  $derant );
    
  } else {
    $canada = new classments("CANADA", 1, 1, 0, 1, 0, $canada1, $belige1, 0);
    $belgica = new classments("BELGICA", 1, 1, 0, 1, 0, $belige1, $canada1, 0);
  }
}

// match 3

$marroco2=$_POST["marroc2"];
$belige2=$_POST["belige2"];

if ($marroco->PAR==1&&$belgica->PAR==1) {
  if( $belige2==0 && $marroco2==0){
    $marroco = new classments("MARRUECOS", $marroco->PTS+=1 , $marroco->PAR+=1, $marroco->GAN , $marroco->EMP+=1 , $marroco->PER , $marroco->GF+= $marroco2, $marroco->GC+=$belige2  , $marroco->DEF );
    $belgica = new classments("BELGICA", $belgica->PTS+=1, $belgica->PAR+=1, $belgica->GAN,$belgica->EMP+=1 , $belgica->PER, $belgica->GF+=$belige2  , $belgica->GC+=$marroco2,   $belgica->DEF);
  }
  // empty
  elseif (empty($marroco2) && empty($belige2)){}
  // else 
  elseif (empty($marroco2) || empty($belige2) || $belige2==0 || $marroco2==0) {
    if (empty($marroco2) || $marroco2==0) {
      $defrant = $belige2 - 0;
      $marroco = new classments("MARRUECOS", $marroco->PTS , $marroco->PAR+=1, $marroco->GAN , $marroco->EMP , $marroco->PER+=1 , $marroco->GF, $marroco->GC+=$belige2  , $marroco->DEF+= -$defrant );
      $belgica = new classments("BELGICA", $belgica->PTS+=3, $belgica->PAR+=1, $belgica->GAN+=1,$belgica->EMP , $belgica->PER, $belgica->GF += $belige2 , $belgica->GC,   $belgica->DEF+= $defrant);
    } elseif (empty($belige2) || $belige2==0) {
      $defrant = $marroco2  - 0;
      $marroco = new classments("MARRUECOS", $marroco->PTS+=3 , $marroco->PAR+=1, $marroco->GAN+=1 , $marroco->EMP , $marroco->PER , $marroco->GF+= $marroco2, $marroco->GC  , $marroco->DEF+= $defrant );
      $belgica = new classments("BELGICA", $belgica->PTS, $belgica->PAR+=1, $belgica->GAN,$belgica->EMP , $belgica->PER+=1, $belgica->GF  , $belgica->GC+=$marroco2,   $belgica->DEF+= -$defrant);
    }
  } else {
    if($marroco2 > $belige2){
      $defrant = $marroco2  - $belige2;
      $marroco = new classments("MARRUECOS", $marroco->PTS+=3 , $marroco->PAR+=1, $marroco->GAN+=1 , $marroco->EMP , $marroco->PER , $marroco->GF+= $marroco2, $marroco->GC+=$belige2 , $marroco->DEF+= $defrant );
      $belgica = new classments("BELGICA", $belgica->PTS, $belgica->PAR+=1, $belgica->GAN,$belgica->EMP , $belgica->PER+=1, $belgica->GF+=$belige2  , $belgica->GC+=$marroco2,   $belgica->DEF+= -$defrant);
    }
    elseif($belige2 >$marroco2 ){
      $defrant = $belige2 - $marroco2 ;
      $marroco = new classments("MARRUECOS", $marroco->PTS , $marroco->PAR+=1, $marroco->GAN , $marroco->EMP , $marroco->PER+=1 , $marroco->GF+=$marroco2, $marroco->GC+=$belige2  , $marroco->DEF+= -$defrant );
      $belgica = new classments("BELGICA", $belgica->PTS+=3, $belgica->PAR+=1, $belgica->GAN+=1,$belgica->EMP , $belgica->PER, $belgica->GF += $belige2 , $belgica->GC+=$marroco2,   $belgica->DEF+= $defrant);
    }
    else{
      $marroco = new classments("MARRUECOS", $marroco->PTS+=1 , $marroco->PAR+=1, $marroco->GAN , $marroco->EMP+=1 , $marroco->PER , $marroco->GF+= $marroco2, $marroco->GC+=$belige2  , $marroco->DEF );
      $belgica = new classments("BELGICA", $belgica->PTS+=1, $belgica->PAR+=1, $belgica->GAN,$belgica->EMP+=1 , $belgica->PER, $belgica->GF+=$belige2  , $belgica->GC+=$marroco2,   $belgica->DEF);
    }
  }
}

// match 4

$croatie2=$_POST["croatie2"];
$canada2=$_POST["canada2"];
if($croatie->PAR==1&&$canada->PAR==1){
  if ($croatie2 == 0 && $canada2 == 0) {
    $croatie = new classments("CROACIA", $croatie->PTS+=1 , $croatie->PAR+=1, $croatie->GAN , $croatie->EMP+=1 , $croatie->PER , $croatie->GF+=$croatie2, $croatie->GC+=$canada2, $croatie->DEF);
    $canada= new classments("CANADA", $canada->PTS+=1 , $canada->PAR+=1, $canada->GAN ,$canada->EMP+=1 , $canada->PER, $canada->GF+=$canada2 , $canada->GC+=$croatie2,   $canada->DEF);
  }
  // empty 
  elseif ( empty($croatie2) && empty($canada2)){}
  // else 
  elseif(empty($croatie2) || empty($canada2) || $croatie2==0 || $canada2==0){
    if(empty($croatie2) || $croatie2==0){
      $croatie = new classments("CROACIA", $croatie->PTS , $croatie->PAR+=1, $croatie->GAN , $croatie->EMP , $croatie->PER+=1 , $croatie->GF, $croatie->GC+=$canada2, $croatie->DEF += -$canada2);
      $canada= new classments("CANADA", $canada->PTS+=3, $canada->PAR+=1, $canada->GAN+=1,$canada->EMP , $canada->PER, $canada->GF += $canada2 , $canada->GC,   $canada->DEF+= $canada2);
    }
    elseif(empty($canada2) || $canada2==0){
      $croatie = new classments("CROACIA", $croatie->PTS+=3 , $croatie->PAR+=1, $croatie->GAN+=1 , $croatie->EMP , $croatie->PER , $croatie->GF+=$croatie2, $croatie->GC, $croatie->DEF += $canada2);
      $canada= new classments("CANADA", $canada->PTS, $canada->PAR+=1, $canada->GAN,$canada->EMP , $canada->PER+=1, $canada->GF , $canada->GC+=$croatie2,   $canada->DEF+= -$canada2);
    }
  }
  else{
    if($croatie2>$canada2){
      $defrant = $croatie2  - $canada2;
      $croatie = new classments("CROACIA", $croatie->PTS+=3 , $croatie->PAR+=1, $croatie->GAN+=1 , $croatie->EMP , $croatie->PER , $croatie->GF+=$croatie2, $croatie->GC+=$canada2, $croatie->DEF += $defrant);
      $canada= new classments("CANADA", $canada->PTS, $canada->PAR+=1, $canada->GAN,$canada->EMP , $canada->PER+=1, $canada->GF+=$canada2 , $canada->GC+=$croatie2,   $canada->DEF+= -$defrant);
    }
    elseif($croatie2<$canada2){
      $defrant = $croatie2  - $canada2;
      $croatie = new classments("CROACIA", $croatie->PTS , $croatie->PAR+=1, $croatie->GAN , $croatie->EMP , $croatie->PER+=1 , $croatie->GF+=$croatie2, $croatie->GC+=$canada2, $croatie->DEF += $defrant);
      $canada= new classments("CANADA", $canada->PTS+=3 , $canada->PAR+=1, $canada->GAN+=1 ,$canada->EMP , $canada->PER, $canada->GF+=$canada2 , $canada->GC+=$croatie2,   $canada->DEF+= -$defrant);
    }
    else{
      $croatie = new classments("CROACIA", $croatie->PTS+=1 , $croatie->PAR+=1, $croatie->GAN , $croatie->EMP+=1 , $croatie->PER , $croatie->GF+=$croatie2, $croatie->GC+=$canada2, $croatie->DEF);
      $canada= new classments("CANADA", $canada->PTS+=1 , $canada->PAR+=1, $canada->GAN ,$canada->EMP+=1 , $canada->PER, $canada->GF+=$canada2 , $canada->GC+=$croatie2,   $canada->DEF);
    }

  }
}
// match 5
$belige3=$_POST["belige3"];
$croatie3=$_POST["croatie3"];
if ($croatie->PAR == 2 && $belgica->PAR == 2) {
  if ($croatie3 == 0 && $belige3 == 0) {
    $croatie = new classments("CROACIA", $croatie->PTS += 1, $croatie->PAR += 1, $croatie->GAN, $croatie->EMP += 1, $croatie->PER, $croatie->GF += $croatie3, $croatie->GC += $belige3, $croatie->DEF);
    $belgica = new classments("BELGICA", $belgica->PTS += 1, $belgica->PAR += 1, $belgica->GAN, $belgica->EMP += 1, $belgica->PER, $belgica->GF += $belige3, $belgica->GC += $croatie3, $belgica->DEF);
  }
  // empty 
  elseif (empty($croatie3) && empty($belige3)) {
  }
  // else 
  elseif (empty($croatie3) || empty($belige3) || $croatie3 == 0 || $belige3 == 0) {
    if (empty($croatie3) || $croatie3 == 0) {
      $croatie = new classments("CROACIA", $croatie->PTS, $croatie->PAR += 1, $croatie->GAN, $croatie->EMP, $croatie->PER += 1, $croatie->GF, $croatie->GC += $belige3, $croatie->DEF += -$belige3);
      $belgica = new classments("BELGICA", $belgica->PTS += 3, $belgica->PAR += 1, $belgica->GAN += 1, $belgica->EMP, $belgica->PER, $belgica->GF += $belige3, $belgica->GC, $belgica->DEF += $belige3);
    } elseif (empty($belige3) || $belige3 == 0) {
      $croatie = new classments("CROACIA", $croatie->PTS += 3, $croatie->PAR += 1, $croatie->GAN += 1, $croatie->EMP, $croatie->PER, $croatie->GF += $croatie3, $croatie->GC, $croatie->DEF += $croatie3);
      $belgica = new classments("BELGICA", $belgica->PTS, $belgica->PAR += 1, $belgica->GAN, $belgica->EMP, $belgica->PER += 1, $belgica->GF, $belgica->GC += $croatie3, $belgica->DEF -= $croatie3);
    }
  } else {
    if ($croatie3 > $belige3) {
      $defrant = $croatie3 - $belige3;
      $croatie = new classments("CROACIA", $croatie->PTS += 3, $croatie->PAR += 1, $croatie->GAN += 1, $croatie->EMP, $croatie->PER, $croatie->GF += $croatie3, $croatie->GC += $belige3, $croatie->DEF += $defrant);
      $belgica = new classments("BELGICA", $belgica->PTS, $belgica->PAR += 1, $belgica->GAN, $belgica->EMP, $belgica->PER += 1, $belgica->GF += $belige3, $belgica->GC += $croatie3, $belgica->DEF -= $defrant);
    } elseif ($croatie2 < $canada2) {
      $defrant = $croatie3 - $belige3;
      $croatie = new classments("CROACIA", $croatie->PTS, $croatie->PAR += 1, $croatie->GAN, $croatie->EMP, $croatie->PER += 1, $croatie->GF += $croatie3, $croatie->GC += $belige3, $croatie->DEF += $defrant);
      $belgica = new classments("BELGICA", $belgica->PTS += 3, $belgica->PAR += 1, $belgica->GAN += 1, $belgica->EMP, $belgica->PER, $belgica->GF += $belige3, $belgica->GC += $croatie3, $belgica->DEF -= $defrant);
    } else {
      $croatie = new classments("CROACIA", $croatie->PTS += 1, $croatie->PAR += 1, $croatie->GAN, $croatie->EMP += 1, $croatie->PER, $croatie->GF += $croatie3, $croatie->GC += $belige3, $croatie->DEF);
      $belgica = new classments("BELGICA", $belgica->PTS += 1, $belgica->PAR += 1, $belgica->GAN, $belgica->EMP += 1, $belgica->PER, $belgica->GF += $belige3, $belgica->GC += $croatie3, $belgica->DEF);
    }
  }
}
// match 6
$marroco3=$_POST["marroc3"];
$canada3=$_POST["canada3"];
if ($marroco->PAR==2 && $canada->PAR==2) {
  if( $canada3==0 && $marroco3==0){
    $marroco = new classments("MARRUECOS", $marroco->PTS+=1 , $marroco->PAR+=1, $marroco->GAN , $marroco->EMP+=1 , $marroco->PER , $marroco->GF, $marroco->GC  , $marroco->DEF );
    $canada= new classments("CANADA", $canada->PTS+=1 , $canada->PAR+=1, $canada->GAN ,$canada->EMP+=1 , $canada->PER, $canada->GF , $canada->GC,   $canada->DEF );
  }
  // empty
  elseif (empty($marroco3) && empty($canada3)){}
  // else 
  elseif (empty($marroco3) || empty($canada3) || $canada3==0 || $marroco3==0) {
    if (empty($marroco3) || $marroco3==0) {
      $marroco = new classments("MARRUECOS", $marroco->PTS , $marroco->PAR+=1, $marroco->GAN , $marroco->EMP , $marroco->PER+=1 , $marroco->GF , $marroco->GC+=$canada3  , $marroco->DEF-= $canada3 );
      $canada= new classments("CANADA", $canada->PTS+=3 , $canada->PAR+=1, $canada->GAN+=1 ,$canada->EMP , $canada->PER, $canada->GF+=$canada3 , $canada->GC ,   $canada->DEF+= $canada3);
    } elseif (empty($canada3) || $canada3==0) {
      $marroco = new classments("MARRUECOS", $marroco->PTS+=3 , $marroco->PAR+=1, $marroco->GAN+=1 , $marroco->EMP , $marroco->PER , $marroco->GF+= $marroco3, $marroco->GC  , $marroco->DEF+= $marroco3 );
      $canada= new classments("CANADA", $canada->PTS , $canada->PAR+=1, $canada->GAN ,$canada->EMP , $canada->PER+=1, $canada->GF , $canada->GC+=$marroco3 ,   $canada->DEF-= $marroco3);
    }
  } else {
    if($marroco3 > $canada3){
      $defrant = $canada3  - $marroco3;
      $marroco = new classments("MARRUECOS", $marroco->PTS+=3 , $marroco->PAR+=1, $marroco->GAN+=1 , $marroco->EMP , $marroco->PER , $marroco->GF+= $marroco3, $marroco->GC+=$canada3 , $marroco->DEF+= -$defrant );
      $canada= new classments("CANADA", $canada->PTS, $canada->PAR+=1, $canada->GAN,$canada->EMP , $canada->PER+=1, $canada->GF+=$canada3 , $canada->GC+=$marroco3,   $canada->DEF+= $defrant);
    }
    elseif($canada3 >$marroco3 ){
      $defrant = $canada3 - $marroco3 ;
      $marroco = new classments("MARRUECOS", $marroco->PTS , $marroco->PAR+=1, $marroco->GAN , $marroco->EMP , $marroco->PER+=1 , $marroco->GF+=$marroco3, $marroco->GC+=$canada3  , $marroco->DEF+= -$defrant );
      $canada= new classments("CANADA", $canada->PTS+=3 , $canada->PAR+=1, $canada->GAN+=1 ,$canada->EMP , $canada->PER, $canada->GF+=$canada3 , $canada->GC+=$marroco3,   $canada->DEF+= $defrant);
    }
    else{
      $marroco = new classments("MARRUECOS", $marroco->PTS+=1 , $marroco->PAR+=1, $marroco->GAN , $marroco->EMP+=1 , $marroco->PER , $marroco->GF, $marroco->GC  , $marroco->DEF );
      $canada= new classments("CANADA", $canada->PTS+=1 , $canada->PAR+=1, $canada->GAN ,$canada->EMP+=1 , $canada->PER, $canada->GF , $canada->GC,   $canada->DEF );
    }
  }
}





$contry = array($marroco, $croatie, $belgica, $canada);
  usort($contry, function ($a, $b) {
    if ($b->PTS == $a->PTS) {
      if ($b->DEF == $a->DEF) {
        if ($b->GF == $a->GF) {

          return $a->GC <=> $b->GC;
        }
        return $b->GF <=> $a->GF;
      }
      return $b->DEF <=> $a->DEF;
    } else {
      return $b->PTS <=> $a->PTS;
    }

  });
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Modyal</title>
  <style>
    table {
      border-collapse: collapse;
      border-spacing: 0;
      width: 100%;
      border: 1px solid #ddd;
    }

    th,
    td {
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
      }
  </style>
</head>
<body>
  <header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="#" class="navbar-brand d-flex align-items-center">
          <strong><span style="font-size: 50px; color: rgb(26, 86, 132)">2X</span><span class="text-primary" style="font-size: xx-large">BET</span>
          </strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </header>
  <main>
    <section class="py-5 text-center container">
      <div style="overflow-x: auto">
        <?php
        if (isset($_POST['submit'])) {
          echo "<table border='1'>";
          echo "<tr><th>#</th><th>SELECCION</th><th>PTS.</th><th>PAR.</th><th>GAN.</th><th>EMP.</th><th>PER.</th><th>G.F.</th><th>G.C.</th><th>+/-</th></tr>";
          foreach ($contry as $car) {
            echo "<tr>";
            echo "<td> " . $class ++ . "</td>";
            echo "<td>" . $car->seleccion . "</td>";
            echo "<td>" . $car->PTS . "</td>";
            echo "<td>" . $car->PAR . "</td>";
            echo "<td>" . $car->GAN . "</td>";
            echo "<td>" . $car->EMP . "</td>";
            echo "<td>" . $car->PER . "</td>";
            echo "<td>" . $car->GF . "</td>";
            echo "<td>" . $car->GC . "</td>";
            echo "<td>" . $car->DEF . "</td>";
            echo "</tr>";
          }
          echo "</table>";
        }
        ?>
      </div>
    </section>

    <form action="index.php" method="POST">
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
              <div class="card shadow-sm">
                <img src="images/round_1.png" alt="" />
                <div class="card-body">
                  <p class="card-text"><strong>Result : </strong></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <input type="number" class="w-50" name="marroc1" />
                    <small class="mx-3">VS</small>
                    <input type="number " class="w-50" name="croatie1" />
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <img src="images/round_2.png" alt="" />
                <div class="card-body">
                  <p class="card-text"><strong>Result : </strong></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <input type="number" class="w-50" name="canada1" />
                    <small class="mx-3">VS</small>
                    <input type="number " class="w-50" name="belige1" />
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <img src="images/round_3.png" alt="" />
                <div class="card-body">
                  <p class="card-text"><strong>Result : </strong></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <input type="number" class="w-50" name="marroc2" />
                    <small class="mx-3">VS</small>
                    <input type="number " class="w-50" name="belige2" />
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <img src="images/round_4.png" alt="" />
                <div class="card-body">
                  <p class="card-text"><strong>Result : </strong></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <input type="number" class="w-50" name="canada2" />
                    <small class="mx-3">VS</small>
                    <input type="number " class="w-50" name="croatie2" />
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <img src="images/round_5.png" alt="" />
                <div class="card-body">
                  <p class="card-text"><strong>Result : </strong></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <input type="number" class="w-50" name="belige3" />
                    <small class="mx-3">VS</small>
                    <input type="number " class="w-50" name="croatie3" />
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <img src="images/round_6.png" alt="" />
                <div class="card-body">
                  <p class="card-text"><strong>Result : </strong></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <input type="number" class="w-50" name="marroc3" />
                    <small class="mx-3">VS</small>
                    <input type="number " class="w-50" name="canada3" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class=" d-flex justify-content-center ">
        <input type="submit"  name="submit" value="Enregistrer" style="width: 200px; background-color:#6c759d;">
      </div>
    </form>
  </main>
  <footer class="text-muted py-5">
    <div class="container">
      <p class="float-right mb-1">
        <a href="#">Back to top</a>
      </p>
      <p class="mb-1">&copy; 2XBET</p>
      
    </div>
  </footer>
  <script src="javascript.js"></script>
</body>

</html>