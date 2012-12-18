<?php
require_once 'Modele/Modele.php';
/*Classe modélisant une new de blog*/
class ModeleNew extends Modele
{  
    public function lireTout() 
    {
        return $this->executerLecture('select * from T_NEWS N JOIN T_CATEGORIE C ON N.CAT_ID=C.CAT_ID order by NEWS_ID desc');   
    }
    
    public function ajouterNews($titre, $contenu, $categorie)
    {
        
        // Récupération de l'id de la catégorie choisie
        $resultats = $this->executerLecture("select CAT_ID from T_CATEGORIE where CAT_NOM='$categorie'");
        $ligne = mysql_fetch_assoc($resultats);
        $idCategorie = $ligne['CAT_ID'];
        
        // Insertion de la news en BD
        $date = date(DATE_W3C);
        $this->executerModification('insert into T_NEWS(NEWS_DATE, NEWS_TITRE, NEWS_CONTENU, CAT_ID) values(?, ?, ?, ?)',
                array($date, $titre, $contenu, $idCategorie));
    }
}