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
    #lewydiv {width:20%; min-width:200px; max-width:600px;}
    #glownydiv {width:80%; min-width:800px; max-width:2400px;}
   -->
  </style>
 </head>
 <body>
 <?php if((isset($rekord)))
 {
  echo '<table border="1" id="centrowanie" cellspacing="5" cellpadding="5"><tr>';
  echo '<td id="lewydiv"></td>';
  echo '<td id="glownydiv">';
  echo '<center>Witaj '.$rekord['login'].'!</center><br><br> Proszę skorzystać z menu po lewej strony, aby skorzystać z funkcjonalności tej strony.';
  echo '</td></tr><table>';
 }
 else{echo '<center>Error 500001</center><br><center>Proszę skomunikować z aministratorem strony</center>';}
 ?>
 </body>
</html>