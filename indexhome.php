<?php
 if(!isset($_GET['url']))
 {include('home.php');}
 else
 {
  if (is_file($_GET['url'].'.php'))
  {include($_GET['url'].'.php');}   
  else {echo'Error 500002 - Brak strony o podanej nazwie.';}        
 }                             
?>