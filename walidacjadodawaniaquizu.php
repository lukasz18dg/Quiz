<?php
session_start();
 /*
  W - pole wielokrotnego wyboru
  J - pole jednokrotnego wyboru
  T - pole tekstowe
 */
 if(empty($_SESSION['id_uzytkownika'])){include('braksesji.php');}
 if(!(empty($_SESSION['dane']))){$tablica=$_SESSION['dane'];}
 if(!(empty($tablica)))
 {
  $keys=array_keys($tablica);
  $ostatni=$keys[count($keys)-1];
  $ostatni+=1;	
 }
 else {$ostatni=1;}
 if(!(empty($_GET['dodac'])))
 {
  switch($_GET['dodac'])
  {
   case 'pole_wielokrotnego':
   {
    $tablica[$ostatni]['name']='pytanie'.$ostatni;
    $tablica[$ostatni]['value']='';
    $tablica[$ostatni]['typpola']='W';
    $tablica[$ostatni]['poprawna']='';
	break;
   }
   case 'pole_jednokrotnego':
   {
    $tablica[$ostatni]['name']='pytanie'.$ostatni;
    $tablica[$ostatni]['value']='';
	$tablica[$ostatni]['typpola']='J';
    $tablica[$ostatni]['poprawna']='';
	break;
   }
   case 'pole_tekstowe':
   {
    $tablica[$ostatni]['name']='pytanie'.$ostatni;
	$tablica[$ostatni]['typpola']='T';
    $tablica[$ostatni]['value']='';
	break;
   }
   case 'kasuj_test':
   {
    unset($_SESSION['dane']);
    unset($_SESSION['bledy']);
    header('Location: indexhome.php?url=dodawaniequizu');
    exit();  
   }
  }
  $odpowiedznr=explode(':',$_GET['dodac']);
  $keys = array_keys($odpowiedznr);
  $ostatniodp = $keys[count($keys)-1];   
  if($ostatniodp>0) {$tablica[$odpowiedznr[1]]['liczbaodp']+=1;}
  unset($_GET['dodac']);
  $_SESSION['dane']=$tablica;
 }

//**********************************POWYZEJ JEST WAZNE PONIZEJ W PRZYSZLOSCI USUNAC*************************************** 
 if(!(empty($_GET['nazwa'])))
 {
  if(($_GET['nazwa'])=='kasujsesje')
  {
   unset($_SESSION['dane']);
   unset($_SESSION['bledy']);
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
 echo 'GET<BR>';
 print_r($_GET);
 echo '
 <form action="indexhome.php">
  <input type="submit" value="kasujsesje" name="nazwa">
  <input type="submit" value="pozostawsesje" name="nazwa">
  <input type="hidden" name="url" value="walidacjadodawaniaquizu">
 </form>';
//
//*****************************WLASCIWA CZESC KODU********************************************* 
// 
 if(!(empty($_SESSION['dane'])))
 {
  for($i=1; $i<$ostatni; $i++)
  {  
   if(!(empty($_GET['pytanie'.$i]))){$tablica[$i]['value']=$_GET['pytanie'.$i];} else {$bledy[]='Brak pytania dla numeru: '.$i;}
   if(($tablica[$i]['typpola'])!='T')
   {
    if(!(empty($tablica[$i]['poprawna']))){$temp=$tablica[$i]['poprawna']; $tablica[$i]['poprawna']='';}
	for($j=1; $j<($tablica[$i]['liczbaodp']+1); $j++)
    {
	 if(($tablica[$i]['typpola'])=='W'){if(!(empty($_GET['odpowiedz:'.$i.':'.$j]))) {$tablica[$i]['poprawna'].=$_GET['odpowiedz:'.$i.':'.$j].'<$%#>';}}
     if(($tablica[$i]['typpola'])=='J'){if(empty($tablica[$i]['poprawna'])){if(!(empty($_GET['odpowiedz:'.$i]))) {$tablica[$i]['poprawna'].=$_GET['odpowiedz:'.$i];}}}
	 if(!(empty($_GET['odpowiedztekst:'.$i.':'.$j]))) 
	 {$tablica[$i][$j]=$_GET['odpowiedztekst:'.$i.':'.$j];} 
	 else {$bledy[]='Brak numer '.$j.' odpowiedzi dla pytania numer '.$i;}  		
	}
	if(empty($tablica[$i]['poprawna']))
	{
	 if(empty($temp)) {$bledy[]='Brak przynajmniej jednej poprawnej odpowiedzi dla pytania numer '.$i;}
	 else {$tablica[$i]['poprawna']=$temp; $bledy[]='Brak odpowiedzi dla pytanie numer '.$i.'. Przywrócono ostatnie poprawne zapamiętane odpowiedzi.';}
	}
	unset($temp);
   } 
  }
  $_SESSION['dane']=$tablica;
  if(!(empty($bledy))){$_SESSION['bledy']=implode('<!59%6>',$bledy);}
  if((empty($_GET['zapis']))||(!(empty($bledy))))
  {
   header('Location: indexhome.php?url=dodawaniequizu');
   exit();
  }
  echo 'Pozostałeś';
  
/*    `id_pytania` int(255) NOT NULL AUTO_INCREMENT,
  `pytanie` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `odpowiedz` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `typ_pytania` varchar(1) COLLATE utf8_polish_ci NOT NULL,
  `poprawna_odpowiedz` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `tworca_pytania` int(255) NOT NULL,
  PRIMARY KEY (`id_pytania`)*/
 }
 else
 {
  $_SESSION['bledy']='Brak danych o tworzonym przez użytkownika teście.<br>Test powinien zawierać minimum jedno zadanie i dwie odpowiedzi.';
  header('Location: indexhome.php?url=dodawaniequizu');
  exit();
 }
?>