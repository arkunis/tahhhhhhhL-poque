<?php
 
//On déclare la fonction Php :
function update_fluxRSS() {

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
 
  //On ouvre le fichier en mode écriture
  $fp = fopen("rss.xml", 'w+');
 
$xml = '<?xml version="1.0" encoding="UTF-8"?>';
$xml .= '<rss version="2.0">';
$xml .= '<channel>';
$xml .= ' <title>Lapin Futé</title>';
$xml .= ' <link>http://lapinfute.livehost.fr/</link>';
$xml .= ' <description>Site de news et d\'information, chaque utilisateur peut poster ce qu\'il souhaite tant qu\'il respect les règles.</description>';
$xml .= ' <language>fr</language>';
$xml .= ' <copyright>Copyright par Lapin Futé - Tous droits réservés</copyright>';
$xml .= ' <managingEditor>Expyri - Damien.M</managingEditor>';

 
 
 
/*  Maintenant, nous allons nous connecter à notre base de données afin d'aller chercher les
  items à insérer dans le flux RSS.
*/

//on lit les 25 premiers éléments à partir du dernier ajouté dans la base de données
$index_selection = 0;
$limitation = 5;
 
//On se connecte à notre base de données (pensez à mettre les bons logins)

try {
  $bdd = new PDO('mysql:host=localhost;dbname=program_a755', 'program_a755', 'mdp'); 
}
catch(Exception $e) {die('Erreur : '.$e->getMessage());}
 
//On prépare la requête et on exécute celle-ci pour obtenir les informations souhaitées :
$reponse = $bdd->prepare('SELECT * FROM news ORDER BY id DESC LIMIT :index_selection, :limitation') or die(print_r($bdd->errorInfo()));
$reponse->bindParam('index_selection', $index_selection, PDO::PARAM_INT);
$reponse->bindParam('limitation', $limitation, PDO::PARAM_INT);
$reponse->execute();
 
//Une fois les informations récupérées, on ajoute un à un les items à notre fichier
while ($donnees = $reponse->fetch())
{
  $xml .= '<item>';
  $xml .= '<auteur>'.stripslashes($donnees['autheur']).'</auteur>';
  $xml .= '<title>'.stripslashes($donnees['titre']).'</title>';
  $xml .= '<link>http://lapinfute.livehost.fr/</link>';
  $xml .= '<guid>'.chaine_aleatoire(16).'</guid>';
  $xml .= '<description>Contenu sur le site web</description>';
  $xml .= '</item>';
}
 
//Puis on termine la requête
$reponse->closeCursor();
 
//Et on ferme le channel et le flux RSS.
$xml .= '</channel>';
$xml .= '</rss>';
 
//On écrit notre flux RSS
fwrite($fp, $xml);
 
//Puis on referme le fichier
fclose($fp);
 
} //Fermeture de la fonction
?>