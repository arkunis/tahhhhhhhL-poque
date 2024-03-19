        <?php session_start(); 

        /* ça c'est le menu des non connecté */ if($_SESSION['privilege'] == "") {

        } 

else{
  header("Location: index.php");
}?>
<?php include('compteur.php'); ?>
<?php
  //-------------------------------------------------------//
     // Formulaire visible par d&eacute;faut
     $masquer_formulaire = false;
     
     // Une fois le formulaire envoy&eacute;
     if(isset($_POST["inscription"]))
     {
          
          // V&eacute;rification de la validit&eacute; des champs
          if(!ereg("^[A-Za-z0-9_]{4,20}$", $_POST["login"]))
          {
               $message = "<center><div class=\"error\">Votre login doit contenir entre 4 et 20 caractères<br />\n";
               $message .= "L'utilisation du underscore est autorisé</div></center>";
          }
          elseif(!ereg("^[A-Za-z0-9]{4,}$", $_POST["password"]))
          {
               $message = "<center><div class=\"error\">Votre mot de passe doit contenir 4 caractères minimum</div></center>";
          }
          elseif($_POST["password"] != $_POST["TB_Confirmation_Mot_de_Passe"])
          {
               $message = "<center><div class=\"error\">Erreur, mot de passe différent</div></center>";
          }
          elseif(!ereg("^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]{2,}[.][a-zA-Z]{2,4}$",
               $_POST["email"]))
          {
               $message = "<center><div class=\"error\">L'adresse email n'est pas valide</div></center>";
          }
          else
          {
               
               // Connexion &agrave; la base de donn&eacute;es
               // Valeurs &agrave; modifier selon vos param&egrave;tres configuration

/* -------------------------------- */ $link = mysqli_connect("localhost", "program_a755", "mdp", "program_a755");
               
               
               // V&eacute;rification de l'unicit&eacute; du nom d'utilisateur et de l'adresse e-mail
               $result = mysqli_query($link, "
                    SELECT login
                         , email
                         FROM utilisateurs
                    WHERE login = '" . $_POST["login"] . "'
                    OR email = '" . $_POST["email"] . "'
                    ");
               
               // Si une erreur survient
               if(!$result)
               {
                    $message = "Error access BDD";
               }
               else
               {
                    
                    // Si un enregistrement est trouv&eacute;
                    if(mysqli_num_rows($result) > 0)
                    {
                         
                         while($row = mysqli_fetch_array($result))
                         {
                              
                              if($_POST["login"] == $row["login"])
                              {
                                   $message = "<center><div class=\"error\">Le login <b>" . $_POST["login"];
                                   $message .= "</b> est déjà utilisé</div></center>";
                              }
                              elseif($_POST["email"] == $row["email"])
                              {
                                   $message = "<center><div class=\"error\">l'email <b>" . $_POST["email"];
                                   $message .= "</b> est déjà utilisé</div></center>";
                              }
                             
                              
                         }
                         
                    }
                    else
                    {
                         
                         // G&eacute;n&eacute;ration de la clef d'activation
                         $caracteres = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
                         $caracteres_aleatoires = array_rand($caracteres, 8);
                         $clef_activation = "";
                         
                         foreach($caracteres_aleatoires as $i)
                         {
                              $clef_activation .= $caracteres[$i];
                         }
                         
                           define('PREFIX_SALT', 'cant');
                           define('SUFFIX_SALT', 'hack');
                           
                         // Cr&eacute;ation du compte utilisateur
                         $result = mysqli_query($link, "
                              INSERT INTO utilisateurs (
                                   login
                                   , password
                                   , email
                                   , points
                                   , privilege
                                   , badge
                                   , badge2
                                   , Clef_Activation
                                
                              )
                              VALUES(
                                   '" . $_POST["login"] . "'
                                   , '" . md5(PREFIX_SALT.$_POST["password"].SUFFIX_SALT) . "'
                                   , '" . $_POST["email"] . "'
                                   , 0
                                   , 'free'
                                   , '/img/badge/user.png'
                                   , ''
                                   , '" . $clef_activation . "'
                                 
                              )
                         ");
                         
                         // Si une erreur survient
                         if(!$result)
                         {
                              $message = "Error access BDD";
                         }
                         else
                         {
                              
                              // Envoi du mail d'activation
                              $sujet = "Compte activé";
                              
                              $message = "
<!doctype html>
<html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\">
  <head>
    <!-- NAME: SIMPLE TEXT -->
    <!--[if gte mso 15]>
        <xml>
            <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
    <meta charset=\"UTF-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>*|MC:SUBJECT|*</title>
        
    <style type=\"text/css\">
    p{
      margin:10px 0;
      padding:0;
    }
    table{
      border-collapse:collapse;
    }
    h1,h2,h3,h4,h5,h6{
      display:block;
      margin:0;
      padding:0;
    }
    img,a img{
      border:0;
      height:auto;
      outline:none;
      text-decoration:none;
    }
    body,#bodyTable,#bodyCell{
      height:100%;
      margin:0;
      padding:0;
      width:100%;
    }
    #outlook a{
      padding:0;
    }
    img{
      -ms-interpolation-mode:bicubic;
    }
    table{
      mso-table-lspace:0pt;
      mso-table-rspace:0pt;
    }
    .ReadMsgBody{
      width:100%;
    }
    .ExternalClass{
      width:100%;
    }
    p,a,li,td,blockquote{
      mso-line-height-rule:exactly;
    }
    a[href^=tel],a[href^=sms]{
      color:inherit;
      cursor:default;
      text-decoration:none;
    }
    p,a,li,td,body,table,blockquote{
      -ms-text-size-adjust:100%;
      -webkit-text-size-adjust:100%;
    }
    .ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{
      line-height:100%;
    }
    a[x-apple-data-detectors]{
      color:inherit !important;
      text-decoration:none !important;
      font-size:inherit !important;
      font-family:inherit !important;
      font-weight:inherit !important;
      line-height:inherit !important;
    }
    #bodyCell{
      padding:10px;
    }
    .templateContainer{
      max-width:600px !important;
    }
    a.mcnButton{
      display:block;
    }
    .mcnImage{
      vertical-align:bottom;
    }
    .mcnTextContent{
      word-break:break-word;
    }
    .mcnTextContent img{
      height:auto !important;
    }
    .mcnDividerBlock{
      table-layout:fixed !important;
    }
  /*
  @tab Page
  @section Background Style
  @tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
  */
    body,#bodyTable{
      /*@editable*/background-color:#FFFFFF;
    }
  /*
  @tab Page
  @section Background Style
  @tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
  */
    #bodyCell{
      /*@editable*/border-top:0;
    }
  /*
  @tab Page
  @section Email Border
  @tip Set the border for your email.
  */
    .templateContainer{
      /*@editable*/border:0;
    }
  /*
  @tab Page
  @section Heading 1
  @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
  @style heading 1
  */
    h1{
      /*@editable*/color:#202020;
      /*@editable*/font-family:Helvetica;
      /*@editable*/font-size:26px;
      /*@editable*/font-style:normal;
      /*@editable*/font-weight:bold;
      /*@editable*/line-height:125%;
      /*@editable*/letter-spacing:normal;
      /*@editable*/text-align:left;
    }
  /*
  @tab Page
  @section Heading 2
  @tip Set the styling for all second-level headings in your emails.
  @style heading 2
  */
    h2{
      /*@editable*/color:#202020;
      /*@editable*/font-family:Helvetica;
      /*@editable*/font-size:22px;
      /*@editable*/font-style:normal;
      /*@editable*/font-weight:bold;
      /*@editable*/line-height:125%;
      /*@editable*/letter-spacing:normal;
      /*@editable*/text-align:left;
    }
  /*
  @tab Page
  @section Heading 3
  @tip Set the styling for all third-level headings in your emails.
  @style heading 3
  */
    h3{
      /*@editable*/color:#202020;
      /*@editable*/font-family:Helvetica;
      /*@editable*/font-size:20px;
      /*@editable*/font-style:normal;
      /*@editable*/font-weight:bold;
      /*@editable*/line-height:125%;
      /*@editable*/letter-spacing:normal;
      /*@editable*/text-align:left;
    }
  /*
  @tab Page
  @section Heading 4
  @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
  @style heading 4
  */
    h4{
      /*@editable*/color:#202020;
      /*@editable*/font-family:Helvetica;
      /*@editable*/font-size:18px;
      /*@editable*/font-style:normal;
      /*@editable*/font-weight:bold;
      /*@editable*/line-height:125%;
      /*@editable*/letter-spacing:normal;
      /*@editable*/text-align:left;
    }
  /*
  @tab Header
  @section Header Style
  @tip Set the borders for your email's header area.
  */
    #templateHeader{
      /*@editable*/border-top:0;
      /*@editable*/border-bottom:0;
    }
  /*
  @tab Header
  @section Header Text
  @tip Set the styling for your email's header text. Choose a size and color that is easy to read.
  */
    #templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
      /*@editable*/color:#202020;
      /*@editable*/font-family:Helvetica;
      /*@editable*/font-size:16px;
      /*@editable*/line-height:150%;
      /*@editable*/text-align:left;
    }
  /*
  @tab Header
  @section Header Link
  @tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
  */
    #templateHeader .mcnTextContent a,#templateHeader .mcnTextContent p a{
      /*@editable*/color:#2BAADF;
      /*@editable*/font-weight:normal;
      /*@editable*/text-decoration:underline;
    }
  /*
  @tab Body
  @section Body Style
  @tip Set the borders for your email's body area.
  */
    #templateBody{
      /*@editable*/border-top:0;
      /*@editable*/border-bottom:0;
    }
  /*
  @tab Body
  @section Body Text
  @tip Set the styling for your email's body text. Choose a size and color that is easy to read.
  */
    #templateBody .mcnTextContent,#templateBody .mcnTextContent p{
      /*@editable*/color:#202020;
      /*@editable*/font-family:Helvetica;
      /*@editable*/font-size:16px;
      /*@editable*/line-height:150%;
      /*@editable*/text-align:left;
    }
  /*
  @tab Body
  @section Body Link
  @tip Set the styling for your email's body links. Choose a color that helps them stand out from your text.
  */
    #templateBody .mcnTextContent a,#templateBody .mcnTextContent p a{
      /*@editable*/color:#2BAADF;
      /*@editable*/font-weight:normal;
      /*@editable*/text-decoration:underline;
    }
  /*
  @tab Footer
  @section Footer Style
  @tip Set the borders for your email's footer area.
  */
    #templateFooter{
      /*@editable*/border-top:0;
      /*@editable*/border-bottom:0;
    }
  /*
  @tab Footer
  @section Footer Text
  @tip Set the styling for your email's footer text. Choose a size and color that is easy to read.
  */
    #templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
      /*@editable*/color:#202020;
      /*@editable*/font-family:Helvetica;
      /*@editable*/font-size:12px;
      /*@editable*/line-height:150%;
      /*@editable*/text-align:left;
    }
  /*
  @tab Footer
  @section Footer Link
  @tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
  */
    #templateFooter .mcnTextContent a,#templateFooter .mcnTextContent p a{
      /*@editable*/color:#202020;
      /*@editable*/font-weight:normal;
      /*@editable*/text-decoration:underline;
    }
  @media only screen and (min-width:768px){
    .templateContainer{
      width:600px !important;
    }

} @media only screen and (max-width: 480px){
    body,table,td,p,a,li,blockquote{
      -webkit-text-size-adjust:none !important;
    }

} @media only screen and (max-width: 480px){
    body{
      width:100% !important;
      min-width:100% !important;
    }

} @media only screen and (max-width: 480px){
    #bodyCell{
      padding-top:10px !important;
    }

} @media only screen and (max-width: 480px){
    .mcnImage{
      width:100% !important;
    }

} @media only screen and (max-width: 480px){
    .mcnCaptionTopContent,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer{
      max-width:100% !important;
      width:100% !important;
    }

} @media only screen and (max-width: 480px){
    .mcnBoxedTextContentContainer{
      min-width:100% !important;
    }

} @media only screen and (max-width: 480px){
    .mcnImageGroupContent{
      padding:9px !important;
    }

} @media only screen and (max-width: 480px){
    .mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{
      padding-top:9px !important;
    }

} @media only screen and (max-width: 480px){
    .mcnImageCardTopImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{
      padding-top:18px !important;
    }

} @media only screen and (max-width: 480px){
    .mcnImageCardBottomImageContent{
      padding-bottom:9px !important;
    }

} @media only screen and (max-width: 480px){
    .mcnImageGroupBlockInner{
      padding-top:0 !important;
      padding-bottom:0 !important;
    }

} @media only screen and (max-width: 480px){
    .mcnImageGroupBlockOuter{
      padding-top:9px !important;
      padding-bottom:9px !important;
    }

} @media only screen and (max-width: 480px){
    .mcnTextContent,.mcnBoxedTextContentColumn{
      padding-right:18px !important;
      padding-left:18px !important;
    }

} @media only screen and (max-width: 480px){
    .mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{
      padding-right:18px !important;
      padding-bottom:0 !important;
      padding-left:18px !important;
    }

} @media only screen and (max-width: 480px){
    .mcpreview-image-uploader{
      display:none !important;
      width:100% !important;
    }

} @media only screen and (max-width: 480px){
  /*
  @tab Mobile Styles
  @section Heading 1
  @tip Make the first-level headings larger in size for better readability on small screens.
  */
    h1{
      /*@editable*/font-size:22px !important;
      /*@editable*/line-height:125% !important;
    }

} @media only screen and (max-width: 480px){
  /*
  @tab Mobile Styles
  @section Heading 2
  @tip Make the second-level headings larger in size for better readability on small screens.
  */
    h2{
      /*@editable*/font-size:20px !important;
      /*@editable*/line-height:125% !important;
    }

} @media only screen and (max-width: 480px){
  /*
  @tab Mobile Styles
  @section Heading 3
  @tip Make the third-level headings larger in size for better readability on small screens.
  */
    h3{
      /*@editable*/font-size:18px !important;
      /*@editable*/line-height:125% !important;
    }

} @media only screen and (max-width: 480px){
  /*
  @tab Mobile Styles
  @section Heading 4
  @tip Make the fourth-level headings larger in size for better readability on small screens.
  */
    h4{
      /*@editable*/font-size:16px !important;
      /*@editable*/line-height:150% !important;
    }

} @media only screen and (max-width: 480px){
  /*
  @tab Mobile Styles
  @section Boxed Text
  @tip Make the boxed text larger in size for better readability on small screens. We recommend a font size of at least 16px.
  */
    table.mcnBoxedTextContentContainer td.mcnTextContent,td.mcnBoxedTextContentContainer td.mcnTextContent p{
      /*@editable*/font-size:14px !important;
      /*@editable*/line-height:150% !important;
    }

} @media only screen and (max-width: 480px){
  /*
  @tab Mobile Styles
  @section Header Text
  @tip Make the header text larger in size for better readability on small screens.
  */
    td#templateHeader td.mcnTextContent,td#templateHeader td.mcnTextContent p{
      /*@editable*/font-size:16px !important;
      /*@editable*/line-height:150% !important;
    }

} @media only screen and (max-width: 480px){
  /*
  @tab Mobile Styles
  @section Body Text
  @tip Make the body text larger in size for better readability on small screens. We recommend a font size of at least 16px.
  */
    td#templateBody td.mcnTextContent,td#templateBody td.mcnTextContent p{
      /*@editable*/font-size:16px !important;
      /*@editable*/line-height:150% !important;
    }

} @media only screen and (max-width: 480px){
  /*
  @tab Mobile Styles
  @section Footer Text
  @tip Make the footer content text larger in size for better readability on small screens.
  */
    td#templateFooter td.mcnTextContent,td#templateFooter td.mcnTextContent p{
      /*@editable*/font-size:14px !important;
      /*@editable*/line-height:150% !important;
    }

}</style></head>
    <body>
        <center>
            <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"100%\" width=\"100%\" id=\"bodyTable\">
                <tr>
                    <td align=\"left\" valign=\"top\" id=\"bodyCell\">
                        <!-- BEGIN TEMPLATE // -->
            <!--[if gte mso 9]>
            <table align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" style=\"width:600px;\">
            <tr>
            <td align=\"center\" valign=\"top\" width=\"600\" style=\"width:600px;\">
            <![endif]-->
                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"templateContainer\">
                            <tr>
                                <td valign=\"top\" id=\"templateHeader\"><table class=\"mcnTextBlock\" style=\"min-width:100%;\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
    <tbody class=\"mcnTextBlockOuter\">
        <tr>
            <td class=\"mcnTextBlockInner\" valign=\"top\">
                
                <table style=\"min-width:100%;\" class=\"mcnTextContentContainer\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                    <tbody><tr>
                        
                        <td class=\"mcnTextContent\" style=\"padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;\" valign=\"top\">
                        
                            <h1>Lapin Futé</h1>

                        </td>
                    </tr>
                </tbody></table>
                
            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign=\"top\" id=\"templateBody\"><table class=\"mcnImageCardBlock\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
    <tbody class=\"mcnImageCardBlockOuter\">
        <tr>
            <td class=\"mcnImageCardBlockInner\" style=\"padding-top:9px; padding-right:18px; padding-bottom:9px; padding-left:18px;\" valign=\"top\">
                


