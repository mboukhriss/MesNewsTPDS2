<?php
abstract class Modele{
    private $bdd;    
    private function getBdd()    
    {
        if ($this->bdd === null) 
        {
            /*Connexion*/
            $this->bdd = new PDO('mysql:host=localhost;dbname=mesnews', 'root', '');            
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->bdd->query('set names utf8');
        }
        return $this->bdd;
    }
    protected function executerLecture($sql, $lirePremierElement = false)
    {
        $resultats = $this->getBdd()->query($sql);        
        if ($lirePremierElement === true) 
            return $resultats->fetch();       
        else
            return $resultats;
    }
    
    protected function executerEcriture($sql, $valeurs)  
    {
        $requete = $this->getBdd()->prepare($sql);   
        $requete->execute($valeurs);   
    }
}