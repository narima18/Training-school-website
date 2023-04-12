<!DOCTYPE html>
<html><body>

          <input type="button" Value="Ajouter" onClick="Ajouter()">
     <script type="text/javascript">
     function Ajouter() {

          p = prompt("A quelle date voulez vous partir? ","01/08") ;
          if ( p == null ) {  alert ("Vous devez choisir une date !...") ; return ;
               }
          
          alert (p) ;
          }
     </script>
</body></html>