<table class=\"mcnImageCardRightContentOuter\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
    <tbody><tr>
        <td class=\"mcnImageCardRightContentInner\" style=\"padding:0;\" align=\"center\" valign=\"top\">
            <table class=\"mcnImageCardRightImageContentContainer\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                <tbody><tr>
                    <td class=\"mcnImageCardRightImageContentE2E \" style=\"padding-top:0px; padding-right:0; padding-bottom:0px; padding-left:0px;\" align=\"center\" valign=\"top\">
                    
                        

                        <img alt=\"\" src=\"https://gallery.mailchimp.com/c08a01477e9966fb25e4f036c/images/163912d4-1db5-4292-8725-0883b5133b10.png\" style=\"max-width:100px;\" class=\"mcnImage\" width=\"100\">
                        

                    
                    </td>
                </tr>
            </tbody></table>
            <table class=\"mcnImageCardRightTextContentContainer\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"396\">
                <tbody><tr>
                    <td class=\"mcnTextContent\" style=\"padding-right: 18px;padding-top: 18px;padding-bottom: 18px;color: #000000;font-family: &quot;trebuchet ms&quot: ;,&quot: ;lucida grande&quot: ;lucida sans unicode&quot: ;lucida sans&quot: ;,tahoma,sans-serif: ;font-size: 14px;font-weight: normal;text-align: left;\" valign=\"top\">
                  Merci de votre inscription,<br />     
        Voici votre code unique (en cas de perte de vos identifiants) : ".$clef_activation."<br/>
        <br />
        Voici Votre login : ".$_POST['login']."<br /><br />
        Votre mot de passe : ".$_POST['password']."

