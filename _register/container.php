                    <div class="conninscript">

                   <?php 

                   function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789')
{
    $nb_lettres = strlen($chaine) - 1;
    $generation = '';
    for($i=0; $i < $nb_car; $i++)
    {
        $pos = mt_rand(0, $nb_lettres);
        $car = $chaine[$pos];
        $generation .= $car;
    }
    return $generation;
}

?>

<?php if(isset($message1)) { ?>
     <p><?php echo $message1; ?></p>
<?php } if($masquer_formulaire2 != true) { ?>

 <?php
    // Instantiate the AYAH object. You need to instantiate the AYAH object
    // on each page that is using PlayThru.
    require_once("ayah/ayah.php");
    $ayah = new AYAH();
    // Check to see if the user has submitted the form. You will need to replace
    // 'my_submit_button_name' with the name of your 'Submit' button.
    if (array_key_exists('connexion', $_POST))
    {
            // Use the AYAH object to see if the user passed or failed the game.
            $score = $ayah->scoreResult();
            if ($score)
            {
                // This happens if the user passes the game. In this case,
                // we're just displaying a congratulatory message.
                    echo "<center>Bravo, tu es un humain mais remplie le formulaire</center><br />";
            }
            else
            {
                // This happens if the user does not pass the game.
                echo "<center>Désolé tu n'est pas humain, recommence !</center><br />";
            }
    }
    ?>

                        <center>
      <?php if(isset($_GET['erreur']) && ($_GET['erreur'] == "login")) { // Affiche l'erreur  ?>
      <span style=""><div class="error">Votre login ou mot de passe est incorrect, rééssayer</div></span><?php } ?>
      <?php if(isset($_GET['erreur']) && ($_GET['erreur'] == "delog")) { // Affiche l'erreur ?>
      <span style=""><div class="success">Deconnexion réussit !</div></span><?php } ?>
      </center>

                            <form  class="form-style-7" action="" method="POST" autocomplete="on"> 
                            <ul>
                            <li>
                                <label for="name">Login</label>
                                <input type="text" id="namelogin" name="login" maxlength="100">
                                <span>Entrer votre login</span>
                            </li>
                            <li>
                                <label for="password">Mot de passe</label>
                                <input type="password" id="passlogin" name="password" maxlength="100">
                                <span>Entrer votre mot de passe</span>
                            </li>
                            
                            <input  type="checkbox" name="CB_Connexion_Automatique"/>
          Connexion automatique

                            <li>
                                 <?php
                    // Use the AYAH object to get the HTML code needed to
                    // load and run PlayThru. You should place this code
                    // directly before your 'Submit' button.
                    echo $ayah->getPublisherHTML();
              ?>
                                <input type="submit" id="connexion" name="connexion" value="Connexion" >
                            </li>
                            </ul>
                            </form>

                            <?php } ?>

<hr />



<?php if(isset($message)) { ?>
<p><?php echo $message; ?></p>
<?php } if($masquer_formulaire != true) { ?>
                            <form class="form-style-7" action="" method="POST" autocomplete="on"> 
                                <h1> Inscription </h1> 
                            <ul>
                            <li>
                                <label for="name">Nouveau login</label>
                                <input type="text" id="login" name="login" maxlength="100">
                                <span>Entrer un login correct</span>
                            </li>
                            <li>
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" maxlength="100">
                                <span>Entrer un mail valide ! Un mail vous sera envoyé !</span>
                            </li>
                            <li>
                                <label for="password">Mot de passe</label>
                                <input type="password" id="password" name="password" maxlength="100">
                                <span>Entrer votre mot de passe (4 caractères minimum)</span>
                            </li>
                             
                            <li>
                                <label for="password">Confirmer le mot de passe</label>
                                <input type="password" id="password2" name="TB_Confirmation_Mot_de_Passe" maxlength="100">
                                <span>Entrer à nouveau votre mot de passe</span>
                            </li>
                            <li style="text-align:center;">
                                <?php echo "Mot de passe généré aléatoirement : "; 
                                echo chaine_aleatoire(8); ?>
                            </li>
                            <li>
                                    <input type="reset" name="inscription" value="Effacer"/>
                                    <input type="submit" name="inscription" id="inscription" value="Valider"/> 
                            
                            </li>
                            </ul>
                            </form>

                            <p style="color:#178dfc;text-align:center;">Toutes vos informations tel que votre mot de passe n'est accèssible par personne d'autre que vous ! </p>

                            <?php } ?>

                        

                    </div>

                    <script type="text/javascript">
//auto expand textarea
function adjust_textarea(h) {
    h.style.height = "20px";
    h.style.height = (h.scrollHeight)+"px";
}
</script>