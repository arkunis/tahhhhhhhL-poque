<?php if(isset($message)) { ?>
<p><?php echo $message; ?></p>
<?php } ?>
<center>
      <?php if(isset($_GET['add']) && ($_GET['add'] == "ok")) { // Affiche l'erreur  ?>
      <span style=""><div class="success">Votre compte à été mis à jour, à la prochaine reconnexion vos changement  seront effectué</div></span> <br /> <?php } ?>
      <?php if(isset($_GET['erreur']) && ($_GET['erreur'] == "empty")) { // Affiche l'erreur ?>
      <span style=""><div class="warning">Mise à jour du compte échoué ! Votre code unique n'est pas correct !</div></span> <br /> <?php } ?>
       <?php if(isset($_GET['erreur']) && ($_GET['erreur'] == "compte")) { // Affiche l'erreur ?>
      <span style=""><div class="error">Votre code unique est incorrect !</div></span> <br /> <?php } ?>
</center>

<form class="form-style-7" action="" method="post">

             <ul>
             <li>
   
   <label for="name">Votre code unique <span style="color:#680000;">(*)</span> :</label>
   <input type="text" id="passcode" maxlength="20" name="Clef_Activation" />
   <span>Entrer le code que vous avez reçu par email, OBLIGATOIRE !</span>
</li>
<li>
   <label for="password">Nouveau mot de passe :</label>
   <input id="password" type="password" maxlength="50" name="password"/>
   <span>Entrer un nouveau mot de passe</span>
</li>

<li>
      <input type="submit" value="Mise à jour MDP" name="BT_pass"/>
</li>
</ul>
</form>

<form class="form-style-7" action="" method="post">
<ul>

 <li>
   
   <label for="name">Votre code unique <span style="color:#680000;">(*)</span> :</label>
   <input type="text" id="passcode" maxlength="20" name="Clef_Activation" />
   <span>Entrer le code que vous avez reçu par email, OBLIGATOIRE !</span>
</li>
<li>
<label for="email">Nouvelle email :</label>
   <input id="email" type="text" maxlength="100" name="email"/>
   <span>Entrer un email correct !</span>
 </li>  

<li>
      <input type="submit" value="Mise à jour EMAIL" name="BT_email"/>
</li>
</ul>
</form>

</center>
<p style="color:#680000;">(*) = Obligatoire</p>

<hr />

<p>
<?php 

echo "Email actuel : <span style=\"color:#8b1e01;\">".$_SESSION["email"]."</span> <br /><br />";

echo "Login et badge : <span style=\"color:#8b1e01;\">".$_SESSION["login"]."</span>"; 

?>
 <img class="badge" src="<?php echo $donnees['badge']; ?>"/> <br /><br />

<?php if($_SESSION['privilege'] == "ban") {
echo "Status du compte : <t style='color:#ff0000;'>banni</t>";
  }
else{

  echo "Status du compte : <t style='color:#029c1b;'>en règle</t>";
}
?>
</p>