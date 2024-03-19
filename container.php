<?php include('news/liste.php'); ?>

<?php include('news/ajout.php'); ?>

<?php

 // echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

/* -------------------------------- */ $link = mysqli_connect("localhost", "program_a755", "mdp", "program_a755");

// On récupère les 10 dernières news.

$messagesParPage=10;

$retour_total = mysqli_query($link, 'SELECT COUNT(*) AS total FROM news');


$donnees_total=mysqli_fetch_assoc($retour_total);
$total=$donnees_total['total'];

$nombreDePages=ceil($total/$messagesParPage);

 
if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
{
     $pageActuelle=intval($_GET['page']);
 
     if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
     {
          $pageActuelle=$nombreDePages;
     }
}
else // Sinon
{
     $pageActuelle=1; // La page actuelle est la n°1    
}

$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire
 
// La requête sql pour récupérer les messages de la page actuelle.
$retour=mysqli_query($link, 'SELECT * FROM news ORDER BY id DESC LIMIT '.$premiereEntree.', '.$messagesParPage.'');

 
while ($donnees = mysqli_fetch_assoc($retour))

{

?>

<div class="news">

<?php if($_SESSION['privilege'] == "root") { ?>

<?php
if(isset($_POST['bannir'])){

/* -------------------------------- */ $link = mysqli_connect("localhost", "program_a755", "mdp", "program_a755");

$login = $_POST['login'];

        $add_user = "UPDATE utilisateurs set privilege='ban', badge ='/img/badge/ban.png', Compte_Active='0' WHERE login='".$login."' ";
    
        $result = mysqli_query($link, $add_user) or die(mysqli_error($link));
        
    }

    if(isset($_POST['upgrade'])){

/* -------------------------------- */ $link = mysqli_connect("localhost", "program_a755", "mdp", "program_a755");

$login = $_POST['login'];

        $add_user = "UPDATE utilisateurs set privilege='premium', badge ='/img/badge/premium.png' WHERE login='".$login."' ";
    
        $result = mysqli_query($link, $add_user) or die(mysqli_error($link));
        
    }
 
?>

<form action="" method="post" id="ban">
<input style="width:60px;" type="text" name="login" value="<?php echo $donnees['autheur']; ?>" readonly>
 <input  type="submit" name="bannir" value="Bannir !" />

 <input  type="submit" name="upgrade" value="Passer Premium" />

</form>

</t>

<?php } ?>


    <div id="autheur">Auteur : <t style="color:#fe711b;"><?php echo $donnees['autheur']; ?></t> <img class="badge" src="<?php echo stripslashes($donnees['badge']); ?>" alt="rang"/> | <t style="color:#983846;">Numéros du poste : <?php echo $donnees['id']; ?></t></div><br />
       <div id="titre"><h3><?php echo $donnees['titre']; ?></h3></div><br />
    
<img class="imgnews" src="<?php echo stripslashes($donnees['images']); ?>"/>
    <?php

    // On enlève les éventuels antislashs, PUIS on crée les entrées en HTML (<br />).

    $contenu = nl2br(stripslashes($donnees['contenu']));

    echo "<div class='texte'>".$contenu."</div>";

    ?>
<div style="clear:both;"></div>
</div>
<?php

} // Fin de la boucle des <italique>news</italique>.

echo '<p align="center">Page(s) : '; //Pour l'affichage, on centre la liste des pages
for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
{
     //On va faire notre condition
     if($i==$pageActuelle) //Si il s'agit de la page actuelle...
     {
         echo ' [ '.$i.' ] '; 
     }  
     else //Sinon...
     {
          echo ' <a href="?page='.$i.'">'.$i.'</a> ';
     }
}
echo '</p>';


?>