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
    <tr>
     <td colspan="2"><center>Logowanie do strony internetowej</center></td>
    </tr>
    <tr>
     <td class="szerokosc"><center>Login</center></td>
	 <td><center><input type="text" name="login" required = "required" size="35"></td>
	</tr>
	<tr>
     <td class="szerokosc"><center>Haslo</center></td>
	 <td><center><input type="password" name="haslo" required = "required" size="35"></center></td>
	</tr>
	<?php
	 if(isset($tablica))
	 {
	  echo '<tr><td colspan="2"><ul>';
	  foreach($tablica as $i) {echo '<span style="color: RED;"> <li>'.$i.'</li></span>'; }   
	  echo '</ul></td></tr>';
	 }
	?>
	<tr>
	 <td colspan="2"><center><input type="submit" name="Wyslij" value="Wyślij"></center></td>
	</tr>
   </table>
  </form>
 </body>
</html>
