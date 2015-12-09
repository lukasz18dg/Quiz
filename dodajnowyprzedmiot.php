<?php
session_start();
 if(!(empty($_SESSION['dane']))){$tablica=explode('<!59%6>',$_SESSION['dane']); unset($_SESSION['dane']);}
 if(empty($_SESSION['id_uzytkownika'])){include('braksesji.php');}
 if($_SESSION['moc']=='S'){include('brakmocy.php');}
 echo '<html><head><title>Dodawanie nowego quizu</title><meta name="author" content="Tworus Łukasz">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <style type="text/css">
 <!-- #centrowanie {width:80%; min-width:1000px; max-width:3000px; margin: 0 auto;} #lewytabelka {width:20%; min-width:200px; max-width:600px;}
 #glownytabelka {width:80%; min-width:800px; max-width:2400px;} --></style></head><body>
 <table border="1" id="centrowanie" cellspacing="5" cellpadding="5"><tr>';
 include('lewaczesc.php');
 include('funkcje.php');
 $połacz=mysql_connect('localhost', 'root','czyalamakota') or die(blad1('Nie można połączyć się z bazą danych','indexhome.php?url=dodajnowyprzedmiot'));
 mysql_select_db('projekt', $połacz) or die(blad1('Nie można wybrać bazy danych','indexhome.php?url=dodajnowyprzedmiot'));
 echo '<td id="glownytabelka">';
 if(!(empty($_GET['przedmiot'])))
 {
  $zapytanie_id=mysql_query('SELECT `przedmiot` FROM `przedmioty` WHERE `przedmiot`=\''.$_GET['przedmiot'].'\';');
  if(mysql_num_rows($zapytanie_id)<1)
  {
   $zapytanie_id='INSERT INTO `projekt`.`przedmioty` (`id_przedmiotu`,`przedmiot`) VALUES (NULL, \''.$_GET['przedmiot'].'\');';
   mysql_query($zapytanie_id)or die(blad1('Problem z zapisem do bazy danych','indexhome.php?url=dodajnowyprzedmiot'));
   echo 'Dodano nowy przedmiot<br>';
  }
  else{(blad1('Przedmiot o takiej nazwię istnieje proszę wybrać inną nazwę','indexhome.php?url=dodajnowyprzedmiot'));}
 }
 echo '<table>';
 echo '<form action="indexhome.php">
 Nowy przedmiot <input type="text" name="przedmiot" value="">
 <input type="hidden" name="url" value="dodajnowyprzedmiot">
 <input type="submit" value="Wyslij">
 </form>';
 if(isset($tablica))
 {
  echo '<tr><td colspan="2"><ul>';
  foreach($tablica as $i) {echo '<span style="color: RED;"> <li>'.$i.'</li></span>'; }   
  echo '</ul></td></tr>';
 }
 echo'</table></td></tr><table></body></html>'; 