<?php
session_start();
 if(!(empty($_GET['nazwa'])))
 {
  if(($_GET['nazwa'])=='kasujsesje')
  {
   unset($_SESSION['dane']);
   header('Location: indexhome.php?url=dodawaniequizu');
   exit();  
  }
  if(($_GET['nazwa'])=='pozostawsesje')
  {
   header('Location: indexhome.php?url=dodawaniequizu');
   exit();
  }
 }
 echo 'SESJA <br>';
 print_r($_SESSION['dane']);
 echo '<BR><BR><BR><BR>';
 echo 'POST<BR>';
 print_r($_POST);
 echo '<BR><BR><BR><BR>';
 echo 'GET<BR>';
 print_r($_GET);
 echo '
 <form action="indexhome.php">
  <input type="submit" value="kasujsesje" name="nazwa">
  <input type="submit" value="pozostawsesje" name="nazwa">
  <input type="hidden" name="url" value="walidacjadodawaniaquizu">
 </form>';
?>