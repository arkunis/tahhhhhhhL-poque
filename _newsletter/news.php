<?php
        /* ça c'est le menu des non connecté */ if($_SESSION['privilege'] == "root") {} 

else{
  header("Location: index.php");
}

/* -------------------------------- */ $link = mysqli_connect("localhost", "program_a755", "mdp", "program_a755");


//On récupère de la table newsletter les personnes inscrites.
$liste_vrac = mysqli_query($link, "SELECT email FROM utilisateurs");

$date = date("d/m/Y");
 
 if(isset($_POST['newsletter'])) //On a tapé le message.
{ 
//On définit la liste des inscrits.
$liste = "skyled.neoxx@gmail.com";
    while ($donnees = mysqli_fetch_assoc($liste_vrac))
    {
    
    $liste .= ','; //On sépare les adresses par une virgule.
    $liste .= $donnees['email'];
    
     
$fichier_message = "
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
                       
        ".$_POST['message']."

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

"; //On définit le message.
 
$destinataire = $donnees['email']; //On adresse une copie a l'administrateur.
 
$objet = "Newsletter de lapin Futé"; //On définit l'objet qui contient la date.
 
//On définit le reste des paramètres.
                               $headers = "From: \"Lapin Fut&eacute;\"<service@lapinfute.tk>" ."\r\n";
                               $headers .= "Reply-to: \"Lapin Fut&eacute;\" <service@lapinfute.tk>"."\r\n";
                               $headers .= 'MIME-Version: 1.0' . "\r\n";
                               $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                               $headers .= 'Bcc:' . $liste . '' . "\r\n";

    //On envoie l'e-mail.
    if (mail($destinataire, $objet, $fichier_message, $headers)) 
    {
echo ". ";
    } 
    else
    {

echo "Échec lors de l'envoi de la newsletter.";

    }
  }
}

?>
<br />

<form class="form-style-7" action="" method="POST">
<ul>

<textarea cols="30" rows="10" name="message" id="contenu"></textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'contenu' );
            </script>

<li>
<input type="submit" name="newsletter" value="Envoyer la newsletter" />
</li>
</ul>
</form>
Liste des emails :<br /><br />
<textarea style="width:99%;" rows="7" name="message" readonly>
<?php
$liste_inscrits_vrac = mysqli_query($link, "SELECT email FROM utilisateurs");
    while ($donnees = mysqli_fetch_assoc($liste_inscrits_vrac))
    {

echo "".$donnees['email']. " :: ";

    }
?>
</textarea>