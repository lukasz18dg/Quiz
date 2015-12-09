<?php
//FUNKCJE 
//FUNKCJE WYKORZYSTYWANE W logowaniedosystemu.php
 function blad($a)
 {
  $tablica[]=$a;
  include('logowanie.php');
 }
//FUNKCJE WYKORZYSTYWANE W:
//*walidacjadodawanieuzytkownika.php 
//*przedmioty.php
 function blad1($a,$strona)
 {
  $tablica[]=$a;
  $_SESSION['dane']=implode('<!59%6>',$tablica);
  header('Location: '.$strona);
  exit();
 } 
?>
 