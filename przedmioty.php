<?php
session_start();
 if(!(empty($_SESSION['dane']))){$tablica=explode('<!59%6>',$_SESSION['dane']); unset($_SESSION['dane']);}
 if(empty($_SESSION['id_uzytkownika'])){include('braksesji.php');}
 echo '<html><head><title>Dodawanie nowego quizu</title><meta name="author" content="Tworus Łukasz">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <style type="text/css">
 <!-- #centrowanie {width:80%; min-width:1000px; max-width:3000px; margin: 0 auto;} #lewytabelka {width:20%; min-width:200px; max-width:600px;}
 #glownytabelka {width:80%; min-width:800px; max-width:2400px;} --></style></head><body>
 <table border="1" id="centrowanie" cellspacing="5" cellpadding="5"><tr>';
 include('lewaczesc.php');
 echo '<td id="glownytabelka">';
 include('funkcje.php');
 $połacz=mysql_connect('localhost', 'root','czyalamakota') or die(blad1('Nie można połączyć się z bazą danych','indexhome.php?url=przedmioty'));
 mysql_select_db('projekt', $połacz) or die(blad1('Nie można wybrać bazy danych','indexhome.php?url=przedmioty'));
 $zapytanie_id=mysql_query('SELECT `przedmiot` FROM `przedmioty`;');
 echo '<table>';
 if(mysql_num_rows($zapytanie_id)==0){echo'<center>Brak testów, proszę skomunikować się z administratorem strony lub nauczycielem.</center>';}
 while($row = mysql_fetch_array($zapytanie_id))
 {
  echo $row['przedmiot'].'<br>';
 }
 if($_SESSION['moc']!='S'){echo '<tr><td><a href="indexhome.php?url=dodajnowyprzedmiot">Dodaj nowy przedmiot</a></td></tr>';}
 echo'</table></td></tr><table></body></html>'; 