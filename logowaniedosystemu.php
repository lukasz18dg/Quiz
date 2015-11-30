<?php 
 if (sizeof($_POST) == 0) 
 {
 echo $_SERVER['REQUEST_URI'];
  include('index?url=logowanie');
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
  include('includes/home.php');
 }
?>