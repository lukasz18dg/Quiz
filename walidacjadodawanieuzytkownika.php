<?php
session_start();
 $radio=''; $email=''; $rok=''; $litera='';
 $login=$_GET['login']; 
 $haslo=$_GET['haslo']; 
 if(empty($_GET['moc'])) 
 {
  $tablica[]='Brak uprawnien dla uzytkownika.';
  header('Location: indexhome.php?url=dodawanieuzytkownika&login='.$login.'&haslo='.$haslo.'&moc='.$radio.'&email='.$email.'&rok='.$rok.'&litera='.$litera);
  exit();
 } 
 else {$radio=$_GET['moc'];}
 if(!(empty($_GET['email']))){$email=$_GET['email'];}
 if(!(empty($_GET['rok']))){$rok=$_GET['rok'];}
 if(!(empty($_GET['litera']))){$litera=$_GET['litera'];}
 include('funkcje.php');
 if(($login=='')||($login==' ')){blad1('Błednie podany lub pusty login.','indexhome.php?url=dodawanieuzytkownika&login='.$login.'&haslo='.$haslo.'&moc='.$radio.'&email='.$email.'&rok='.$rok.'&litera='.$litera);}
 if(($haslo=='')||($haslo==' ')){blad1('Błędne podaeny lub puste hasło.','indexhome.php?url=dodawanieuzytkownika&login='.$login.'&haslo='.$haslo.'&moc='.$radio.'&email='.$email.'&rok='.$rok.'&litera='.$litera);}
 if($email==' '){blad1('Nie poprawny e-mail.','indexhome.php?url=dodawanieuzytkownika&login='.$login.'&haslo='.$haslo.'&moc='.$radio.'&email='.$email.'&rok='.$rok.'&litera='.$litera);}
 if($radio=='S'){if(empty($rok)){blad1('Brak roku dla studenta.','indexhome.php?url=dodawanieuzytkownika&login='.$login.'&haslo='.$haslo.'&moc='.$radio.'&email='.$email.'&rok='.$rok.'&litera='.$litera);}}
 if($radio=='S'){if(empty($litera)){blad1('Brak klasy dla studenta.','indexhome.php?url=dodawanieuzytkownika&login='.$login.'&haslo='.$haslo.'&moc='.$radio.'&email='.$email.'&rok='.$rok.'&litera='.$litera);}}
 // POPRAWIC NA JEDEN WARUNEK XOR NIE DZIALA, DZIWNE BLEDY
 $połacz=mysql_connect('localhost', 'root','czyalamakota') or die(blad1('Nie można połączyć się z bazą danych','indexhome.php?url=dodawanieuzytkownika'));
 mysql_select_db('projekt', $połacz) or die(blad1('Nie można wybrać bazy danych','indexhome.php?url=dodawanieuzytkownika'));
 $zapytanie_id=mysql_query('SELECT `login` FROM `uzytkownicy` WHERE `login` = \''.$login.'\';');
 if((mysql_num_rows($zapytanie_id))<1)
 {
  $zapytanie_id=mysql_query('SELECT `email` FROM  `uzytkownicy` WHERE `email`= \''.$email.'\';'); 
  if((mysql_num_rows($zapytanie_id))<1)
  {
   $zapytanie='INSERT INTO `projekt`.`uzytkownicy`(`id_uzytkownika`,`login`,`haslo`,`moc`,`email`,`klasa`,`litera`) VALUES (NULL,\''.$login.'\',\''.sha1($haslo).'\',\''.$radio.'\',';
   if(!(empty($email))){$zapytanie.='\''.$email.'\'';} else{$zapytanie.='NULL';} $zapytanie.=',';
   if(!(empty($rok))){$zapytanie.='\''.$rok.'\'';} else{$zapytanie.='NULL';} $zapytanie.=',';
   if(!(empty($litera))){$zapytanie.='\''.$litera.'\'';}  else{$zapytanie.='NULL';} 
   $zapytanie.=');';
   mysql_query($zapytanie)or die(blad1('Wystąpiły błędy przy zapisywaniu danych.','indexhome.php?url=dodawanieuzytkownika&login='.$login.'&haslo='.$haslo.'&moc='.$radio.'&email='.$email.'&rok='.$rok.'&litera='.$litera));
   echo '<center>Uzytkownik został pomyślnie dodany.<BR>Nastąpi przeniesienie użytkownika za 5s do formularza dodawania użytkowników.</center>';
   header('refresh: 5; url=indexhome.php?url=dodawanieuzytkownika');
   exit();
  }
  else{blad1('E-mail został wykorzystany, już na tej stronie.','indexhome.php?url=dodawanieuzytkownika&login='.$login.'&haslo='.$haslo.'&moc='.$radio.'&email='.$email.'&rok='.$rok.'&litera='.$litera);}
 }
 else{blad1('Login o takej nazwie istnieje w bazie.','indexhome.php?url=dodawanieuzytkownika&login='.$login.'&haslo='.$haslo.'&moc='.$radio.'&email='.$email.'&rok='.$rok.'&litera='.$litera);} 
?>