<br/><br/>
<center>Vous pouvez vous connecter en <a href=\"http://lapinfute.tk/register.php\">cliquant ici</a></center><br />
<t style=\"float:right;\"><small>Envoy&eacute; le : ".$date."</small></t>

                    </td>
                </tr>
            </tbody></table>
        </td>
    </tr>
</tbody></table>


            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign=\"top\" id=\"templateFooter\"><table class=\"mcnTextBlock\" style=\"min-width:100%;\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
    <tbody class=\"mcnTextBlockOuter\">
        <tr>
            <td class=\"mcnTextBlockInner\" valign=\"top\">
                
                <table style=\"min-width:100%;\" class=\"mcnTextContentContainer\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                    <tbody><tr>
                        
                        <td class=\"mcnTextContent\" style=\"padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;\" valign=\"top\">
                        
                            <div style=\"text-align: center;\"><em>Copyright par Lapin Fut&eacute; - Tous droits r&eacute;serv&eacute;s</em><br>
<a href=\"http://lapinfute.tk/\" target=\"_blank\">http://lapinfute.tk/</a><br>
<em>Ce mail a &eacute;t&eacute; envoy&eacute; automatiquement n'y r&eacute;pondez pas !</em><br>
&nbsp;</div>

                        </td>
                    </tr>
                </tbody></table>
                
            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
                        </table>
            <!--[if gte mso 9]>
            </td>
            </tr>
            </table>
            <![endif]-->
                        <!-- // END TEMPLATE -->
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>

 ";

                               $headers = 'MIME-Version: 1.0' . "\r\n";
                               $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                               // Si une erreur survient
                              if(!@mail($_POST["email"], $sujet, $message, $headers))
                              {
                                   $message = "Error<br />\n";
                                   $message .= "Contact webmaster for more information";
                              }
                              else
                              {
                                   
                                   // Message de confirmation
                                   $message = "<center><h4>Vous allez reçevoir un mail contenant vos identifiants et votre code unique.
                                   (Attention ! le mail peut être dans vos spams !).<br />
                                   Vous pouvez désormer vous connecté !</h4></center>\n";
                                                                    
                                   // On masque le formulaire
                                   $masquer_formulaire = true;
                                   
                              }

                              
                              
                         }     
         
                                   
                             
                    }
                    
               }
               
          }
          
          // Fermeture de la connexion &agrave; la base de donn&eacute;es
          mysqli_close($link);
          
     }
     
