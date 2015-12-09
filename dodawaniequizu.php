<?php
session_start();
 /*
  W - pole wielokrotnego wyboru
  J - pole jednokrotnego wyboru
  T - pole tekstowe
 */
 if(!(empty($_GET['wysylanie'])))
 {
  if(($_GET['wysylanie'])=='Wyslij')
  {
   header('Refresh:0; URL=indexhome.php?url=walidacjadodawaniaquizu');
   exit();
  }
 }
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
    $tablica[$ostatni]['liczbaodp']=0;
	break;
   }
   case 'pole_jednokrotnego':
   {
    $tablica[$ostatni]['name']='pytanie'.$ostatni;
    $tablica[$ostatni]['value']='';
	$tablica[$ostatni]['typpola']='J';
    $tablica[$ostatni]['poprawna']='';
    $tablica[$ostatni]['liczbaodp']=0;
	break;
   }
   case 'pole_tekstowe':
   {
    $tablica[$ostatni]['name']='pytanie'.$ostatni;
	$tablica[$ostatni]['typpola']='T';
    $tablica[$ostatni]['value']='';
	break;
   }
   $_GET['dodac']="";
  }
  $odpowiedznr=explode(':',$_GET['dodac']);
  $keys = array_keys($odpowiedznr);
  $ostatniodp = $keys[count($keys)-1];   
  if($ostatniodp>0) {$tablica[$odpowiedznr[1]]['liczbaodp']+=1;}
 }
 echo '<html><head><title>Tworus Lukasz</title><meta name="author" content="Tworus £ukasz"><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  </head><body><form action="indexhome.php"><table border="1">';
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
	 if($tablica[$i]['liczbaodp']==0) {$tablica[$i]['liczbaodp']=1;}
	 for($j=0; $j<$tablica[$i]['liczbaodp']+1; $j++)
	 {
	  echo '<tr><td><input type="radio" name="odpowiedz'.$i.'<o8765>'.$j.'" value="'.$j.'">  <input type"text" name="odpowiedztekst'.$ostatni.'"';
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
	 if($tablica[$i]['liczbaodp']==0) {$tablica[$i]['liczbaodp']=1;}
	 for($j=0; $j<$tablica[$i]['liczbaodp']+1; $j++)
	 {
	  echo '<tr><td><input type="checkbox" name="odpowiedz'.$ostatni.'" value="'.$j.'">  <input type"text" name="odpowiedztekst'.$ostatni.'"';
	  if(!(empty($tablica[$i][$j]))){echo 'value="'.$tablica[$i][$j].'"';}
	  echo'></td></tr>';
	 }
	 echo '<tr><td><input type="submit" value="dodajodp:'.$i.'" name="dodac"></td></tr>';
	 break;
	}
   }
  }
  print_r($tablica);
  $_SESSION['dane']=$tablica;
 }
 echo'<tr><td><input type="submit" value="pole_wielokrotnego" name="dodac"><input type="submit" value="pole_jednokrotnego" name="dodac">
  <input type="submit" value="pole_tekstowe" name="dodac"> <br></td>
  <tr>
   <td>
    <input type="hidden" name="url" value="dodawaniequizu">
    <input type="submit" value="Wyslij" name="wysylanie">
   </td>
  </tr>
 </table></form></body></html>'; 
?>