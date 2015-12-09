<?php 
 if (sizeof($_POST) == 0) 
 {
  include('logowanie.php');
  exit();
 }
 $walidacja=false;
 $login=$_POST['login'];
 $haslo=$_POST['haslo'];
 $tablica = array();
 if(($login=="")||($login==" "))
 {
  $tablica[]='Brak wpisanego loginu.';
  $walidacja=true;
 }
 if(($haslo=="")||($haslo==" "))
 {
  $tablica[]='Brak wpisanego hasła';
  $walidacja=true;
 }
 if($walidacja==true)
 {
  include('logowanie.php');
  exit();
 }
 include('funkcje.php');
 $połacz=mysql_connect('localhost', 'root','czyalamakota') or die(blad('Nie można połączyć się z bazą danych'));
 mysql_select_db('projekt', $połacz) or die(blad('Nie można wybrać bazy danych'));
 $zapytanie_id=mysql_query('SELECT * FROM `uzytkownicy` WHERE ((uzytkownicy.login=\''.$login.'\')&&(uzytkownicy.haslo=\''.sha1($haslo).'\')) LIMIT 1'); 
 if((mysql_num_rows($zapytanie_id))==0){blad('Błędna nazwa użytkownika lub hasło');}
 else
 {
  $rekord=mysql_fetch_array($zapytanie_id); 
  setcookie('id_uzytkownika', $rekord['id_uzytkownika'], time()+3600);
  setcookie('login', $rekord['login'], time()+3600);
  setcookie('haslo', $rekord['haslo'], time()+3600);
  setcookie('moc', $rekord['moc'], time()+3600);
  setcookie('email', $rekord['email'], time()+3600);
  setcookie('klasa', $rekord['klasa'], time()+3600);
  setcookie('litera', $rekord['litera'], time()+3600);
  echo '<center>Zalogowałeś/Zalogowałaś się poprawnie już możesz przejść do części tylko dla zalogowanych.<center><br><a href="indexhome.php">Dalej</a>';
 }
?>