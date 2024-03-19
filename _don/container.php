<form class="form-style-7" action="https://www.paypal.com/cgi-bin/webscr" method="post" class="form-wrap">
<ul>
<input type="hidden" name="cmd" value="_donations" />

<input type="hidden" name="charset" value="utf-8">

<input type="hidden" name="item_name" value="pseudo : <?php echo $_SESSION['login']; ?>" />
<input type="hidden" name="business" value="skyled.neoxx@gmail.com"/>
<input type="hidden" name="notify_url" value="" />
<input type="hidden" name="return" value="http://lapinfute.livehost.fr/don.php?allo=pass" />
<input type="hidden" name="rm" value="2" />
<input type="hidden" name="cbt" value="Retourner sur Public Ennemi" />
<input type="hidden" name="lc" value="FR" />
<input type="hidden" name="currency_code" value="EUR" />
<li>
<label for="amount">Montant : </label>
<input name="amount" type="number" placeholder="" step="any" min="1"/>
<span>Entrer le montant que vous voulez donner :)</span>
</li>
<li>
<img class="gtfo" alt="" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
 <input type="submit" class="btndon" name="submit" value="c'est tipar pour donner et payer mon gâteau">
 </li>
 </ul>
 </form>

 <hr />
<?php if(isset($_GET['allo']) && ($_GET['allo'] == "pass")) { // Affiche l'erreur  ?>

<noscript>
    <meta http-equiv="Refresh" content="0;url=https://payment.allopass.com/error.apu?ids=320256&amp;idd=1397422">
</noscript>

<script type="text/javascript" src="https://payment.allopass.com/api/secure.apu?ids=320256&amp;idd=1397422"></script>

<script type="text/javascript">
    //<![CDATA[
        if (typeof loaded == 'undefined') {
            window.location.href = "https://payment.allopass.com/error.apu?ids=320256&amp;idd=1397422";
        }
    //]]>
</script>
<?php if($_SESSION['privilege'] != "ban") { ?>
<?php 
/* -------------------------------- */ $link = mysqli_connect("localhost", "program_a755", "mdp", "program_a755");

$login = $_SESSION['login'];
$privilege = "premium";
 $sql = mysqli_query($link, "UPDATE utilisateurs SET badge='/img/badge/premium.png', privilege='" . $privilege . "' WHERE login='" . $login . "'");

}
?>

<div id="message-winner">
MERCI DE VOTRE SOUTIENT
</div>

     <?php } ?>
 <!-- Begin Allopass Checkout Code --><center>
<iframe width="550" height="480" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" src="https://payment.allopass.com/buy/buy.apu?ids=320256&amp;idd=1397422">
</iframe>
</center><!-- Begin Allopass Checkout Code -->

<hr />

<center>
<a href="http://paypal.fr/" target="_blank"><img src="img/paypal.png" class="paiement"/></a> 
<a href="http://www.hipaymobile.fr/" target="_blank"><img src="img/hipay.png" class="paiement"/></a>
</center>