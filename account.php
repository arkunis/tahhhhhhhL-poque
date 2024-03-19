<?php session_start(); ?>
<?php if($_SESSION['privilege'] == "root") {
	
}
elseif ($_SESSION['privilege'] == "free") {

}

elseif ($_SESSION['privilege'] == "premium") {

}
elseif ($_SESSION['privilege'] == "ban") {

}
else{
  header("Location: index.php");
}
 ?>
<?php include('compteur.php'); ?>
<?php

 // echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

if(isset($_POST['BT_pass'])){

			 if(!ereg("^[A-Za-z0-9]{4,}$", $_POST["password"]))
          {
               $message = "<center><div class=\"error\">4 caratère minimum, vérifier votre code unique</div></center>";
          }
          else{
	if(($_POST['Clef_Activation'] != $_SESSION["Clef_Activation"]) or ($_POST['Clef_Activation'] == "")){ 
	header("Location:account.php?erreur=empty");
	}
	 if($_POST['Clef_Activation'] == $_SESSION['Clef_Activation']){ 
		
		$pass = $_POST['password'];
		$email = $_POST['email'];
		$clef = $_POST['Clef_Activation'];

/* -------------------------------- */ $link = mysqli_connect("localhost", "program_a755", "mdp", "program_a755");

                           define('PREFIX_SALT', 'cant');
                           define('SUFFIX_SALT', 'hack');
		
		$add_user = "UPDATE utilisateurs set password='".md5(PREFIX_SALT.$pass.SUFFIX_SALT)."' WHERE Clef_Activation='".$clef."' ";
  	
  		$result = mysqli_query($link, $add_user) or die(mysqli_error());
		header("Location:account.php?add=ok");
	}

	else{
	header("Location:account.php?erreur=compte");
	}
} }
?>

<?php
if(isset($_POST['BT_email'])){

	if(!ereg("^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]{2,}[.][a-zA-Z]{2,4}$", $_POST["email"])){

			$message = "<center><div class=\"error\">Cette adresse mail n'est pas valide ! </div></center>";

		}
		else{

	if(($_POST['Clef_Activation'] != $_SESSION["Clef_Activation"]) or ($_POST['Clef_Activation'] == "")){ 
	header("Location:account.php?erreur=empty");
	}
	 if($_POST['Clef_Activation'] == $_SESSION['Clef_Activation']){ 
		
		$pass = $_POST['password'];
		$email = $_POST["email"];
		$clef = $_POST['Clef_Activation'];

/* -------------------------------- */ $link = mysqli_connect("localhost", "program_a755", "mdp", "program_a755");

		$add_user = "UPDATE utilisateurs set email='".$email."' WHERE Clef_Activation='".$clef."' ";
  	
  		$result = mysqli_query($link, $add_user) or die(mysqli_error());
		header("Location:account.php?add=ok");
	}

	else{
	header("Location:account.php?erreur=compte");
	}
} }
?>
<!DOCTYPE html>
<html lang="fr" class="no-js">


		<!-- head -->
				<?php include('head.php'); ?>
		<!-- fin head -->

		<body>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
 			var js, fjs = d.getElementsByTagName(s)[0];
  			if (d.getElementById(id)) return;
  			js = d.createElement(s); js.id = id;
  			js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5";
  			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>


		<!-- MENU -->
				<?php include('_menu/menu.php'); ?>
		<!-- FIN MENU -->

		<!-- header -->
				<?php include('_header/header.php'); ?>
		<!-- Fin header -->

		<!-- Boite de dialoge changer id pour nouvelle fenetre -->		
				<?php //include('_dialog/dialog.php'); ?>
		<!-- Fin Boite de dialoge changer id pour nouvelle fenetre -->

		<!-- Container -->
		<div class="container-l">
				<?php include('_account/container.php'); ?>
		</div>
		<!-- Fin container -->

		<!-- footer -->
				<?php include('_footer/footer.php'); ?>
		<!-- Fin footer -->




		<!-- DEBUT JS -->
		<script src="js/classie.js"></script>
		<script src="//code.jquery.com/jquery-2.1.4.js"></script>
		<!-- FIN JS -->


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5689ddf4bc4176802561eec8/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
		</body>
</html>
