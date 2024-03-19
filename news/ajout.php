<?php /* ça c'est le menu des non connecté */ if($_SESSION['privilege'] == "root" or $_SESSION['privilege'] == "free" OR $_SESSION['privilege'] == "premium") { ?>

<?php


/* -------------------------------- */ $link = mysqli_connect("localhost", "program_a755", "motinterdit2", "program_a755");

if (isset($_GET['vjoziejrtiuzoihetaruehapoezjrhioazenruyze_489419874eazr84et'])) // Si on demande de modifier une news.

{


     $_GET['vjoziejrtiuzoihetaruehapoezjrhioazenruyze_489419874eazr84et'] = addslashes(htmlspecialchars($_GET['vjoziejrtiuzoihetaruehapoezjrhioazenruyze_489419874eazr84et']));

    // On récupère les informations de la news correspondante.

    $retour = mysqli_query($link, 'SELECT * FROM news WHERE id=\'' . $_GET['vjoziejrtiuzoihetaruehapoezjrhioazenruyze_489419874eazr84et'] . '\'');

    $donnees = mysqli_fetch_array($retour);



    // On place le titre et le contenu dans des variables simples.
    $autheur = $_SESSION['login'];

    $titre = stripslashes($donnees['titre']);

    $contenu = stripslashes($donnees['contenu']);

    $images = stripslashes($donnees['images']);

    $badge = stripslashes($donnees['badge']);

    $badge2 = stripslashes($donnees['badge2']);

    $id_news = $donnees['id']; // Cette variable va servir pour se souvenir que c'est une modification.
//var_dump($_GET);

}

else // C'est qu'on rédige une nouvelle news.

{

    // Les variables $titre et $contenu sont vides, puisque c'est une nouvelle news.
    $autheur = $_SESSION['login'];

    $titre = '';

    $contenu = '';

    $images = '';

    $badge = $_SESSION['badge'];

    $badge2 = $_SESSION['badge2'];

    $id_news = 0; // La variable vaut 0, donc on se souviendra que ce n'est pas une modification.

}

?>

<?php if(isset($message)) { ?>
     <p><?php echo $message; ?></p>
     <?php } ?>

<form class="form-style-7" action="" method="POST">
<ul>
<li>
 <label for="name">Auteur </span></label>
  <input type="text" name="autheur" value="<?php echo $autheur; ?>" readonly>
    <span>Le nom afficher sera votre pseudo ! Vous ne pourrez modifier ça</span>
    </li>
                            <li>
 <label for="name">Titre </span></label>
  <input type="text" name="titre" placeholder="Mettre [SUR] si la source est sûr" value="<?php echo $titre; ?>">
    <span>Entrer un titre pour votre news --  <t style="color:#861e00;">/!\ Mettre [SUR] si le post est de sources sûr /!\</t></span>
    </li>


    <textarea name="contenu" id="contenu" maxlength="880"><?php echo $contenu; ?></textarea><br />
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'contenu' );
            </script>


    <li>
 <label for="url">Images <span style="color:#680000;">(*)</span></label>
  <input type="url" name="images" placeholder="http://liendevotreimage.com/ (180x180 de préférence)" value="<?php echo $images; ?>">
    <span>Insérer le lien de l'image de votre article (mettez une image carré pour une optimisation de l'espace)</span>
    </li>
    
<li>
    
    <input type="hidden" id="id_news" name="id_news" value="<?php echo $id_news; ?>" />
    <input type="reset" value="Effacer" />
    <input type="submit" name="news" value="Envoyer" />
</li>
</ul>

</form>
<p style="color:#680000;">(*) = De préférence mettez une image qui illustre bien votre information !</p>
<?php } ?>

<?php /* ça c'est le menu des non connecté */ if($_SESSION['privilege'] == "ban") { ?>

<div style="text-align:center;"><p><h1>VOUS ÊTES BANNI !</h1></p></div>

    <?php } ?>

<?php /* ça c'est le menu des non connecté */ if($_SESSION['privilege'] == "") { ?>

<div style="text-align:center;"><p>Soyez le premier de vos amis à poster une NEWS ! Pour cela il vous faut être connecté | <a href="register.php" style="color:#178dfc;">Cliquez ici pour vous connecter</a></p></div>

	<?php } ?>