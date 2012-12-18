<?php
require_once 'Modele/ModeleNew.php';
require_once 'Controleur/Controleur.php';

class ControleurNew extends Controleur
{    
    private $modeleNew;
    public function __construct(){
        $this->modeleNew = new ModeleNew(); 
        
        }
    public function listerNews(){
        // Récupération de la liste des news sous la forme d'un objet PDOStatement
        $resultatsNews = $this->modeleNew->lireTout();        
        //// Accès aux lignes de résultats (les news du blog) sous la forme d'un tableau        
       $news = $resultatsNews->fetchAll();
       $this->genererVue('listeNews',                 
               array('news' => $news));    
   }
   
   public function ajouterNews($titre, $contenu, $categorie) {
       $this->modeleNew->ajouterNews($titre, $contenu, $categorie);
       $this->listerNews();
   }
}