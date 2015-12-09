<?php
 session_start();
?>
<html>
 <head>
  <title>Strona główna</title>
  <meta name="AUTHOR" content="Tworus Lukasz">
  <meta http-equiv="Expires" content="0" />
  <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <style type="text/css">
   <!--
    #centrowanie {width:80%; min-width:1000px; max-width:3000px; margin: 0 auto;}
    #lewytabelka {width:20%; min-width:200px; max-width:600px;}
    #glownytabelka {width:80%; min-width:800px; max-width:2400px;}
   -->
  </style>
 </head>
 <body>
  <?php   
   if((empty($_COOKIE['id_uzytkownika']))&&(empty($_SESSION['id_uzytkownika']))) {echo '<center>Error 500001\500003</center><br><center>Proszę skomunikować z aministratorem strony</center>'; exit();} 
   if(empty($_SESSION['id_uzytkownika']))
   {
    $_SESSION['id_uzytkownika']=$_COOKIE['id_uzytkownika']; setcookie('id_uzytkownika', "", 0); 
    $_SESSION['login']=$_COOKIE['login']; setcookie('login', "", 0);
    $_SESSION['haslo']=$_COOKIE['haslo']; setcookie('haslo', "", 0);
    $_SESSION['moc']=$_COOKIE['moc']; setcookie('moc', "", 0);
    if(!(empty($_COOKIE['email']))){$_SESSION['email']=$_COOKIE['email']; setcookie('email', "", 0);}
    if(!(empty($_COOKIE['klasa']))){$_SESSION['klasa']=$_COOKIE['klasa']; setcookie('klasa', "", 0);}
    if(!(empty($_COOKIE['litera']))){$_SESSION['litera']=$_COOKIE['litera']; setcookie('litera', "", 0);}
   }
   echo '<table border="1" id="centrowanie" cellspacing="5" cellpadding="5"><tr>';
   include('lewaczesc.php');
   echo '<td id="glownytabelka">';
   echo '<center>Witaj '.$_SESSION['login'].'!</center><br><br> Proszę skorzystać z menu po lewej strony, aby skorzystać z funkcjonalności tej strony.'.'<BR>'; 
   if(!(empty($_SESSION['id_uzytkownika']))) echo '$_SESSION[id_uzytkownika]='.$_SESSION['id_uzytkownika'].'<br>';
   if(!(empty($_SESSION['login']))) echo '$_SESSION[login]='.$_SESSION['login'].'<br>';
   if(!(empty($_SESSION['haslo']))) echo '$_SESSION[haslo]='.$_SESSION['haslo'].'<br>';
   if(!(empty($_SESSION['moc']))) echo '$_SESSION[moc]='.$_SESSION['moc'].'<br>';
   if(!(empty($_SESSION['email']))) echo '$_SESSION[email]='.$_SESSION['email'].'<br>';
   if(!(empty($_SESSION['klasa']))) echo '$_SESSION[klasa]='.$_SESSION['klasa'].'<br>';
   if(!(empty($_SESSION['litera']))) echo '$_SESSION[litera]='.$_SESSION['litera'].'<br>';
   echo '</td></tr><table>'.'<BR>'; 
  ?>
 </body>
</html>