<?php /* ça c'est le menu des non connecté */ if($_SESSION['privilege'] == "root" OR $_SESSION['privilege'] == "free" OR $_SESSION['privilege'] == "premium") { ?>

<?php

$token = openssl_random_pseudo_bytes(16);
 
//Convert the binary data into hexadecimal representation.
$token = bin2hex($token);
 
//Print it out for example purposes.
/* -------------------------------- */ $link = mysqli_connect("localhost", "program_a755", "motinterdit2", "program_a755");

//-----------------------------------------------------

// Vérification 1 : est-ce qu'on veut poster une news ?

//-----------------------------------------------------


if(isset($_POST['news'])){
if (!empty($_POST['autheur']) AND !empty($_POST['titre']) AND !empty($_POST['contenu']) AND !empty($_POST['images']))

{

    $autheur = addslashes($_POST['autheur']);

    $titre = addslashes($_POST['titre']);

    $contenu = addslashes($_POST['contenu']);

    $images = addslashes($_POST['images']);

    $badge = $_SESSION['badge'];

    $badge2 = $_SESSION['badge2'];

    // On vérifie si c'est une modification de news ou non.


    if ($_POST['id_news'] == 0)

    {

        // Ce n'est pas une modification, on crée une nouvelle entrée dans la table.

        mysqli_query($link, "INSERT INTO news (autheur, titre, contenu, ip, images, badge, badge2) VALUES('".$autheur."', '" . $titre . "', '" . $contenu . "', '".$_SERVER["REMOTE_ADDR"]."', '".$images."', '".$badge."', '".$badge2."')");
}
    

    else

    {

        // On protège la variable "id_news" pour éviter une faille SQL.

        $_POST['id_news'] = addslashes($_POST['id_news']);

        // C'est une modification, on met juste à jour le titre et le contenu.

        mysqli_query($link, "UPDATE news SET titre='" . $titre . "', contenu='" . $contenu . "' WHERE id='" . $_POST['id_news'] . "'");

    }

}
else{

    echo '<center><div class="error">Un des champs n\'est pas remplie !</div></center>';
}}
 

//--------------------------------------------------------

// Vérification 2 : est-ce qu'on veut supprimer une news ?

//--------------------------------------------------------

if (isset($_GET['erioioeorizerozer_zejrnzoerizer8z49r812z54e1r8zer'])) // Si l'on demande de supprimer une news.

{

    // Alors on supprime la news correspondante.

    // On protège la variable « id_news » pour éviter une faille SQL.

    $_GET['erioioeorizerozer_zejrnzoerizer8z49r812z54e1r8zer'] = addslashes($_GET['erioioeorizerozer_zejrnzoerizer8z49r812z54e1r8zer']);

    mysqli_query($link, 'DELETE FROM news WHERE id=\'' . $_GET['erioioeorizerozer_zejrnzoerizer8z49r812z54e1r8zer'] . '\'');

}

?>
<?php /* ça c'est le menu des non connecté */ if($_SESSION['privilege'] == "root"){ ?>
<table>


<tr>

<th>ID &nbsp;| &nbsp;</th>

<th>Modifier &nbsp;| &nbsp;</th>

<th>Supprimer &nbsp;| &nbsp;</th>

<th>Auteur &nbsp;| &nbsp;</th>

<th>Titre &nbsp;|&nbsp; </th>

<th>images &nbsp;|&nbsp; </th>

</tr></table>

<?php

$retour = mysqli_query($link, 'SELECT * FROM news ORDER BY id DESC LIMIT 0, 10');

while ($donnees = mysqli_fetch_array($retour)) // On fait une boucle pour lister les news.

{

?>

<tr>

<td><?php echo stripslashes($donnees['id']); ?></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<td><?php echo '<a href="?vjoziejrtiuzoihetaruehapoezjrhioazenruyze_489419874eazr84et=' . $donnees['id'] . '">'; ?>Modifier</a></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<td><?php echo '<a href="?erioioeorizerozer_zejrnzoerizer8z49r812z54e1r8zer=' . $donnees['id'] . '">'; ?>Supprimer</a></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<td><?php echo stripslashes($donnees['autheur']); ?></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<td><?php echo substr(stripslashes($donnees['titre']),0,5); ?></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<td><?php echo stripslashes($donnees['images']); ?></td>

</tr><br /><br />




<?php

}  // Fin de la boucle qui liste les news.

?>

<hr />
<?php  } } ?>