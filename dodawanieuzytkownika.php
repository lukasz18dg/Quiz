<?php
 session_start();
 if(!(empty($_SESSION['dane']))){$tablica=explode('<!59%6>',$_SESSION['dane']); unset($_SESSION['dane']);}
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
	span.pogrubiony {font-weight: bold;}
   -->
  </style>
 </head>
 <body>
  <?php   
   if(empty($_SESSION['id_uzytkownika'])){include('braksesji.php');}
   if(($_SESSION['moc']!='A')&&($_SESSION['moc']!='M')){include('brakmocy.php');} 
   echo '<table border="1" id="centrowanie" cellspacing="5" cellpadding="5"><tr>';
   include('lewaczesc.php');
   echo '<td id="glownytabelka">';
   echo '<center>Dodawanie pojedynczego użytkownika.<br>Proszę wpisać pola wymagane oznaczone gwiazką.</center>';
   echo '
    <center>
	<form action="indexhome.php">
	<table border="1" cellspacing="5" cellpadding="5">
	 <tr align="center" valign="middle">
	  <td><span class="pogrubiony">1. Login uzytkownika * </span></td>
	  <td><input type="text" name="login" size="35" required = "required" maxlength="25"';
	  if(!(empty($_GET['login']))){echo 'value="'.$_GET['login'].'"';}
	  echo '></td>
	 </tr>
	 <tr align="center" valign="middle">
	  <td><span class="pogrubiony">2. Hasło użytkownika * </span></td>
	  <td> <input type="password" name="haslo" size="35" required = "required" maxlength="40"> </td>
	 </tr>
     <tr align="center" valign="middle">
	  <td><span class="pogrubiony">3. Wybierz uprawnienia użytkownika *</span></td>
	  <td>';
	   if($_SESSION['moc']=='A'){echo'<input type="radio" name="moc" value="A"';
	   if(!(empty($_GET['moc']))){if($_GET['moc']=='A'){echo 'checked';}}
	   echo '> Uprawnienia administratora<br>';}
	   echo'
	   <input type="radio" name="moc" value="M"';
	   if(!(empty($_GET['moc']))){if($_GET['moc']=='M'){echo 'checked';}}
	   echo'> Uprawnienia moderatora<br>
	   <input type="radio" name="moc" value="S"';
	   if(!(empty($_GET['moc']))){if($_GET['moc']=='S'){echo 'checked';}}
	   echo '> Uprawnienia zwykłego użytkownika
	  </td>
	 </tr>
     <tr align="center" valign="middle">
	  <td><span class="pogrubiony">4. E-mail </span></td>
	  <td><input type="text" name="email" size="35" maxlength="70"';
	  if(!(empty($_GET['email']))){echo 'value="'.$_GET['email'].'"';}
	  echo'></td>
	 </tr>';
	 //Poprzez PHP i Javascript wyłączyć wyświetlanie Rok i litera jeśli użytkownik tworzy nowego użytkownika o prawach moderatora lub admina. 
	 echo'<tr align="center" valign="middle">
	  <td><span class="pogrubiony">5. Rok </span></td>
	  <td><input type="text" name="rok" size="35" maxlength="2"';
	  if(!(empty($_GET['rok']))){echo 'value="'.$_GET['rok'].'"';}
	  echo '></td>
	 </tr>
	 <tr align="center" valign="middle">
	  <td><span class="pogrubiony">6. Litera klasy</td>
	  <td><input type="text" name="litera" size="35" maxlength="5"';
	  if(!(empty($_GET['litera']))){echo 'value="'.$_GET['litera'].'"';}
	  echo '></span></td>
	 </tr>';
	 if(isset($tablica))
	 {
	  echo '<tr><td colspan="2"><ul>';
	  foreach($tablica as $i) {echo '<span style="color: RED;"> <li>'.$i.'</li></span>'; }   
	  echo '</ul></td></tr>';
	 }
	 echo'
	 <tr align="center" valign="middle">
	  <td colspan="2">
	   <input type="hidden" name="url" value="walidacjadodawanieuzytkownika">
       <input type="submit" name="wyslij"></center>
	  </td>
	 </tr>
	 <tr>
	 </table>';
  ?>
 </body>
</html>