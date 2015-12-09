<?php
 session_start();
 if(empty($_SESSION['id_uzytkownika'])){include('braksesji.php');} 
?>
<html>
 <head>
  <title>Wyloguj się</title>
  <meta name="AUTHOR" content="Tworus Lukasz">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <style type="text/css">
   <!--#centrowanie {width:80%; min-width:1000px; max-width:3000px; margin: 0 auto;}-->
  </style>
 </head>
 <body>
 <?php
  session_destroy();
  echo '<table border="1" id="centrowanie" cellspacing="5" cellpadding="5"><tr><td><center>Gratulacje, poprawnie się wylogowałeś teraz możesz przejść do 
  strony głównej<br><a href="logowanie.php">Strona główna</a></center></td></tr><table><br>'; 
 ?>
 </body>
</html>
 