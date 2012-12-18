<?php
require 'Controleur/ControleurNew.php';
class ControleurFrontal extends Controleur
{
    private $ctrlNew;    
    public function __construct()    
    {        
        $this->ctrlNew = new ControleurNew();
    }
    
    public function routerRequete()
    {
        try 
        {
            if (!empty($_POST))
                $this->routerRequetePost();
            else
                $this->ctrlNew->listerNews();  // action par défaut
        }
        catch (Exception $e) {
            $this->afficherErreur($e->getMessage());  
        }
        
    }
    
    private function routerRequetePost()
    {
        if (isset($_POST['titre']) And isset($_POST['contenu']) And isset($_POST['categorie']))
        {
            $titre = strip_tags($_POST['titre']);
            $contenu = strip_tags($_POST['contenu']);
            $categorie = intval($_POST['categorie']);
            $this->ctrlNew->ajouterNews($titre, $contenu, $categorie);
        }
        else 
            throw new Exception('Paramètres $_POST non reconnus');
    }
 }