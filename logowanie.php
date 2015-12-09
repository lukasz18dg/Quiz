<html>
 <head>
  <title>Logowanie</title>
  <meta name="AUTHOR" content="Tworus Lukasz">
  <meta http-equiv="Expires" content="0" />
  <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <style type="text/css">
   <!--
    #centrowanie{width:80%; min-width:500px; max-width:750px; margin: 0 auto;}
    td.szerokosc{width:30%; min-width:150px; max-width:2500px;}
   //-->
  </style>
 </head>
 <body>
  <form name="logowanie" method="post" action="logowaniedosystemu.php"> 
   <table border="1" id="centrowanie" cellspacing="5" cellpadding="5">
    <tr align="center" valign="middle">
     <td colspan="2">Logowanie do strony internetowej</td>
    </tr>
    <tr align="center" valign="middle">
     <td class="szerokosc">Login</td>
	 <td><input type="text" name="login" required = "required" size="35" maxlength="25"></td>
	</tr>
	<tr align="center" valign="middle">
     <td class="szerokosc">Haslo</td>
	 <td><input type="password" name="haslo" required = "required" size="35" maxlength="40"></td>
	</tr>
	<?php
	 if(isset($tablica))
	 {
	  echo '<tr><td colspan="2"><ul>';
	  foreach($tablica as $i) {echo '<span style="color: RED;"> <li>'.$i.'</li></span>'; }   
	  echo '</ul></td></tr>';
	 }
	?>
	<tr align="center" valign="middle">
	 <td colspan="2"><input type="submit" name="Wyslij" value="Wyślij"></td>
	</tr>
   </table>
  </form>
 </body>
</html>
