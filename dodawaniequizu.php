<?php
session_start();
 /*
  W - pole wielokrotnego wyboru
  J - pole jednokrotnego wyboru
  T - pole tekstowe
 */
 if(empty($_SESSION['id_uzytkownika'])){include('braksesji.php');}
 if(!(empty($_SESSION['dane']))){$tablica=$_SESSION['dane'];}
 if(!(empty($_SESSION['bledy']))){$bledy=explode('<!59%6>',$_SESSION['bledy']); unset($_SESSION['bledy']);}
 if(!(empty($tablica)))
 {
  $keys=array_keys($tablica);
  $ostatni=$keys[count($keys)-1];
  $ostatni+=1;	
 }
 else {$ostatni=1;}
 echo '<html><head><title>Dodawanie nowego quizu</title><meta name="author" content="Tworus Łukasz">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <style type="text/css">
 <!-- #centrowanie {width:80%; min-width:1000px; max-width:3000px; margin: 0 auto;} #lewytabelka {width:20%; min-width:200px; max-width:600px;}
 #glownytabelka {width:80%; min-width:800px; max-width:2400px;} --></style></head><body><form action="indexhome.php">
 <table border="1" id="centrowanie" cellspacing="5" cellpadding="5"><tr>';
 include('lewaczesc.php');
 echo '<td id="glownytabelka"><center><table border="1" cellspacing="3" cellpadding="3"><tr><td><center>TWORZENIE NOWEGO TESTU</tr></td></tr>';
 
 
 
 $połacz=mysql_connect('localhost', 'root','czyalamakota') or die(blad1('Nie można połączyć się z bazą danych','indexhome.php?url=dodawaniequizu'));
 mysql_select_db('projekt', $połacz) or die(blad1('Nie można wybrać bazy danych','indexhome.php?url=dodawaniequizu'));
 
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
 
 
 
 
 
 
 if(!(empty($tablica)))
 {
  for($i=1; $i<$ostatni; $i++)
  {
   switch($tablica[$i]['typpola'])
   {
    case 'T':
    {
     echo '<tr><td>'.$i.' <input type="text" name="'.$tablica[$i]['name'].'"'; 
     if(!(empty($tablica[$i]['value']))) {echo 'value="'.$tablica[$i]['value'].'"';} 
     echo '></td></tr>';
	 break;
    }
	case 'J':
    {
     echo '<tr><td>'.$i.' <input type="text" name="'.$tablica[$i]['name'].'"';
     if(!(empty($tablica[$i]['value']))) {echo 'value="'.$tablica[$i]['value'].'"';}
	 echo '></td></tr>';
	 if(empty($tablica[$i]['liczbaodp'])) {$tablica[$i]['liczbaodp']=2;}
	 for($j=1; $j<$tablica[$i]['liczbaodp']+1; $j++)
	 {
	  echo '<tr><td><input type="radio" name="odpowiedz:'.$i.'" value="'.$j.'"';
	  if($tablica[$i]['poprawna']){if($j==$tablica[$i]['poprawna']){echo 'checked';}} 
	  echo'><input type="text" name="odpowiedztekst:'.$i.':'.$j.'"';
	  if(!(empty($tablica[$i][$j]))){echo 'value="'.$tablica[$i][$j].'"';}
	  echo'></td></tr>';
	 }
	 echo '<tr><td><input type="submit" value="dodajodp:'.$i.'" name="dodac"></td></tr>';
	 break;
    }
	case 'W':
	{
	 echo '<tr><td>'.$i.' <input type="text" name="'.$tablica[$i]['name'].'"';
     if(!(empty($tablica[$i]['value']))) {echo 'value="'.$tablica[$i]['value'].'"';}
	 echo '></td></tr>';
	 if(empty($tablica[$i]['liczbaodp'])) {$tablica[$i]['liczbaodp']=2;}
	 if(!(empty($tablica[$i]['poprawna'])))
	 {
	  $listaodpowiedzi=explode('<$%#>',$tablica[$i]['poprawna']);
	  if(!(empty($listaodpowiedzi)))
      {
       $keys=array_keys($listaodpowiedzi);
       $liczba=$keys[count($keys)-1];
       $liczba+=1;	
      }
	 }
	 for($j=1; $j<$tablica[$i]['liczbaodp']+1; $j++)
	 {
	  echo '<tr><td><input type="checkbox" name="odpowiedz:'.$i.':'.$j.'" value="'.$j.'"';
      if(!(empty($listaodpowiedzi))){for($l=0; $l<$liczba; $l++) {if($j==$listaodpowiedzi[$l]){echo 'checked';}}}  
	  echo '><input type="text" name="odpowiedztekst:'.$i.':'.$j.'"';
	  if(!(empty($tablica[$i][$j]))){echo 'value="'.$tablica[$i][$j].'"';}
	  echo'></td></tr>';
	 }
	 echo '<tr><td><input type="submit" value="dodajodp:'.$i.'" name="dodac"></td></tr>';
	 break;
	}
   }
  }
  $_SESSION['dane']=$tablica;
 }
 echo'<tr><td><input type="submit" value="pole_wielokrotnego" name="dodac"><input type="submit" value="pole_jednokrotnego" name="dodac"> 
 <input type="submit" value="pole_tekstowe" name="dodac"> <br></td><tr><td><input type="hidden" name="url" value="walidacjadodawaniaquizu">
 <input type="submit" value="kasuj_test" name="dodac"><input type="submit" value="Wyslij" name="zapis"></td></tr>';
 if(isset($bledy))
 {
  echo '<tr><td colspan="2"><center>Lista błedów</center><br><ul>';
  foreach($bledy as $i) {echo '<span style="color: RED;"><li>'.$i.'</li></span>'; }   
  echo '</ul></td></tr>';
 }
 echo'</table></center></td></tr><table></form></body></html>'; 
?>