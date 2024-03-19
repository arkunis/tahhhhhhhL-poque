<div class="header">


<div class="social">
                  <?php

/* -------------------------------- */ $link = mysqli_connect("localhost", "program_a755", "mdp", "program_a755");


// on prépare une requête SQL permettant de compter le nombre de tuples (soit le nombre de clients connectés au site) contenu dans la table
$sql = "SELECT count(*) FROM nb_online";

// on lance la requête SQL (mysql_query) et on affiche un message d'erreur si la requête ne se passait pas bien (or die)
$req = mysqli_query($link, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($link));

// on récupère le nombre de tuples obtenus
$data = mysqli_fetch_array($req);

// on libère l'espace mémoire alloué pour cette requête SQL
mysqli_free_result($req);

echo 'Il y a actuellement <t style="color:#8b1e01;">' .$data[0]. '</t>  personne(s) sur cette page et ';
?>

<?php 
/* -------------------------------- */ $link = mysqli_connect("localhost", "program_a755", "mdp", "program_a755");

$query = "SELECT count(*) from utilisateurs";
$result = mysqli_query($link, $query) or die (mysql_error());

$resultat=mysqli_fetch_row($result);

echo ' <t style="color:#8b1e01;"> '.$resultat[0].'</t> inscrit(s)'; // affichage du résultat

?>

<div class="fb-like" data-href="https://www.facebook.com/Lapin-Fut%C3%A9-884988244948402/" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>



<a href="rss.xml">
  <img src="http://www.craym.eu/images/template/rss_mini.png" class="badge" alt="Flux RSS" border="0" />
</a>


</div>

</div>