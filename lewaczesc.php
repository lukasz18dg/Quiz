<?php
 echo '
 <td id="lewytabelka">
  <center>
   <a href="indexhome.php?url=home">Strona główna</a><br>';
   if(!($_SESSION['moc']=='S'))
   {
    echo'<a href="indexhome.php?url=dodawaniequizu">Dodawanie nowego quizu</a><br>
         <a href="indexhome.php?url=dodawanieuzytkownika">Dodawanie uzytkownika</a><br>';
   }
   echo'<a href="indexhome.php?url=wyloguj">Wyloguj</a><br>
  </center>
 </td>';
?>