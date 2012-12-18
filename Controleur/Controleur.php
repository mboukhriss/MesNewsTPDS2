<?php
/*Classe abstraite Controleur*/
abstract class Controleur
{
    protected function genererVue($vue, $donnees)
    {
        try
        {
            $fichierVue = 'Vue/' . $vue . '.php';
            if (file_exists($fichierVue))
            {
               extract($donnees);
              require $fichierVue;
            }
            else
                throw new Exception("Fichier $fichierVue non trouvé");
            }
        catch (Exception $err)
        {
            $this->afficherErreur($err->getMessage());
        }
    }    
    protected function afficherErreur($msgErreur)
    {
        require 'Vue/erreur.php';    
    }    
}