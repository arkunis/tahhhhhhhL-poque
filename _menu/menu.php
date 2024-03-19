<div id='cssmenu'>

   

<ul>

<a href="/"><img src="img/logodessin.png" class="logo_header"/></a>

<?php
	session_start();

/* -------------------------------- */ $link = mysqli_connect("localhost", "user", "mdp", "bdd");

	$login = $_SESSION['login'];
	$retour = mysqli_query($link, 'SELECT badge FROM utilisateurs WHERE login="'.$login.'"');
	$donnees = mysqli_fetch_array($retour) // On fait une boucle pour lister les news.
?>

<?php $var = $_SESSION['login']; ?>
						   <?php /* ça c'est le menu des non connecté */ if($_SESSION['privilege'] == "free" 
						   or $_SESSION['privilege'] == "root" 
						   or $_SESSION['privilege'] == "premium"
                     or $_SESSION['privilege'] == "ban") { ?>
<div class="profile"><span><?php echo substr($var,0,10); ?> <img class="badge" src="<?php echo $donnees['badge']; ?>"/></span>
</div>
<?php } ?>



<?php /* ça c'est le menu des non connecté */ if($_SESSION['privilege'] == "") { ?>
   <li class='active'><a href='/'><span>Accueil</span></a></li>
   <li><a href='register.php'><span>Connexion / Inscription</span></a></li>
   <li><a href='don.php' ><span>Don</span></a></li>
   <li class='last'><a href='info.php'><span>Info</span></a></li>
<?php } ?>

<?php /* ça c'est le menu des non connecté */ if($_SESSION['privilege'] == "free") { ?>
   <li class='active'><a href='/'><span>Accueil</span></a></li>
   <li><a href='account.php'><span>Mon compte</span></a></li>
   <li><a href='don.php'><span>Don</span></a></li>
   <li><a href='info.php'><span>Info</span></a></li>
   <li class='last'><a href='register.php?erreur=logout'><span>Déconnexion</span></a></li>
<?php } ?>

<?php /* ça c'est le menu des non connecté */ if($_SESSION['privilege'] == "premium") { ?>
   <li class='active'><a href='/'><span>Accueil</span></a></li>
   <li><a href='account.php'><span>Mon compte</span></a></li>
   <li><a href='don.php'><span>Don</span></a></li>
   <li><a href='info.php'><span>Info</span></a></li>
   <li class='last'><a href='register.php?erreur=logout'><span>Déconnexion</span></a></li>
<?php } ?>

<?php /* ça c'est le menu des non connecté */ if($_SESSION['privilege'] == "root") { ?>
   <li class='active'><a href='/'><span>Accueil</span></a></li>
   <li><a href='newsletter.php'><span>Newsletter</span></a></li>
   <li><a href='account.php'><span>Mon compte</span></a></li>
   <li><a href='don.php'><span>Don</span></a></li>
   <li><a href='info.php'><span>Info</span></a></li>
   <li class='last'><a href='register.php?erreur=logout'><span>Déconnexion</span></a></li>
<?php } ?>


<?php /* ça c'est le menu des non connecté */ if($_SESSION['privilege'] == "ban") { ?>
   <li class='active'><a href='/'><span>Accueil</span></a></li>
   <li><a href='account.php'><span>Mon compte</span></a></li>
   <li><a href='don.php'><span>Don</span></a></li>
   <li><a href='info.php'><span>Info</span></a></li>
   <li class='last'><a href='register.php?erreur=logout'><span>Déconnexion</span></a></li>
<?php } ?>





</ul>


</div>