?>
<?php
   
     // Formulaire visible par défaut
     $masquer_formulaire2 = false;
               
if (isset($_POST['connexion'])){ 

	$login = ($_POST['login']); 
	$pass = ($_POST['password']); 
	
	      if(!ereg("^[A-Za-z0-9_]{4,20}$", $_POST["login"]))
          {
          	
 			   $message1 = "<center><div class=\"error\">Votre login doit contenir entre 4 et 20 caractères<br />\n";
               $message1 .= "L'utilisation du underscore est autorisé</div></center>";
          }
    	  elseif(!ereg("^[A-Za-z0-9]{4,}$", $_POST["password"]))
          {
               $message1 = "<center><div class=\"error\">Votre mot de passe doit contenir 4 caractères minimum</div></center>";
          }
          else{
	
/* -------------------------------- */ $link = mysqli_connect("localhost", "program_a755", "mdp", "program_a755");

                           define('PREFIX_SALT', 'cant');
                           define('SUFFIX_SALT', 'hack');

$verif_query= "SELECT * FROM utilisateurs WHERE login='".$login."' AND password='".md5(PREFIX_SALT.$pass.SUFFIX_SALT)."'"; 
$verif = mysqli_query($link,$verif_query) or die(mysqli_error());
$row_verif = mysqli_fetch_assoc($verif);
$utilisateur = mysqli_num_rows($verif);



	if ($utilisateur) {	
	   	$_SESSION['privilege'] = $row_verif['privilege']; 
		$_SESSION['email'] = $row_verif['email']; 
		$_SESSION['badge'] = $row_verif['badge']; 
    $_SESSION['badge2'] = $row_verif['badge2']; 
    $_SESSION['Compte_Active'] = $row_verif['Compte_Active']; 
		$_SESSION['login'] = $row_verif['login']; 
    $_SESSION['points'] = $row_verif['points'];
		$_SESSION['password'] = $row_verif['password']; 
		$_SESSION['Clef_Activation'] = $row_verif['Clef_Activation'];
		
		 $expiration =
                                        empty($_POST["CB_Connexion_Automatique"]) ? 0 : time() + 90 * 24 * 60 * 60;
                                   
                                   // Création des cookies
                                   setcookie("ID_UTILISATEUR", $row["ID_Utilisateur"], $expiration, "/");
                                   setcookie("NOM_UTILISATEUR", $row["login"], $expiration, "/");
								                   setcookie("KEY", $row["Clef_Activation"], $expiration, "/");
								                                      
                                   // Fermeture de la connexion à la base de données
                                   mysqli_close($link);
header("Location: index.php");

	} 
	else {

		header("Location: register.php?erreur=login");
		
	} } }
 

// GESTION DE LA Déconnexion
if(isset($_GET['erreur']) && $_GET['erreur'] == 'logout'){ 
$prenom = $_SESSION['pseudo']; 
session_unset("authentification");

 // Suppression des cookies
     setcookie("ID_UTILISATEUR", "", time() - 1, "/");
     setcookie("NOM_UTILISATEUR", "", time() - 1, "/");
     setcookie("KEY", "", time() - 1, "/");
     
     // Redirection de l'utilisateur
     header("Location: register.php?erreur=delog");
}

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
				<?php include('_register/container.php'); ?>
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