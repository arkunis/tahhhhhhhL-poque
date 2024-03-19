<?php session_start(); ?>
<?php include('compteur.php'); ?>
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
				<?php include('_don/container.php'); ?>
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